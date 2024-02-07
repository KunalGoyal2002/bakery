<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
if(isset($_POST['submit']))
{
	mysqli_query($con,"update invoices set status='1' where customer_id='$customer'");
	echo "<script>window.location='thanks.php';</script>";
}

if(isset($_GET['d']))
{
$pid = 	$_GET['d'];
mysqli_query($con,"delete from invoices where prod_id='$pid' and customer_id='$customer'");
echo "<script>window.location='cart.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<!--cart section -->
<section class="bglite pt-0 ">
 <div class="container">
        <div class="cart-section">
            <h2>Your Shopping Cart</h2>
			
			<?php
			$cartquery = mysqli_query($con,"select * from invoices inner join products on invoices.prod_id=products.prod_id where invoices.customer_id='$customer' and invoices.status='0'");
			 if(mysqli_num_rows($cartquery)>0)
			 {
			while($cartrec = mysqli_fetch_array($cartquery))
			{
			?>
            <div class="product-row bg-body">
                <div class="product-details mb-3">
                    <img src="uploads/<?php echo $cartrec['prod_image']; ?>" alt="<?php echo $cartrec['prod_image']; ?>" class="product-image">
                    <div>
                        <h4><?php echo $cartrec['prod_name']; ?></h4>
                        <p>Price: $<?php echo $cartrec['price']; ?></p>
                    </div>
                </div>
                <div class="product-quantity d-flex">
                    <input type="text" readonly class="form-control text-center p-2 mx-md-2" value="1"> <a class="btn btn-danger ml-2" href="cart.php?d=<?php echo $cartrec['prod_id'] ?>">Delete</a>
                </div>
            </div>
			<?php
			}
			
			?>
			<div class="cart-summary bg-body p-5">
			<h5>Shipping Address:</h5>
			<p><?php echo $_SESSION['username']; ?></p>
			<p><?php echo $_SESSION['useraddress']; ?></p>
			</div>
 
            <div class="cart-summary bg-body p-5">
			<?php
			$totalitems = mysqli_query($con,"select * from invoices where customer_id='$customer' and invoices.status='0'");
			?>
			
			<?php
			$totalamt = mysqli_query($con,"select sum(amount) amount from invoices where customer_id='$customer' and invoices.status='0'");
			$t = mysqli_fetch_array($totalamt);
			?>
                <h5>Order Summary</h5>
                <p>Total Items: <?php echo mysqli_num_rows($totalitems); ?></p>
                <p>Subtotal: $<?php echo $t['amount']; ?></p>
                <p>Shipping: $5.00</p>
                <h4>Total: $<?php echo $t['amount']+5; ?>.00</h4>
				<form action="" method="POST">
                <button type="submit" name="submit" class="btn btn-primary">Proceed to Checkout</button>
				</form>
				<?php
			 }
			 ?>
            </div>
        </div>
    </div>
</section>
<!-- end cart section -->
 
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
