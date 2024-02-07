<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slide-1.jpg" alt="slide-1.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slide-2.jpg" alt="slide-2.jpg"  class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slide-3.jpg" alt="slide-3.jpg"  class="d-block w-100">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!--about section -->
<section class="bglite">
<div class="container">
<div class="row">
<div class="col-md-6">
<h1 class="title">Welcome to Our Bakery</h1>
<p>
Welcome to our bakery, where the aroma of freshly baked delights beckons you to indulge in a world of sweet and savory pleasures. At Blissful Bites Bakery, we take pride in crafting delectable treats that not only satisfy your cravings but also elevate your culinary experience. Our skilled bakers use only the finest ingredients, ensuring that each bite is a symphony of flavors and textures. </p><p>From mouthwatering pastries to artisanal bread, every creation is a testament to our commitment to quality and passion for baking. Step into our warm and inviting space, where the delightful ambiance mirrors the scrumptious offerings that await you.</p>
</div>
<div class="col-md-6">
<img src="assets/images/about.webp" class="img-fluid" alt="about.webp">
</div>
</div>
</div>
</section>
<!-- end about section -->

<!-- cake shop category -->
<section>
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="title">Cake Shop Category</h2>
</div>
<?php
$categories = mysqli_query($con,"select * from category");
while($categories_rec = mysqli_fetch_array($categories))
{
?>
<div class="col-md-3 text-center">
<div class="round-img">
<img src="uploads/<?php echo $categories_rec['catid'].".jpg"; ?>" class="img-fluid" alt="<?php echo $categories_rec['catid'].".jpg"; ?>">
</div>


<h4 class="mb-4"><?php echo $categories_rec['category_name']; ?></h4>
<a href="shop.php?cat=<?php echo $categories_rec['catid']; ?>" class="btn btn-warning text-white">Shop Now</a>
</div>
<?php
}
?>
 
</div>
</div>
 
</section>
<!--  end cake shop category -->

<!-- our best products-->
<section class="bglite">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="title">Our Best Products</h2>
</div>

<?php
$products = mysqli_query($con,"select * from products limit 3");
while($prod_rec = mysqli_fetch_array($products))
{
?>
<div class="col-md-4 text-center  mb-5">
<div class="img-sqr mb-4">
<img src="uploads/<?php echo $prod_rec['prod_image']; ?>" class="img-fluid" alt="<?php echo $prod_rec['prod_image']; ?>">
</div>
<h4 class="mb-4"><?php echo $prod_rec['prod_name']; ?> ($<?php echo $prod_rec['price']; ?>)</h4>
<a href="javascript:void();" class="btn btn-warning text-white addToCart" onclick="insertcart('<?php echo $customer; ?>','<?php echo $prod_rec['prod_id']; ?>','<?php echo $prod_rec['price']; ?>')">Add to cart</a>
</div>
<?php
}
?>
 

</div>
</div>
</section>

<!-- end our best products-->
<section>
<div class="container">
<?php
$products2 = mysqli_query($con,"select * from products where prod_id>4 and prod_id<7");
while($prodrec2 = mysqli_fetch_array($products2))
{
?>
<div class="row mb-5">
<div class="col-md-6">
<img src="uploads/<?php echo $prodrec2['prod_image']; ?>" alt="<?php echo $prodrec2['prod_image']; ?>" class="img-fluid">
</div>

<div class="col-md-6 mt-3">
<h2 class="title"><?php echo $prodrec2['prod_name']; ?> ($<?php echo $prodrec2['price']; ?>)</h2>
<p class="mb-4">The ideal pairing of bread and milk forms a nourishing breakfast, incorporating essential nutrients from milk and starches to fuel your day's activities. Our cakes are meticulously crafted throughout the day to guarantee the freshness of each delectable creation. Dedication to excellence drives our team to consistently produce top-notch cakes, ensuring that every meal is accompanied by the finest baked goods.</p>
<a href="javascript:void();" class="btn btn-warning text-white addToCart" onclick="insertcart('<?php echo $customer; ?>','<?php echo $prodrec2['prod_id']; ?>','<?php echo $prodrec2['price']; ?>')">Shop Now</a>
</div>
</div>
<?php
}
?>
 

</div>
</section>
<div class="successMessage">Item added to cart</div>
 
</main>
<?php include 'includes/footer.php'; ?>

<script>
var login_status = '<?php echo $_SESSION['loginstatus']; ?>';
function insertcart(customerid,productid,amount)
{

if(login_status == "N")
{
	alert('Please login first to continue shopping');
	window.location='login.php';
}
else
{
    $.ajax({
        type: "POST",
        url: "ajax-insert-cart.php",
        data: {custid:customerid,prodid:productid,amt:amount},
        success: function(data) {
        //alert(data)
        },
        error: function(err) {
        alert(err);
        }
    });

 }
}

 
  $(document).ready(function () {
      $('.addToCart').on('click', function () {
         
        $('.successMessage').fadeIn();
 
        setTimeout(function () {
          $('.successMessage').fadeOut();
        }, 2000);
      });
    });
</script>

</body>
</html>
