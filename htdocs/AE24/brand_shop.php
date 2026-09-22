

<?php include 'header.php'; ?>  
<?php
$brand_name = isset($_GET['brand']) ? $_GET['brand'] : '';
?>
<div class="container-fluid " >
    <div class="row mb-3  col-13 " style="background-color:rgb(63, 62, 62);">
        <div class="col-md-3">
            <input type="text" id="searchInput" class="form-control m-2" placeholder="Search by Product name" style="display: none;">
        </div>
        <div class="col-md-3">
            <select id="brandFilter" class="form-control m-2" style="display: none;">
                <option value="">Filter by brand</option>
                <?php
                $sql = "SELECT DISTINCT brand FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $brand = $row["brand"];
                    if($brand_name == $brand) {
                        echo '<option value="' . $brand . '" selected disabled>' . $brand . '</option>';
                    } else {
                        echo '<option value="' . $brand . '" disabled>' . $brand . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-md-6 text-right">
            <button id="filterButton" class="btn " style="background-color: rgb(54, 49, 49);float:right; border-radius: 0px;"><img src="images/filter.png" width="40">Filter By</button>
        </div>
    </div>
  
    <div class="row col-12" id="productContainer" >
        <?php
        $sql = "SELECT id, name, price, image, brand FROM products WHERE brand = '$brand_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4 product-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-name="' . $row["name"] . '" data-brand="' . $row["brand"] . '">
                    <div class="card mb-4 shadow-sm">
                        <img src="admin/' . $row["image"] . '" class="card-img-top img-fluid" alt="' . $row["name"] . '"  >
                        <div class="card-body " style="   background-image:url(images/header.png); border-radius:10px;">
                            <h5 class="card-title">' . $row["name"] . '</h5>
                            <p class="card-text">' . $row["brand"] . '</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Rs.' . $row["price"] . '</span>
                              <a href="product.php?id=' . $row["id"] . '&brand=' . $row["brand"] . '">  <button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
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

<?php include 'footer.php'; ?>  

