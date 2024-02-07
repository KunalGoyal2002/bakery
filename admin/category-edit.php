<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
if(isset($_GET['edit']))
{
$catid = $_GET['edit'];	
$cat_sel = mysqli_query($con,"select * from category where catid='$catid'");
$catrec = mysqli_fetch_array($cat_sel);

}
if(isset($_POST['submit']))
{
$id = $catid;
$target_dir = "../uploads/";
$catname = $_POST['cat_name'];	
$img = basename($_FILES["cat_img"]["name"]);
if(empty($img))
{ 
	mysqli_query($con,"update category set category_name='$catname' where catid='$id'");
}
else
{
	
$target_file = $target_dir . $id.".jpg";
move_uploaded_file($_FILES["cat_img"]["tmp_name"], $target_file);	
mysqli_query($con,"update category set category_name='$catname' where catid='$id'");

}
 echo "<script>alert('updated'); window.location='category-list.php';</script>";
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
				<h3 class="title border-left mb-3">Category Edit</h3>
				 
					<form class="contact-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" value="<?php echo $catrec['category_name']; ?>" required>
                        </div>
						</div>
						
						<div class="col-md-4">
						<div class="mb-3">
                            <label class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="cat_img">
							<br>
							<div style="width:40%">
							<img src="../uploads/<?php echo $catrec['catid'].".jpg"; ?>" width="100%">
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