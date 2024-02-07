<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';

if(isset($_POST['submit']))
{
$target_dir = "../uploads/";
$prod_name = $_POST['prod_name'];
$category = $_POST['category'];
$price = $_POST['price'];
$prodid_query = mysqli_query($con,"select ifnull(max(prod_id),0)+1 from products");
$id = mysqli_fetch_array($prodid_query);
$id = $id[0];
$prodimg = "p-$id".".jpg";
$target_file = $target_dir . $prodimg;
move_uploaded_file($_FILES["prodimg"]["tmp_name"], $target_file);
mysqli_query($con,"insert into products(prod_id,prod_name,price,prod_image,prod_cat_id) values('$id','$prod_name','$price','$prodimg','$category')");
echo "<script>alert('added'); window.location='product-list.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../includes/header.php';?>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<body>
<main>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>


<div class="content bg-light">
 <section>
 <div class="container">
 <div class="row">
<div class="col-md-12 mb-5">
				
				<div class="formdiv">
				<h3 class="title border-left mb-3">Add Product</h3>
				 
					<form class="contact-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="prod_name" required>
                        </div>
						</div>
						
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category" required>
							<?php
							$category = mysqli_query($con,"select * from category");
							while($catrec = mysqli_fetch_array($category))
							{
							?>
							<option value="<?php echo $catrec['catid']; ?>"><?php echo $catrec['category_name']; ?></option>
							<?php
							}
							?>
							</select>
                        </div>
						</div>
						
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Price</label>
                           <input type="number" class="form-control" name="price" required>
                        </div>
						</div>
						
						<div class="col-md-12">
						<div class="mb-3">
                            <label class="form-label">Product Image</label><br>
                            <input type="file" name="prodimg" required>
                        </div>
						</div>
						
						</div>

                        <button type="submit" name="submit" class="btn btn-warning">Add</button>
                    </form>
				</div>
				</div>
 </div>
 </div>
 </section>
</div>
</main>
</body>
</html>