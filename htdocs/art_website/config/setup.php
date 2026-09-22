<?php
/**
 * Auto Database Setup & Migration Script
 * This script will create the database, rename tables, and ensure all columns exist.
 */

require_once 'db.php'; // DB connection with auto-create capability

echo "Starting database setup...<br>";

// Helper to check if a table exists
function tableExists($conn, $tableName) {
    if (!$conn) return false;
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    return $result && $result->num_rows > 0;
}

// 1. Rename existing tables to new convention
$renames = [
    'art' => 'artworks',
    'orders' => 'commissions',
    'liked' => 'likes'
];

foreach ($renames as $old => $new) {
    if (tableExists($conn, $old) && !tableExists($conn, $new)) {
        if ($conn->query("RENAME TABLE `$old` TO `$new`")) {
            echo "Renamed table `$old` to `$new`.<br>";
        } else {
            echo "Error renaming table `$old`: " . $conn->error . "<br>";
        }
    }
}

// 2. Ensure `users` table exists
$sql_users = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('artist', 'customer') NOT NULL DEFAULT 'customer',
    `status` ENUM('pending', 'approved') DEFAULT 'approved',
    `location` VARCHAR(255) DEFAULT NULL,
    `phone_number` VARCHAR(15) DEFAULT NULL,
    `address` VARCHAR(255) DEFAULT NULL,
    `pin_code` VARCHAR(10) DEFAULT NULL,
    `instagram` VARCHAR(100) DEFAULT NULL,
    `facebook` VARCHAR(100) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY (`email`),
    UNIQUE KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_users);

// 3. Ensure `artworks` table exists
$sql_artworks = "CREATE TABLE IF NOT EXISTS `artworks` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `artist_id` INT DEFAULT NULL,
    `title` VARCHAR(100) DEFAULT NULL,
    `description` TEXT,
    `image_url` VARCHAR(255) DEFAULT NULL,
    `likes_count` INT DEFAULT 0,
    `status` ENUM('pending', 'approved') DEFAULT 'approved',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`artist_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_artworks);

// 4. Ensure `commissions` table exists (formerly orders)
$sql_commissions = "CREATE TABLE IF NOT EXISTS `commissions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `customer_id` INT NOT NULL,
    `artist_id` INT NOT NULL,
    `details` TEXT,
    `status` ENUM('Pending', 'Accepted', 'Completed', 'Rejected') DEFAULT 'Pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`customer_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`artist_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_commissions);

// 5. Ensure `likes` table exists (formerly liked)
$sql_likes = "CREATE TABLE IF NOT EXISTS `likes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `artwork_id` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `unique_like` (`user_id`, `artwork_id`),
    INDEX `idx_artwork_likes` (`artwork_id`),
    INDEX `idx_user_likes` (`user_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`artwork_id`) REFERENCES `artworks`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_likes);

// 6. Conversations table
$sql_conversations = "CREATE TABLE IF NOT EXISTS `conversations` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user1_id` INT NOT NULL,
    `user2_id` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user1_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user2_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_conversations);

// 7. Messages table
$sql_messages = "CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `conversation_id` INT NOT NULL,
    `sender_id` INT NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`conversation_id`) REFERENCES `conversations`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`sender_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_messages);

// 8. Inquiries
$sql_inquiries = "CREATE TABLE IF NOT EXISTS `inquiries` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `issue` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_inquiries);

// 9. Artwork Commands (Comments)
$sql_artwork_commands = "CREATE TABLE IF NOT EXISTS `artwork_commands` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `artist_id` INT NOT NULL,
    `art_id` INT NOT NULL,
    `command_text` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_art_commands` (`art_id`),
    INDEX `idx_artist_commands` (`artist_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`artist_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`art_id`) REFERENCES `artworks`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$conn->query($sql_artwork_commands);

// Ensure `likes_count` column exists
$check_col = $conn->query("SHOW COLUMNS FROM `artworks` LIKE 'likes_count'");
if ($check_col && $check_col->num_rows == 0) {
    if ($conn->query("ALTER TABLE `artworks` ADD COLUMN `likes_count` INT DEFAULT 0 AFTER `image_url`")) {
        echo "Added `likes_count` column to `artworks`.<br>";
    }
}

// Ensure `status` column exists in `artworks`
$check_status = $conn->query("SHOW COLUMNS FROM `artworks` LIKE 'status'");
if ($check_status && $check_status->num_rows == 0) {
    if($conn->query("ALTER TABLE `artworks` ADD COLUMN `status` ENUM('pending', 'approved') DEFAULT 'approved' AFTER `likes_count`")) {
        echo "Added `status` column to `artworks`.<br>";
    }
}

// Sync `likes_count` with `likes` table
$conn->query("UPDATE artworks a SET likes_count = (SELECT COUNT(*) FROM likes l WHERE l.artwork_id = a.id)");
echo "Synchronized `likes_count`.<br>";

// 9. Initial Seed Data (Fetch the design/content for the first view)
$seed_users = [
    [1, 'aswinkumar', '$2y$10$65OKqEoHI56QDpjGkvlqveCf1M2y/3wQAO60dnCfpj4c0xZL9Ylc2', 'aswinkumarta2006@gmail.com', 'artist', 'approved'],
    [14, 'eni', '$2y$10$OdfAqSy1tZUSDfykxFM4c.uwc4XIDWSe4084llH6QL2hTnVfXtb7G', 'rekhac19800721@gmail.com', 'artist', 'approved']
];
foreach ($seed_users as $u) {
    $stmt = $conn->prepare("INSERT IGNORE INTO users (id, username, password, email, role, status) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("isssss", $u[0], $u[1], $u[2], $u[3], $u[4], $u[5]);
        $stmt->execute();
    }
}

$seed_art = [
    [7, 1, 'Candid Texture', 'Boy drawing with natural textures', 'freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg'],
    [10, 14, 'Abstract Vision', 'Modern abstract expression', 'WhatsApp Image 2024-10-27 at 19.00.11_c64fc046.jpg']
];
foreach ($seed_art as $a) {
    $stmt = $conn->prepare("INSERT IGNORE INTO artworks (id, artist_id, title, description, image_url, status) VALUES (?, ?, ?, ?, ?, 'approved')");
    if ($stmt) {
        $stmt->bind_param("iisss", $a[0], $a[1], $a[2], $a[3], $a[4]);
        $stmt->execute();
    }
}

echo "Database setup and seeding completed successfully!<br>";
?>
