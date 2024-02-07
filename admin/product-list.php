<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';

if(isset($_GET['del']))
{
$prodid = $_GET['del'];	
$c = mysqli_query($con,"delete from products where prod_id='$prodid'");
unlink("../uploads/p-$prodid".".jpg");
echo "<script>alert('Deleted!'); window.location='product-list.php';</script>";
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
				<h3 class="title border-left mb-3">Product List</h3>
				   <table class="table">
					<thead class="table-success">
					  <tr>
						<th>SL</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Action</th>
						
					  </tr>
					</thead>
					<tbody>
					<?php
					$sl = 0;
					$q = mysqli_query($con,"select * from products");
					while($rec = mysqli_fetch_array($q))
					{
					$sl++;
					?>
					  <tr>
						<td><?php echo $sl; ?></td>
						<td><?php echo $rec['prod_name']; ?></td>
						<td>$<?php echo $rec['price']; ?></td>
						<td><a href="product-list.php?del=<?php echo $rec['prod_id']; ?>" class="btn btn-danger">Delete</a>
						
						<a href="product-edit.php?edit=<?php echo $rec['prod_id']; ?>" class="btn btn-info">Edit</a>
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