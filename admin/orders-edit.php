<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
if(isset($_POST['changestatusbtn']))
{
	$changestatus = $_POST['changestatus'];
	mysqli_query($con,"update invoices set status='$changestatus' where customer_id='".$_GET['cid']."' and prod_id='".$_GET['pid']."'");
	echo "<script>window.location='orders.php';</script>";
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
				<h3 class="title border-left mb-3">Orders Edit</h3>
				   <table class="table">
					<thead class="table-success">
					  <tr>
						<th>SL</th>
						<th>Date</th>
						
						<th>Customer Name</th>
						<th>Item</th>
						<th>Price</th>
						<th>Status</th>
						 
						
					  </tr>
					</thead>
					<tbody>
					<?php
					$sl = 0;
					$status = "";
					if(isset($_GET['cid']))
					{
						$cid = $_GET['cid'];
						$pid = $_GET['pid'];
					$invoices = mysqli_query($con,"SELECT * FROM invoices INNER JOIN products ON invoices.prod_id = products.prod_id INNER JOIN logins ON invoices.customer_id = logins.id where invoices.customer_id='$cid' and invoices.prod_id='$pid'");
					while($invrec = mysqli_fetch_array($invoices))
					{
					$sl++;
					if($invrec['status'] == '0')
					{
					$status = '<div class="badge bg-danger">Pending</div>';
					}
					else
					{
						$status = '<div class="badge bg-success">Delivered</div>';
					}
					?>
					  <tr>
						<td><?php echo $sl; ?></td>
						<td><?php echo $invrec['inv_date']; ?></td>
						
						<td><?php echo $invrec['fullname']; ?></td>
						<td><?php echo $invrec['prod_name']; ?></td>
						<td>$<?php echo $invrec['price']; ?></td>
						<td><?php echo $status; ?></td>
						 
					  </tr>
					  <?php
					}
					}
					?>
					<form action="" method="POST">
					 <tfoot>
					 <tr>
					 <td>
					 <label class="mb-2"><b>Change Status</b></label>
					 <select name="changestatus" class="form-control">
					 <option value="0">Pending</option>
					 <option value="1">Delivered</option>
					 </select>
					 </td>
					 <td><button type="submit" name="changestatusbtn" class="btn btn-warning mt-4">Change Status</button></td>
					 </tr>
					 </tfoot>
					 </form>
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