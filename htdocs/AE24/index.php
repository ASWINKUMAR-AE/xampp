


<?php include 'header.php'; ?>  
<nav class="navbar navbar-expand-lg navbar-light scroll-container" style="overflow-x: auto;">
    <div class="" style="">
        <div class="" style="">
            <?php
            $sql = "SELECT DISTINCT brand FROM products";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<div class="navbar-nav d-flex flex-row p-1  rounded " style="margin-right:0px !important;">';
                while ($row = $result->fetch_assoc()) {
                    // Adding AOS attributes for animation
                    echo '<a class="nav-item nav-link m-3 rounded" data-aos="fade-up" style="font-size:12px;" href="brand_shop.php?brand=' . urlencode($row["brand"]) . '">' . $row["brand"] . '</a>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</nav>


   
    <div class="row p-5 align-items-center col-12 " style="margin-left:0px !important; background-image:url(images/bg.jpg);background-size:cover">
    <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
    <h1>Heading</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
    <div class="d-flex gap-2">
        <a href="" class="btn btn-dark">Call Us</a>
        <a href="" class="btn btn-outline-dark">Know More</a>
    </div>
</div>

<div class="col-md-6 text-center" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
    <img src="images/mk1.png" style="filter: drop-shadow(0 9mm 8mm black);" class="img-fluid rounded-circle w-50 " alt="">
</div>

    </div> 
    <br>
    <div class="container-fluid kk" data-aos="fade-down" data-aos-duration="1000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-image:url(images/header.png);">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner container" >
                <h5 style="color:orange;">Today Offer %</h5>
                <div class="carousel-item active " data-aos="fade-left" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-1 container">
                            <img src="images/w1rolex.png" alt="Graduate Icon" class="d-block img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="watch-details" style="border-left: 1px solid orange; padding-left:10px;">
                                <h2>Rolex</h2>
                                <p class="col-10">Rolex timepieces are the most reputable and renowned timepieces in the world today. Invented by Hans Wilsdorf in 1908 and branded under the iconic Rolex name in 1915, these watches epitomize timeless elegance and prestige among all luxury watches.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" >
                    <div class="row">
                        <div class="col-md-1 container">
                            <img src="images/w1rolex.png" alt="Graduate Icon" class="d-block " style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-8">
                        <div class="watch-details" style="border-left: 1px solid orange; padding-left:10px;">
                        <h2>WATCH NAME</h2>
                                <p>About Watch</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-1 container">
                            <img src="images/w1rolex.png" alt="Graduate Icon" class="d-block " style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-8">
                        <div class="watch-details" style="border-left: 1px solid orange; padding-left:10px;">
                        <h2>WATCH NAME</h2>
                                <p>About Watch</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </div>

<br><br>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 5000
            });
        });
    </script>



<div class="container-fluid " style="margin-top:100px;" >
    <div class="row mb-3  col-13 " style="background-color:rgb(63, 62, 62);">
        <div class="col-md-3">
            <input type="text" id="searchInput" class="form-control m-2" placeholder="Search by Product name" style="display: none;  border-radius:20px !important;">
        </div>
        <div class="col-md-3" >
            <select id="brandFilter" class="form-control m-2" style="display: none;  border-radius:20px !important;">
                <option value="">Filter by brand</option>
                <?php
                $sql = "SELECT DISTINCT brand FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["brand"] . '">' . $row["brand"] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-md-6 text-right">
            <button id="filterButton" class="btn btnfilter" style="background-color: rgb(54, 49, 49); float:right; border-radius: 0px;"><img src="images/filter.png" width="40">Filter By</button>
        </div>
    </div>
  
    <div class="row col-12 align-items-center " style="margin-left:2px !important;" id="productContainer">
    <?php
$sql = "SELECT id, name, price, image, brand FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4 product-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-name="' . $row["name"] . '" data-brand="' . $row["brand"] . '" style="padding:20px;">
            <div class="card mb-4 shadow-sm" style="padding:1px;">
                <img src="admin/' . $row["image"] . '" class="card-img-top img-fluid" alt="' . $row["name"] . '" style="height: 100px; width: 100px; display: block; margin: auto;">
                <div class="card-body" style="background-image:url(images/header.png); border-radius:10px;">
                    <h5 class="card-title">' . $row["name"] . '</h5>
                    <p class="card-text">' . $row["brand"] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Rs.' . $row["price"] . '</span>
                        <a href="product.php?id=' . $row["id"] . '"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--this script is for filtering button-->
<script>
        document.getElementById('filterButton').addEventListener('click', function() {
            let searchInput = document.getElementById('searchInput');
            let brandFilter = document.getElementById('brandFilter');
            searchInput.style.display = searchInput.style.display === 'none' ? 'block' : 'none';
            brandFilter.style.display = brandFilter.style.display === 'none' ? 'block' : 'none';
        });
    </script>



    <!--this script is for filtering Process-->
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        filterProducts();
    });

    document.getElementById('brandFilter').addEventListener('change', function() {
        filterProducts();
    });

    function filterProducts() {
        let searchValue = document.getElementById('searchInput').value.toLowerCase();
        let brandValue = document.getElementById('brandFilter').value.toLowerCase();

        let products = document.getElementsByClassName('product-card');

        Array.from(products).forEach(function(product) {
            let name = product.getAttribute('data-name').toLowerCase();
            let brand = product.getAttribute('data-brand').toLowerCase();

            if ((name.includes(searchValue) || searchValue === '') && (brand === brandValue || brandValue === '')) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>

<br>
 <?php include 'footer.php'; ?>  



