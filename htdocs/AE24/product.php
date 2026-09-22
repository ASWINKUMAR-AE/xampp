
<?php include 'connect.php'; ?>  
<?php
// Get the id from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Check if id is not empty
if (!empty($id)) {
    // Get data from the database based on the id
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $price = $row['price'];
        $brand = $row['brand'];
        $image = $row['image'];
        $description = $row['description'];
    } else {
        echo "Data not found";
    }
} else {
    echo "No id found in the URL";
}
?>

<?php include 'header.php'; ?>  
<style>
    body{
        overflow-x: hidden !important;
    }
    .card{
        transition: transform 0.2s;
    }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.2s;
        }

        .product-card img{
            width: 60%;
            float: right;
  
  margin: 0px 0px 15px 20px;
        }
        .product-card    img {
  --s: 15px;  
  --b: 1px;  
  --w: 350px; 
  --c: orange;
  
  width: var(--w);
  aspect-ratio: 1;
  object-fit: cover;
  padding: calc(2*var(--s));
  --_g: var(--c) var(--b),#0000 0 calc(100% - var(--b)),var() 0;
  background:
    linear-gradient(      var(--_g)) 50%/100% var(--_i,100%) no-repeat,
    linear-gradient(90deg,var(--_g)) 50%/var(--_i,100%) 100% no-repeat;
  outline: calc(var(--w)/2) solid #0009;
  outline-offset: calc(var(--w)/-2 - 2*var(--s));
  transition: .4s;
  cursor: pointer;
}
.product-card img:hover {
  outline: var(--b) solid var(--c);
  outline-offset: calc(var(--s)/-2);
  --_i: calc(100% - 2*var(--s));

}
@media only screen and (max-width: 800px) {
   .card-img-top{
    width: 40% !important;
   }

}
    </style>
<center>

<div class="container mt-4"  style="width: 100%;">

    <div class="row col-lg-8" id="productContainer" style="width: 90%;">
    <?php
    if(isset($_SESSION['user_name'])){
        echo '
        <div class="col-md-6 product-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-name="' . $row["name"] . '" data-brand="' . $row["brand"] . '" style="width: 100%; margin: 0 auto;">
            <div class="card mb-4 shadow-sm">
                <div class="card-body" style=" background-color: rgb(27, 26, 26) !important; border-radius:10px; overflow:hidden;">
                        <img src="admin/' . $row["image"] . '" class="card-img-top img-fluid rounded" alt="' . $row["name"] . '"  >
    
                 <div class="" style="margin-top:50px; "> <h5 class="card-title text-white">' . $row["name"] . '</h5>
                  <p class="card-text text-secondary">' . $row["brand"] . '</p>
                   <p class="card-text">' . $row["description"] . '</p>
                  <div class="d-flex justify-content-between align-items-center">
                      <span class=" text-secondary">Rs.' . $row["price"] . '</span>
                    <a href="buy.php?id=' . $row["id"] . '">  <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button></a>
                  </div>
                  </div>
                </div>
            </div>
        </div>';
    }
    else{
        echo '
        <div class="col-md-6 product-card" data-name="' . $row["name"] . '" data-brand="' . $row["brand"] . '" style="width: 100%; margin: 0 auto;">
            <div class="card mb-4 shadow-sm">
                <div class="card-body" style=" background-color: rgb(27, 26, 26) !important; border-radius:10px; overflow:hidden;">
                        <img src="admin/' . $row["image"] . '" class="card-img-top img-fluid rounded" alt="' . $row["name"] . '"  >
    
                 <div class="" style="margin-top:50px; "> <h5 class="card-title text-white">' . $row["name"] . '</h5>
                  <p class="card-text text-secondary">' . $row["brand"] . '</p>
                   <p class="card-text">' . $row["description"] . '</p>
                  <div class="d-flex justify-content-between align-items-center">
                      <span class=" text-secondary">Rs.' . $row["price"] . '</span>
                      <a href="form.php">  <button type="button" class="btn btn-sm btn-outline-secondary">To Login</button></a>
                  </div>
                  </div>
                </div>
            </div>
            <span class="alert alert-danger text-danger"  data-aos="fade-up" data-aos-duration="1000" >Login to shoping</span>
        </div>';
    }
    ?>
    </div>
</div>
</center>

<?php include 'footer.php' ?>
