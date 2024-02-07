<?php
if(!isset($_SESSION['username']))
{
	echo "<script>window.location='../login.php';</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>