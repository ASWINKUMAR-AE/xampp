<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Art Marketplace - Discover & Commission Artists"; ?></title>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="Connect with talented artists, discover amazing artworks, and commission custom pieces on our Art Marketplace.">
    <meta name="keywords" content="art, marketplace, artist, commission, drawing, painting, digital art">
    
    <!-- External Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }
    </style>
</head>
<body>
<?php include_once __DIR__ . '/../controllers/navbar.php'; ?>
