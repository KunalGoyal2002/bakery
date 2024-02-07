<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
$successMsg = '';
if(isset($_POST['submit']))
{
	$successMsg = "<div class='alert alert-success text-center'>Thanks for contact us</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<!--contact section -->
<section class="bglite">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="title">Contact Us</h2>
<p class="mb-5">We'd love to hear from you. Reach out to us with any questions or feedback.</p>
<?php echo $successMsg; ?>
</div>

				<div class="col-md-6 mb-5">
				<div class="formdiv">
					<form class="contact-form" action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </form>
				</div>
				</div>
				
				<div class="col-md-6">
				<div class="formdiv">
					 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184551.90977167513!2d-79.54286986362449!3d43.71837095838745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sin!4v1700302643257!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				</div>

</div>
</div>
</section>
<!-- end contact section -->
 
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
