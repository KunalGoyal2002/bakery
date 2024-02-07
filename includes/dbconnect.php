<?php
session_start();
if(isset($_SESSION['username']))
{
$_SESSION['loginstatus'] = 'Y';
$customer = $_SESSION['id'];
}
else
{
$_SESSION['loginstatus'] = 'N';	
$customer = '';
}
$con = mysqli_connect("localhost","root","letmein","cosc213");
?>