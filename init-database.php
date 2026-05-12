<?php
/**
 * Database Schema Initialization Script
 * 
 * This script initializes the database schema needed for the reviews feature.
 * Run this once to set up the products and reviews tables.
 * 
 * Access: /init-database.php
 */

require_once __DIR__ . "/db.php";

// Check if already initialized
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'reviews'");
    $reviewsExists = $stmt->rowCount() > 0;
    
    $stmt = $pdo->query("SHOW TABLES LIKE 'products'");
    $productsExists = $stmt->rowCount() > 0;
    
    if ($reviewsExists && $productsExists) {
        $status = "✓ Database tables already initialized!";
        $needsInit = false;
    } else {
        $needsInit = true;
    }
} catch (Exception $e) {
    $needsInit = true;
    $status = "Checking database...";
}

// Process initialization if needed and requested
if ($needsInit && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Create products table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                slug VARCHAR(100) NOT NULL UNIQUE,
                name VARCHAR(255) NOT NULL,
                description TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
        
        // Create reviews table
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS reviews (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_slug VARCHAR(100) NOT NULL,
                user_id INT,
                guest_name VARCHAR(100),
                guest_email VARCHAR(150),
                rating INT CHECK (rating >= 1 AND rating <= 5) NOT NULL,
                comment TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
                INDEX idx_product_slug (product_slug),
                INDEX idx_created_at (created_at)
            )
        ");
        
        // Insert products
        $products = [
            ['frontend', 'Frontend Development', 'Modern responsive web interfaces'],
            ['backend', 'Backend Development', 'Robust server-side architecture'],
            ['test-automation', 'Test Automation', 'Comprehensive testing strategies'],
            ['infrastructure', 'Infrastructure Setup', 'Scalable cloud infrastructure'],
            ['cms', 'CMS Setup', 'Content management systems'],
            ['api-integration', 'API Integration', 'Third-party service integration'],
            ['database-design', 'Database Design', 'Optimized database architecture'],
            ['performance-optimization', 'Performance Optimization', 'Speed and efficiency improvements'],
            ['security-hardening', 'Security Hardening', 'Security best practices'],
            ['maintenance-support', 'Maintenance & Support', 'Ongoing support services'],
        ];
        
        $stmt = $pdo->prepare("INSERT IGNORE INTO products (slug, name, description) VALUES (?, ?, ?)");
        foreach ($products as $product) {
            $stmt->execute($product);
        }
        
        $status = "✓ Database initialized successfully! Tables created and products added.";
        $success = true;
    } catch (Exception $e) {
        $status = "✗ Error: " . htmlspecialchars($e->getMessage());
        $success = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initialize Database - Reviews Feature</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-md mx-auto mt-20">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Database Initialization</h1>
            <p class="text-gray-600 mb-6">Initialize the database schema for the reviews feature</p>
            
            <?php if (isset($status)): ?>
                <div class="mb-6 p-4 rounded-lg <?php echo (isset($success) && $success) ? 'bg-green-50 border border-green-200' : 'bg-blue-50 border border-blue-200'; ?>">
                    <p class="<?php echo (isset($success) && $success) ? 'text-green-800' : 'text-blue-800'; ?>">
                        <?php echo $status; ?>
                    </p>
                </div>
            <?php endif; ?>
            
            <?php if ($needsInit && $_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
                <p class="text-gray-700 mb-6 text-sm">The reviews feature requires database tables to be created. Click the button below to initialize:</p>
                <form method="POST">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700">
                        Initialize Database
                    </button>
                </form>
            <?php elseif (!$needsInit && $_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
                <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
                    <p class="text-green-800 font-semibold mb-2">✓ Ready to Use</p>
                    <p class="text-green-700 text-sm">Your reviews system is set up and ready! You can now:</p>
                    <ul class="text-green-700 text-sm mt-2 ml-4 list-disc">
                        <li>Leave reviews on product pages</li>
                        <li>Rate services with 5 stars</li>
                        <li>View community feedback</li>
                    </ul>
                </div>
                <a href="/services.php" class="block w-full mt-4 bg-gray-600 text-white py-2 rounded-lg font-semibold hover:bg-gray-700 text-center">
                    Go to Services
                </a>
            <?php else: ?>
                <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
                    <p class="text-green-800 font-semibold">✓ Initialization Complete</p>
                    <p class="text-green-700 text-sm mt-2">The database is now ready for reviews. Refresh your product pages to see the reviews section.</p>
                </div>
                <a href="/services.php" class="block w-full mt-4 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 text-center">
                    Go to Services
                </a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
