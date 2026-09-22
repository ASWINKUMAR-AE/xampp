<?php include 'component/pro_head.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<style>
    body {
        background: linear-gradient(135deg, rgba(43, 3, 67, 1) 0%, rgba(100, 50, 150, 1) 100%);
    }

    .product-container {
       /* From https://css.glass */
background: rgba(255, 255, 255, 0.53);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 40px;
        overflow-x: hidden !important;

        margin-top: 100px !important;
    }

    .product-image {
        max-width: 100%;
        border-radius: 55px;
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
    }

    .buy-button {
        background-color: #6c63ff;
        color: white;
        border-radius: 25px;
        padding: 12px 30px;
        font-size: 16px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .buy-button:hover {
        background-color: #4e41c7;
    }

    .small-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin: 0 10px;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .small-image:hover {
        transform: scale(1.1);
    }

    .price-tag {
        font-size: 24px;
        color: #6c63ff;
        font-weight: bold;
        margin-top: 20px;
    }

    .product-details h1 {
        font-size: 36px;
        color: #2c2c2c;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .product-details p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .product-features ul {
        font-size: 16px;
        color: #444;
    }

    .product-features ul li {
        margin: 10px 0;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .product-container {
            padding: 20px;
        }

        .product-image {
            width: 90%;
            margin: 0 auto;
        }

        .buy-button {
            width: 100%;
        }
    }
</style>

<div class="container-fluid py-5 mt-5 product-container" data-aos="fade-down" data-aos-duration="1500">
    <div class="row">
        <!-- Main Product Image -->
        <div class="col-md-6 text-center" data-aos="flip-left" data-aos-duration="2000">
            <img src="https://via.placeholder.com/400" alt="USB Wired Mouse" class="product-image">
        </div>

        <!-- Product Details -->
        <div class="col-md-6 product-details" data-aos="flip-right" data-aos-duration="2200">
            <h1 class="mb-3">USB Wired Mouse</h1>
            <p>Experience smooth and precise tracking with this ergonomic USB wired mouse, suitable for everyday use. Its sleek design ensures comfort during long hours of work or gaming.</p>
            <div class="price-tag">$29.99</div>
            <button class="btn buy-button mt-3" data-aos="zoom-in-up" data-aos-duration="1800">BUY NOW</button>

            <!-- Small Images Section -->
            <div class="mt-4" data-aos="slide-up" data-aos-duration="1500">
                <img src="https://via.placeholder.com/80" alt="Mouse angle 1" class="small-image">
                <img src="https://via.placeholder.com/80" alt="Mouse angle 2" class="small-image">
                <img src="https://via.placeholder.com/80" alt="Mouse angle 3" class="small-image">
            </div>
        </div>
    </div>

    <!-- Additional Details -->
    <div class="row mt-5" data-aos="zoom-out" data-aos-duration="2000">
        <div class="col product-features">
            <h4>Product Features</h4>
            <ul>
                <li>Ergonomic design for comfortable grip</li>
                <li>Plug-and-play functionality</li>
                <li>High-precision tracking sensor</li>
                <li>Durable build with smooth buttons</li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
