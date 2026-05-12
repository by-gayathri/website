<?php
// includes/reviews.php
// This component displays and manages reviews for products
// Use: include __DIR__ . "/../includes/reviews.php";
// And call: display_reviews_section($product_slug);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure database connection is available
if (!isset($GLOBALS['pdo'])) {
    require_once __DIR__ . "/../db.php";
}

function get_rating_stars($rating) {
    $filled = '★';
    $empty = '☆';
    return str_repeat($filled, (int)$rating) . str_repeat($empty, 5 - (int)$rating);
}

function display_reviews_section($product_slug) {
    global $pdo;
    
    try {
        // Verify reviews table exists
        $stmt = $pdo->query("SHOW TABLES LIKE 'reviews'");
        if ($stmt->rowCount() === 0) {
            echo '<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8"><p class="text-yellow-800">Reviews table not yet initialized. Please run schema.sql</p></div>';
            return;
        }
        
        // Get average rating
        $stmt = $pdo->prepare("
            SELECT 
                COUNT(*) as total_reviews,
                ROUND(AVG(rating), 1) as average_rating
            FROM reviews
            WHERE product_slug = ?
        ");
        $stmt->execute([$product_slug]);
        $stats = $stmt->fetch();
        
        $avg_rating = $stats['average_rating'] ?? 0;
        $total_reviews = $stats['total_reviews'] ?? 0;
        
        // Get reviews
        $stmt = $pdo->prepare("
            SELECT 
                r.id,
                r.rating,
                r.comment,
                r.created_at,
                COALESCE(r.guest_name, u.name, 'Anonymous') as reviewer_name
            FROM reviews r
            LEFT JOIN users u ON r.user_id = u.id
            WHERE r.product_slug = ?
            ORDER BY r.created_at DESC
            LIMIT 20
        ");
        $stmt->execute([$product_slug]);
        $reviews = $stmt->fetchAll();
    } catch (Exception $e) {
        echo '<div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-8"><p class="text-red-800">Error loading reviews: ' . htmlspecialchars($e->getMessage()) . '</p></div>';
        return;
    }
    ?>
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Customer Reviews & Ratings</h2>
        
        <!-- Average Rating Display -->
        <div class="flex items-center gap-4 mb-6">
            <div class="flex items-baseline gap-2">
                <span class="text-4xl font-bold text-gray-900"><?php echo $avg_rating; ?></span>
                <span class="text-lg text-yellow-500"><?php echo str_repeat('★', (int)$avg_rating) . str_repeat('☆', 5 - (int)$avg_rating); ?></span>
            </div>
            <div class="text-gray-600">
                <p class="text-sm font-semibold"><?php echo $total_reviews; ?> <?php echo $total_reviews === 1 ? 'review' : 'reviews'; ?></p>
            </div>
        </div>

        <!-- Review Form -->
        <form id="review-form-<?php echo htmlspecialchars($product_slug); ?>" class="bg-gray-50 p-6 rounded-lg border border-gray-200">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Share Your Experience</h3>
            
            <!-- Rating Input -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                <div class="flex gap-2 items-center">
                    <div id="star-rating-<?php echo htmlspecialchars($product_slug); ?>" class="flex gap-1">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <button 
                                type="button" 
                                class="star-btn text-3xl text-gray-300 hover:text-yellow-400 transition-colors" 
                                data-value="<?php echo $i; ?>"
                                data-product="<?php echo htmlspecialchars($product_slug); ?>"
                            >★</button>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" name="rating" id="rating-<?php echo htmlspecialchars($product_slug); ?>" value="0">
                    <span id="rating-display-<?php echo htmlspecialchars($product_slug); ?>" class="text-sm text-gray-600">Select rating</span>
                </div>
            </div>

            <!-- Comment Input -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Your Review (Optional)</label>
                <textarea 
                    name="comment" 
                    rows="4" 
                    placeholder="Share your thoughts about this service..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                    maxlength="1000"
                ></textarea>
                <p class="text-xs text-gray-500 mt-1">Max 1000 characters</p>
            </div>

            <!-- Guest Info (if not logged in) -->
            <?php if (empty($_SESSION['user_id'])): ?>
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name *</label>
                        <input 
                            type="text" 
                            name="guest_name" 
                            placeholder="John Doe" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            required
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Your Email *</label>
                        <input 
                            type="email" 
                            name="guest_email" 
                            placeholder="john@example.com" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            required
                        >
                    </div>
                </div>
                <p class="text-xs text-gray-500 mb-4">* Required for guest reviews</p>
            <?php else: ?>
                <p class="text-sm text-green-600 mb-4">✓ Logged in as registered user</p>
            <?php endif; ?>

            <button 
                type="submit" 
                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
            >
                Submit Review
            </button>
            <div id="form-message-<?php echo htmlspecialchars($product_slug); ?>" class="mt-3 text-sm"></div>
        </form>
    </div>

    <!-- Reviews List -->
    <div class="border-t border-gray-200 pt-8">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Reviews</h3>
        
        <?php if (empty($reviews)): ?>
            <p class="text-gray-600 text-center py-8">No reviews yet. Be the first to review this service!</p>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($reviews as $review): ?>
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <p class="font-semibold text-gray-900"><?php echo htmlspecialchars($review['reviewer_name']); ?></p>
                                <p class="text-sm text-yellow-500"><?php echo str_repeat('★', (int)$review['rating']) . str_repeat('☆', 5 - (int)$review['rating']); ?></p>
                            </div>
                            <span class="text-xs text-gray-500"><?php echo date('M d, Y', strtotime($review['created_at'])); ?></span>
                        </div>
                        <?php if (!empty($review['comment'])): ?>
                            <p class="text-gray-700 text-sm leading-relaxed"><?php echo nl2br(htmlspecialchars($review['comment'])); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
(function() {
    const productSlug = '<?php echo htmlspecialchars($product_slug); ?>';
    const formId = 'review-form-' + productSlug;
    const starsContainerId = 'star-rating-' + productSlug;
    const ratingInputId = 'rating-' + productSlug;
    const ratingDisplayId = 'rating-display-' + productSlug;
    const formMessageId = 'form-message-' + productSlug;

    // Star rating interaction
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('star-btn') && e.target.dataset.product === productSlug) {
            e.preventDefault();
            const rating = e.target.dataset.value;
            document.getElementById(ratingInputId).value = rating;
            document.getElementById(ratingDisplayId).textContent = rating + ' out of 5 stars';
            
            // Update star display
            const stars = document.querySelectorAll('#' + starsContainerId + ' .star-btn');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        }
    });

    // Form submission
    document.getElementById(formId).addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const messageEl = document.getElementById(formMessageId);
        const rating = document.getElementById(ratingInputId).value;

        if (!rating) {
            messageEl.className = 'mt-3 text-sm text-red-600';
            messageEl.textContent = '⚠ Please select a rating';
            return;
        }

        const formData = new FormData(this);
        formData.append('action', 'submit');
        formData.append('product_slug', productSlug);

        try {
            messageEl.className = 'mt-3 text-sm text-gray-600';
            messageEl.textContent = '⏳ Submitting...';

            const response = await fetch('/api/reviews.php?action=submit', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                messageEl.className = 'mt-3 text-sm text-green-600';
                messageEl.textContent = '✓ ' + data.message;
                document.getElementById(formId).reset();
                document.getElementById(ratingInputId).value = '0';
                document.getElementById(ratingDisplayId).textContent = 'Select rating';
                
                // Reset star display
                document.querySelectorAll('#' + starsContainerId + ' .star-btn').forEach(star => {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                });

                // Reload page after 2 seconds to show new review
                setTimeout(() => location.reload(), 2000);
            } else {
                messageEl.className = 'mt-3 text-sm text-red-600';
                messageEl.textContent = '✗ ' + (data.error || 'Failed to submit review');
            }
        } catch (err) {
            messageEl.className = 'mt-3 text-sm text-red-600';
            messageEl.textContent = '✗ Error: ' + err.message;
        }
    });
})();
</script>
    <?php
}
?>