<?php
include 'includes/dbconnect.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
<main>
<?php include 'includes/navbar.php'; ?>
 
<!--about section -->
<section class="bglite">
<div class="container">
<div class="row">
<div class="col-md-6">
<h1 class="title">Welcome to our Bakery</h1>
<p>
Welcome to our bakery, where the aroma of freshly baked delights beckons you to indulge in a world of sweet and savory pleasures. At Blissful Bites Bakery, we take pride in crafting delectable treats that not only satisfy your cravings but also elevate your culinary experience. Our skilled bakers use only the finest ingredients, ensuring that each bite is a symphony of flavors and textures. </p><p>From mouthwatering pastries to artisanal bread, every creation is a testament to our commitment to quality and passion for baking. Step into our warm and inviting space, where the delightful ambiance mirrors the scrumptious offerings that await you.</p>
</div>
<div class="col-md-6">
<img src="assets/images/about.webp" class="img-fluid" alt="about.webp">
</div>
</div>
</div>
</section>
<!-- end about section -->
 
<!--team member start -->
<section>
<div class="container">
        <h2 class="text-center mb-4">Our Amazing Team</h2>

        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-md-4 text-center">
                <div class="team-member">
                    <img src="assets/images/team-2.png" alt="team-2.png" class="img-fluid">
                    <h4>Julia Margareta</h4>
                    <p>Head Baker</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-md-4 text-center">
                <div class="team-member">
                    <img src="assets/images/team-3.png" alt="team-2.png" class="img-fluid">
                    <h4>Jane Smith</h4>
                    <p>Cake Artist</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-md-4 text-center">
                <div class="team-member">
                    <img src="assets/images/team-1.png" alt="team-2.png" class="img-fluid">
                    <h4>Mike Johnson</h4>
                    <p>Pastry Chef</p>
                </div>
            </div>
        </div>
    </div>
</section>
 
<!-- end team member -->

</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
