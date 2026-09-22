<?php include './component/pro_head.php'; ?>

<!-- Breadcrumb Section -->
<div class="breadcrumb-option spad" style="background-image: url('img/about/bg-5.jpg'); background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text py-4" data-aos="fade-down" data-aos-duration="1000">
                    <h2 class="text-white">Products</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    body {
        background-color: #100028;
    }

    .product-card {
        background: rgba(26, 26, 26, 0.57);
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
    }

    .product-image {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
        height: 200px;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-image img:hover {
        transform: scale(1.1);
    }

    .product-card-body {
        padding: 20px;
    }

    .product-category {
        font-size: 14px;
        color: #ccc;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        color: #fff;
    }

    .product-title:hover {
        color: #ffc107;
        text-decoration: none;
    }

    .product-price {
        font-size: 16px;
        font-weight: 700;
        color: #4caf50;
    }

    .filter-buttons .btn {
        border-radius: 30px;
    }

    .filter-buttons .btn i {
        font-size: 1.5rem; /* Adjust icon size */
    }

    main {
        border-radius: 50px 50px 0px 0px !important;
        padding-top: 50px; /* Extra padding to make space for border radius */
    }
</style>

<main class="container-fluid pt-5 " data-aos="fade-up" data-aos-duration="1000">
    <div class="container" data-aos="fade-in" data-aos-duration="1000">

        <!-- Filter Buttons -->
        <div class="filter-buttons text-center mb-5">
            <div class="btn-group d-flex flex-wrap justify-content-center">
                <button class="btn btn-outline-light active" data-bs-toggle="filter" data-filter="*">
                    <i class="bi bi-grid-3x3-gap"></i> <!-- Icon for All -->
                </button>
                <button class="btn btn-outline-success" data-bs-toggle="filter" data-filter=".electronics">
                    <i class="bi bi-laptop"></i> <!-- Icon for Electronics -->
                </button>
                <button class="btn btn-outline-warning" data-bs-toggle="filter" data-filter=".beauty">
                    <i class="bi bi-makeup"></i> <!-- Icon for Beauty -->
                </button>
                <button class="btn btn-outline-danger" data-bs-toggle="filter" data-filter=".sale">
                    <i class="bi bi-tag"></i> <!-- Icon for Sale -->
                </button>
                <button class="btn btn-outline-primary" data-bs-toggle="filter" data-filter=".fashion">
                    <i class="bi bi-shirt"></i> <!-- Icon for Fashion -->
                </button>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row">
            <?php
            $products = [
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/l4ssfww0/shaver/p/r/p/538-professional-hair-cutting-machine-professional-rechargeable-original-imagfhm7pvgyaz3j.jpeg?q=70", "category" => "electronics", "title" => "Zeus Volt Professional Shaver", "price" => 4900],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/khdqnbk0/computer/f/y/t/apple-original-imafxfyqydgvrkzv.jpeg?q=70", "category" => "electronics", "title" => "APPLE 2020 Macbook Air M1", "price" => 84900],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/ku2zjww0/computer/r/f/d/na-gaming-laptop-hp-original-imag7a7fgvrae7uu.jpeg?q=70", "category" => "electronics", "title" => "HP Pavilion Ryzen 5 Hexa Core", "price" => 56990],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/kiqbma80-0/sari/x/q/w/free-light-green-satin-sari-arihant-fashion-original-imafyy2arfxszegm.jpeg?q=70", "category" => "fashion", "title" => "Designer Green Satin Saree", "price" => 2299],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/xif0q/shirt/2/n/d/m-stylish-shirt-clothing-original-imagm6hbygh8rkxz.jpeg?q=70", "category" => "fashion", "title" => "Men's Stylish Shirt", "price" => 1199],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/l4n2oi80/lipstick/o/e/6/4-2-2-pp-clrmatmc010-purplle-original-imagfh6whcvfn86m.jpeg?q=70", "category" => "beauty", "title" => "Matte Lipstick", "price" => 399],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/ka492fk0/headphone/5/0/c/redgear-original-imafrkdhggcrjnbc.jpeg?q=70", "category" => "electronics", "title" => "RedGear Gaming Headset", "price" => 1499],
                ["img1" => "https://rukminim1.flixcart.com/image/832/832/kz8q8sw0/trimmer/2/t/0/0-4-mm-bht-100-ws01-lifelong-original-imagb7v4cfht8hdd.jpeg?q=70", "category" => "sale", "title" => "Lifelong Beard Trimmer", "price" => 999],
            ];

            foreach ($products as $product) { ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4 mix <?= strtolower($product['category']) ?>" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card product-card">
                        <div class="product-image">
                            <img src="<?= $product['img1'] ?>" alt="<?= $product['title'] ?>" class="img-fluid">
                        </div>
                        <div class="card-body product-card-body text-center">
                            <p class="product-category text-uppercase"><?= ucfirst($product['category']) ?></p>
                            <a href="#" class="product-title d-block mb-2"><?= $product['title'] ?></a>
                            <p class="product-price">₹<?= number_format($product['price']) ?></p>
                            <button class="btn btn-sm btn-outline-light rounded-pill">Buy Now</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>

<?php include './component/footer.php'; ?>

<!-- Initialize AOS -->
<script>
    AOS.init();
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll('[data-bs-toggle="filter"]');
        const products = document.querySelectorAll('.mix');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                products.forEach(product => {
                    product.style.display = filter === '*' || product.classList.contains(filter.replace('.', ''))
                        ? 'block'
                        : 'none';
                });
            });
        });
    });
</script>
