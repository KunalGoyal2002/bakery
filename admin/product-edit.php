<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
if(isset($_GET['edit']))
{
$prodid = $_GET['edit'];	
$prod_sel = mysqli_query($con,"select * from products where prod_id='$prodid'");
$prodrec = mysqli_fetch_array($prod_sel);

}
if(isset($_POST['submit']))
{
$target_dir = "../uploads/";
$prod_name = $_POST['prod_name'];
$category = $_POST['category'];
$price = $_POST['price'];
$prodimg = "p-$prodid".".jpg";	
$img = basename($_FILES["prodimg"]["name"]);
if(empty($img))
{ 
	mysqli_query($con,"update products set prod_name='$prod_name',price='$price',prod_cat_id='$category' where prod_id='$prodid'");
}
else
{
	
$target_file = $target_dir . $prodimg;
move_uploaded_file($_FILES["prodimg"]["tmp_name"], $target_file);	
mysqli_query($con,"update products set prod_name='$prod_name',price='$price',prod_cat_id='$category',prod_image='$prodimg' where prod_id='$prodid'");

}
 echo "<script>alert('updated'); window.location='product-list.php';</script>";
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
				<h3 class="title border-left mb-3">Product Edit</h3>
				 
					<form class="contact-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="prod_name" value="<?php echo $prodrec['prod_name']; ?>" required>
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
								if($catrec['catid'] == $prodrec['prod_cat_id'])
								{
									$selected="selected";
								}
								else
								{
									$selected = "";
								}
							?>
							<option value="<?php echo $catrec['catid']; ?>" <?php echo $selected; ?>><?php echo $catrec['category_name']; ?></option>
							<?php
							}
							?>
							</select>
                        </div>
						</div>
						
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Price</label>
                           <input type="number" class="form-control" name="price" value="<?php echo $prodrec['price']; ?>"  required>
                        </div>
						</div>
						
						<div class="col-md-12">
						<div class="mb-3">
                            <label class="form-label">Product Image</label><br>
                            <input type="file" class="form-control" name="prodimg">
							<br>
							<div style="width:40%">
							<img src="../uploads/<?php echo $prodrec['prod_image']; ?>" width="100%">
							</div>
                        </div>
						</div>
						
						</div>

                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
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