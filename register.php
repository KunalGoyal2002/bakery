<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
$errormsg = '';
if(isset($_POST['submit']))
{
$name = $_POST['name'];	
$email = $_POST['email'];	
$pwd = $_POST['pwd'];	
$mobileno = $_POST['mobileno'];
$address = $_POST['address'];
$sql = "select * from logins where username='$email' and user_type='user'";
$rows = mysqli_query($con,$sql);
if(mysqli_num_rows($rows)>0)
{
$errormsg = '<div class="alert alert-danger text-center">Email Already Exist</div>';
}	
else
{
	mysqli_query($con,"insert into logins(fullname,username,password,contactno,email,user_type,useraddress) values('$name','$email','$pwd','$mobileno','$email','user','$address')");
echo "<script>alert('Registration Successfull, Please Login to Continue Shopping!');window.location='login.php';</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<!--register section -->
<section class="bglite">
<div class="container">
<div class="row">


				<div class="col-md-6 mb-5 m-auto">
				
				<div class="formdiv">
				<h2 class="title">Register Your Account</h2>
				<?php echo $errormsg; ?>
					<form class="contact-form" action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
						<div class="mb-3">
                            <label for="mobileno" class="form-label">Mobile No</label>
                            <input type="text" class="form-control" id="mobileno" name="mobileno" required>
                        </div>
						
						 <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" required>
                        </div>
						<div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>

                       

                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </form>
				</div>
				</div>
				
				 

</div>
</div>
</section>
<!-- end register section -->
 
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
