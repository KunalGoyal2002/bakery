<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
if(isset($_GET['cat']))
{
	$cat = $_GET['cat'];
	$query = "select * from products where prod_cat_id='$cat'";
}

if(isset($_POST['searchbtn1']))
{
	$searchbox1 = $_POST['searchbox1'];	
	$query = "select * from products where prod_name like '%$searchbox1%'";
}
 
if(isset($_POST['searchbtn2']))
{
	$searchbox2 = $_POST['searchbox2'];	
	$query = "select * from products where prod_name like '%$searchbox2%'";
}
if((!isset($_GET['cat'])) and (!isset($_POST['searchbtn1'])) and (!isset($_POST['searchbtn2'])))
{
	$query = "select * from products";
}
 
$products = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>


<!-- our best products-->
<section class="bglite">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="title">Our Best Products</h2>
</div>

<?php
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
