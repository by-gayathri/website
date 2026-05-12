CREATE DATABASE IF NOT EXISTS userslist;
USE userslist;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    joined_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email) VALUES
('Alice Johnson', 'alice@example.com'),
('Bob Smith', 'bob@example.com'),
('Charlie Brown', 'charlie@example.com');

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
);

INSERT INTO products (slug, name, description) VALUES
('frontend', 'Frontend Development', 'Modern responsive web interfaces'),
('backend', 'Backend Development', 'Robust server-side architecture'),
('test-automation', 'Test Automation', 'Comprehensive testing strategies'),
('infrastructure', 'Infrastructure Setup', 'Scalable cloud infrastructure'),
('cms', 'CMS Setup', 'Content management systems'),
('api-integration', 'API Integration', 'Third-party service integration'),
('database-design', 'Database Design', 'Optimized database architecture'),
('performance-optimization', 'Performance Optimization', 'Speed and efficiency improvements'),
('security-hardening', 'Security Hardening', 'Security best practices'),
('maintenance-support', 'Maintenance & Support', 'Ongoing support services');