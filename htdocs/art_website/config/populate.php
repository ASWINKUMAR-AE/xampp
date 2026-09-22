<?php
/**
 * Data Import & Status Fixer
 * This script imports the original data and ensures statuses are 'approved'
 */
require_once 'db.php';

echo "Populating database with original data...<br>";

// 1. Insert Users from original SQL
$users = [
    [1, 'aswinkumar', '$2y$10$65OKqEoHI56QDpjGkvlqveCf1M2y/3wQAO60dnCfpj4c0xZL9Ylc2', 'aswinkumarta2006@gmail.com', 'artist', 'approved'],
    [14, 'eni', '$2y$10$OdfAqSy1tZUSDfykxFM4c.uwc4XIDWSe4084llH6QL2hTnVfXtb7G', 'rekhac19800721@gmail.com', 'artist', 'approved'],
    [16, 'ASWIN_KUMAR', '$2y$10$TTbNJ7SPScjppGJ6ieVw..6N5MjLMwIDUQgqbDMThOEPidYckrKhO', 'aswinkumar_art@gmail.com', 'artist', 'approved']
];

foreach ($users as $u) {
    $stmt = $conn->prepare("INSERT IGNORE INTO users (id, username, password, email, role, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $u[0], $u[1], $u[2], $u[3], $u[4], $u[5]);
    $stmt->execute();
}

// 2. Insert Artworks
$art = [
    [7, 1, 'Candid Texture', 'Boy drawing with natural textures', 'freepik__candid-image-photography-natural-textures-highly-r__53077.jpeg'],
    [10, 14, 'Abstract Vision', 'Modern abstract expression', 'WhatsApp Image 2024-10-27 at 19.00.11_c64fc046.jpg'],
    [12, 14, 'Classic Sketch', 'Detailed graphite portrait', 'freepik__candid-image-photography-natural-textures-highly-r__53076.jpeg']
];

foreach ($art as $a) {
    $stmt = $conn->prepare("INSERT IGNORE INTO artworks (id, artist_id, title, description, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $a[0], $a[1], $a[2], $a[3], $a[4]);
    $stmt->execute();
}

// 3. Ensure artworks status column and set to approved
$conn->query("ALTER TABLE artworks ADD COLUMN IF NOT EXISTS status ENUM('pending', 'approved') DEFAULT 'approved'");
$conn->query("UPDATE artworks SET status = 'approved'");

echo "Done! Database populated and statuses set to 'approved'.<br>";
?>
