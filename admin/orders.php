<?php
include '../includes/dbconnect.php';
include 'includes/admin-header.php';
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
				<h3 class="title border-left mb-3">Orders</h3>
				   <table class="table">
					<thead class="table-success">
					  <tr>
						<th>SL</th>
						<th>Date</th>
						
						<th>Customer Name</th>
						<th>Item</th>
						<th>Price</th>
						<th>Status</th>
						<th>Action</th>
						
					  </tr>
					</thead>
					<tbody>
					<?php
					$sl = 0;
					$status = "";
					$invoices = mysqli_query($con,"SELECT * FROM invoices INNER JOIN products ON invoices.prod_id = products.prod_id INNER JOIN logins ON invoices.customer_id = logins.id");
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
						<td>
						
						<a href="orders-edit.php?cid=<?php echo $invrec['customer_id']; ?>&pid=<?php echo $invrec['prod_id']; ?>" class="btn btn-info">Change Status</a>
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