<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
$errormsg = '';
if(isset($_POST['submit']))
{
$name = $_POST['name'];	
$pwd = $_POST['pwd'];	
$role = $_POST['role'];
$sql = "select * from logins where username='$name' and password='$pwd' and user_type='$role'";
$rows = mysqli_query($con,$sql);
if(mysqli_num_rows($rows)>0)
{
	$rec = mysqli_fetch_array($rows);
	$_SESSION['id'] = $rec['id'];
	$_SESSION['username'] = $rec['fullname'];
	$_SESSION['usertype'] = $rec['user_type'];
	$_SESSION['useraddress'] = $rec['useraddress'];
	if($role == "admin")
	{
		echo "<script>window.location='admin/index.php';</script>";
	}
	else
	{
	echo "<script>window.location='index.php';</script>";
	}
}	
else
{
	unset($_SESSION['username']);
	$errormsg = '<div class="alert alert-danger text-center">Invalid User</div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<!--login section -->
<section class="bglite">
<div class="container">
<div class="row">


				<div class="col-md-6 mb-5 m-auto">
				
				<div class="formdiv">
				<h2 class="title">Login</h2>
				<?php echo $errormsg; ?>
					<form class="contact-form" action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" required>
                        </div>

                        <div class="mb-3">
                           <label><input type="radio" name="role" value="user" checked> Customer </label> &nbsp;
                           <label><input type="radio" name="role" value="admin"> Admin </label>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>
				</div>
				</div>
				
				 

</div>
</div>
</section>
<!-- end login section -->
 
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
