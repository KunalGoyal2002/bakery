<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
 
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<section class="bglite pt-0">
 <div class="container">
        <div class="cart-section">
            <h2 class="mb-5">Your Order History</h2>
			<table class="table">
			<thead class="table-dark">
			  <tr>
				<th>SL</th>
				<th>Date</th>
				<th> </th>
				<th>Item</th>
				<th>Price</th>
				 
			  </tr>
			</thead>
			<tbody>
			  
			<?php
			 
			$cartquery = mysqli_query($con,"select * from invoices inner join products on invoices.prod_id=products.prod_id where invoices.customer_id='$customer'");
			 if(mysqli_num_rows($cartquery)>0)
			 {
				 $sl = 0;
			while($cartrec = mysqli_fetch_array($cartquery))
			{
				$sl++;
				 
			?>
			<tr>
				<td><?php echo $sl; ?></td>
				<td><?php echo $cartrec['inv_date']; ?></td>
				<td><img src="uploads/<?php echo $cartrec['prod_image']; ?>" width="50"></td>
				<td><?php echo $cartrec['prod_name']; ?></td>
				<td>$<?php echo $cartrec['price']; ?></td>
				
			  </tr>
             
			<?php
			}
			 }
			
			?>
			</tbody>
			</table>
 
            
        </div>
    </div>
</section>
 
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
