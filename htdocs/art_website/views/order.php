<?php
session_start();
include '../config/db.php'; 

// Smart Path Detection for Navbar
$base_path = "../";

// Check if artist_id is set in the URL
$artistId = isset($_GET['artist_id']) ? (int)$_GET['artist_id'] : 0;
$customer = null;
$artist = null;

if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT username, email, phone_number FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']); 
    $stmt->execute();
    $customer = $stmt->get_result()->fetch_assoc();
}

if ($artistId) {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ? AND role = 'artist'");
    $stmt->bind_param("i", $artistId);
    $stmt->execute();
    $artist = $stmt->get_result()->fetch_assoc();
}

if (!$artist) {
    header("Location: " . $base_path . "index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commission Artist - <?php echo htmlspecialchars($artist['username']); ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary: #6b46c1;
            --bg-dark: #0f1113;
            --card-bg: #1a1d21;
            --accent: #007bff;
        }

        body {
            background-color: var(--bg-dark);
            color: #e9ecef;
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
        }

        .order-wrapper {
            padding: 100px 0;
        }

        .glass-card {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 40px;
            padding: 50px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.6);
        }

        .section-title {
            color: var(--primary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        .section-title::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(107, 70, 193, 0.2);
            margin-left: 20px;
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 50px;
            padding: 15px 25px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--primary);
            box-shadow: 0 0 20px rgba(107, 70, 193, 0.2);
            color: #fff;
        }

        textarea.form-control {
            border-radius: 25px;
        }

        .btn-submit {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 18px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            width: 100%;
            margin-top: 30px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-submit:hover {
            background: #553c9a;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(107, 70, 193, 0.4);
        }

        .artist-info-badge {
            background: rgba(107, 70, 193, 0.1);
            border: 1px solid var(--primary);
            padding: 20px;
            border-radius: 30px;
            text-align: center;
            margin-bottom: 40px;
        }

        /* Custom Checkbox/Radio styling */
        .custom-option {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 50px;
            padding: 10px 20px;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .form-check-input:checked + .custom-option {
            background: var(--primary);
            border-color: var(--primary);
        }
        .form-check-input { display: none; }

        @media (max-width: 768px) {
            .glass-card { padding: 30px 20px; border-radius: 30px; }
        }
    </style>
</head>
<body>

    <!-- Include Universal Navbar -->
    <?php include_once $base_path . 'controllers/navbar.php'; ?>

    <div class="container order-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                
                <div class="glass-card">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold mb-3">Commission Art</h1>
                        <p class="text-muted">Fill out the details below to start your personalized drawing journey.</p>
                    </div>

                    <div class="artist-info-badge">
                        <p class="mb-0 small text-uppercase fw-bold opacity-75">Ordering from</p>
                        <h4 class="mb-0 text-white"><?php echo htmlspecialchars($artist['username']); ?></h4>
                        <span class="small text-primary"><?php echo htmlspecialchars($artist['email']); ?></span>
                    </div>

                    <form action="submit_order.php" method="post" enctype="multipart/form-data">
                        
                        <div class="section-title">Step 1: Your Details</div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted">Full Name</label>
                                <input type="text" class="form-control" name="customer_name" value="<?php echo isset($customer['username']) ? htmlspecialchars($customer['username']) : ''; ?>" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted">Email Address</label>
                                <input type="email" class="form-control" name="customer_email" value="<?php echo isset($customer['email']) ? htmlspecialchars($customer['email']) : ''; ?>" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted">Phone Number</label>
                                <input type="tel" class="form-control" name="customer_phone" value="<?php echo isset($customer['phone_number']) ? htmlspecialchars($customer['phone_number']) : ''; ?>" required>
                            </div>
                        </div>

                        <div class="section-title">Step 2: Artwork Vision</div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label ms-3 small text-muted">Project Title</label>
                                <input type="text" class="form-control" name="artwork_title" placeholder="Give your masterpiece a name..." required>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label ms-3 small text-muted">Detailed Description</label>
                                <textarea class="form-control" name="artwork_description" rows="5" placeholder="Tell the artist your story, colors, mood..." required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label ms-3 small text-muted">Reference Image</label>
                                <input type="file" class="form-control" name="artwork_image" accept="image/*" required>
                                <div class="form-text ms-3 fw-light opacity-50">Upload a photo to help the artist realize your vision.</div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label ms-3 small text-muted">Desired Delivery Date</label>
                                <input type="date" class="form-control" name="submission_date" required>
                            </div>
                        </div>

                        <div class="section-title">Step 3: Specifications</div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted d-block mb-3">Paper Size</label>
                                <?php foreach(['A4', 'A3', 'A2'] as $size): ?>
                                    <div class="form-check d-inline-block p-0">
                                        <input class="form-check-input" type="checkbox" id="size<?php echo $size; ?>" name="paper_size[]" value="<?php echo $size; ?>">
                                        <label class="custom-option" for="size<?php echo $size; ?>"><?php echo $size; ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted d-block mb-3">Sketch Intensity</label>
                                <div class="form-check d-inline-block p-0">
                                    <input class="form-check-input" type="radio" id="rangeLight" name="sketch_range" value="Light" required>
                                    <label class="custom-option" for="rangeLight">Light</label>
                                </div>
                                <div class="form-check d-inline-block p-0">
                                    <input class="form-check-input" type="radio" id="rangeDark" name="sketch_range" value="Dark">
                                    <label class="custom-option" for="rangeDark">Dark</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label ms-3 small text-muted">People in Picture</label>
                                <select class="form-select" name="face_count" required>
                                    <option value="" disabled selected>Member of faces</option>
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?> Face<?php echo $i>1?'s':''; ?></option>
                                    <?php endfor; ?>
                                    <option value="more">More than 5</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label ms-3 small text-muted">Extra Notes (Optional)</label>
                            <textarea class="form-control" name="additional_notes" rows="2"></textarea>
                        </div>

                        <input type="hidden" name="artist_id" value="<?php echo $artistId; ?>">
                        <input type="hidden" name="artist_email" value="<?php echo htmlspecialchars($artist['email']); ?>">
                        <input type="hidden" name="customer_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">

                        <button type="submit" class="btn-submit shadow">Request Commission</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 text-center text-muted border-top border-secondary mt-5" style="background: #0a0c0e;">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> DRAWING WITH ASWIN. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
    </script>
</body>
</html>
