<?php
declare(strict_types=1);

header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../db.php";

// Get request method and action
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? null;

try {
    if ($method === 'GET' && $action === 'list') {
        // Get reviews for a specific product
        $product_slug = $_GET['product_slug'] ?? null;
        
        if (!$product_slug) {
            http_response_code(400);
            echo json_encode(['error' => 'product_slug is required']);
            exit;
        }

        $stmt = $pdo->prepare("
            SELECT 
                r.id,
                r.rating,
                r.comment,
                r.created_at,
                COALESCE(r.guest_name, u.name) as reviewer_name,
                COALESCE(r.guest_email, u.email) as reviewer_email
            FROM reviews r
            LEFT JOIN users u ON r.user_id = u.id
            WHERE r.product_slug = ?
            ORDER BY r.created_at DESC
            LIMIT 100
        ");
        $stmt->execute([$product_slug]);
        $reviews = $stmt->fetchAll();

        // Calculate average rating
        $stmt = $pdo->prepare("
            SELECT 
                COUNT(*) as total,
                AVG(rating) as avg_rating
            FROM reviews
            WHERE product_slug = ?
        ");
        $stmt->execute([$product_slug]);
        $stats = $stmt->fetch();

        echo json_encode([
            'success' => true,
            'reviews' => $reviews,
            'stats' => $stats
        ]);
        exit;
    }

    if ($method === 'POST' && $action === 'submit') {
        // Submit a new review
        $product_slug = $_POST['product_slug'] ?? null;
        $rating = $_POST['rating'] ?? null;
        $comment = $_POST['comment'] ?? null;
        $guest_name = $_POST['guest_name'] ?? null;
        $guest_email = $_POST['guest_email'] ?? null;

        // Validation
        if (!$product_slug || !$rating) {
            http_response_code(400);
            echo json_encode(['error' => 'product_slug and rating are required']);
            exit;
        }

        if ($rating < 1 || $rating > 5 || !is_numeric($rating)) {
            http_response_code(400);
            echo json_encode(['error' => 'rating must be between 1 and 5']);
            exit;
        }

        // Check if product exists
        $stmt = $pdo->prepare("SELECT id FROM products WHERE slug = ?");
        $stmt->execute([$product_slug]);
        if (!$stmt->fetch()) {
            http_response_code(404);
            echo json_encode(['error' => 'product not found']);
            exit;
        }

        $user_id = null;
        
        // If user is logged in (has user_id in session), use that
        if (!empty($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } elseif ($guest_name && $guest_email) {
            // Guest review - validate email
            if (!filter_var($guest_email, FILTER_VALIDATE_EMAIL)) {
                http_response_code(400);
                echo json_encode(['error' => 'invalid email address']);
                exit;
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'guest_name and guest_email are required for guest reviews']);
            exit;
        }

        // Insert review
        $stmt = $pdo->prepare("
            INSERT INTO reviews (product_slug, user_id, guest_name, guest_email, rating, comment)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        
        $success = $stmt->execute([
            $product_slug,
            $user_id,
            $guest_name,
            $guest_email,
            $rating,
            $comment ?: null
        ]);

        if ($success) {
            echo json_encode([
                'success' => true,
                'message' => 'Review submitted successfully',
                'review_id' => $pdo->lastInsertId()
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to submit review']);
        }
        exit;
    }

    if ($method === 'GET' && $action === 'average') {
        // Get average rating for a product
        $product_slug = $_GET['product_slug'] ?? null;
        
        if (!$product_slug) {
            http_response_code(400);
            echo json_encode(['error' => 'product_slug is required']);
            exit;
        }

        $stmt = $pdo->prepare("
            SELECT 
                COUNT(*) as total_reviews,
                ROUND(AVG(rating), 2) as average_rating
            FROM reviews
            WHERE product_slug = ?
        ");
        $stmt->execute([$product_slug]);
        $result = $stmt->fetch();

        echo json_encode([
            'success' => true,
            'product_slug' => $product_slug,
            'total_reviews' => (int)$result['total_reviews'],
            'average_rating' => (float)$result['average_rating'] ?? 0
        ]);
        exit;
    }

    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
    exit;
}
?>