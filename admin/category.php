<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
if(isset($_POST['submit']))
{
$target_dir = "../uploads/";
$catimg_id_query = mysqli_query($con,"select ifnull(max(catid),0)+1 from category");
$id = mysqli_fetch_array($catimg_id_query );
$target_file = $target_dir . $id[0].".jpg";
move_uploaded_file($_FILES["cat_img"]["tmp_name"], $target_file);
$catname = $_POST['cat_name'];	
$c = mysqli_query($con,"select * from category where category_name='$catname'");
if(mysqli_num_rows($c)>0)
{
	echo "<script>alert('This category name already exist');</script>";
}
else
{
	mysqli_query($con,"insert into category(catid,category_name) values('$id[0]','$catname')");
	echo "<script>alert('Added!'); window.location='category-list.php';</script>";
}
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
				<h3 class="title border-left mb-3">Add Category</h3>
				 
					<form class="contact-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" required>
                        </div>
						</div>
						
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="cat_img" required>
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