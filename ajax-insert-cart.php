<?php
include 'includes/dbconnect.php';
$customerid = $_REQUEST['custid'];
$productid = $_REQUEST['prodid'];
$amount = $_REQUEST['amt'];
$date = date('Y-m-d');
$invoice_query = mysqli_query($con,"select * from invoices where customer_id='$customerid' and status='0'");
//status=0 means checkout not done
//status =1 means checkout done create new invoice id
if(mysqli_num_rows($invoice_query) == 0)
{
	//if no row found then create new inv id
	$inv_id_query = mysqli_query($con,"select ifnull(max(inv_id),0)+1 from invoices");
	$invid = mysqli_fetch_array($inv_id_query);
	mysqli_query($con,"insert into invoices(inv_id,inv_date,customer_id,prod_id,amount) values('$invid[0]','$date','$customerid','$productid','$amount')");
	//$inv_rec = mysqli_fetch_array($invoice_query);	
}
else
{
	$inv_id_query = mysqli_query($con,"select inv_id from invoices where customer_id='$customerid' order by inv_date desc limit 1");
	$invid = mysqli_fetch_array($inv_id_query);
	mysqli_query($con,"insert into invoices(inv_id,inv_date,customer_id,prod_id,amount) values('$invid[0]','$date','$customerid','$productid','$amount')");
	
}
?>