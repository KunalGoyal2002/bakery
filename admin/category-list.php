<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
if(isset($_GET['del']))
{
$catid = $_GET['del'];	
$c = mysqli_query($con,"delete from category where catid='$catid'");
echo "<script>alert('Deleted!'); window.location='category-list.php';</script>";
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
				<h3 class="title border-left mb-3">Category List</h3>
				   <table class="table">
					<thead class="table-success">
					  <tr>
						<th>SL</th>
						<th>Category Name</th>
						<th>Action</th>
						
					  </tr>
					</thead>
					<tbody>
					<?php
					$sl = 0;
					$category = mysqli_query($con,"select * from category");
					while($catrec = mysqli_fetch_array($category))
					{
					$sl++;
					?>
					  <tr>
						<td><?php echo $sl; ?></td>
						<td><?php echo $catrec['category_name']; ?></td>
						<td><a href="category-list.php?del=<?php echo $catrec['catid']; ?>" class="btn btn-danger">Delete</a>
						
						<a href="category-edit.php?edit=<?php echo $catrec['catid']; ?>" class="btn btn-info">Edit</a>
						</td>
					  </tr>
					  <?php
					}
					?>
					 
					</tbody>
				</table>
				</div>
				</div>
 </div>
 </div>
 </section>
</div>
</main>
</body>
</html>