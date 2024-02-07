<div class="bakeryNav border-bottom py-2 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bakeryMobile">
            <select  class="me-3 border-0 bg-light">
              <option value="en-us">EN-US</option>
            </select>
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>info@blissfulbitesbakery.com</strong></span>
            <span class="me-3"><i class="fa-solid fa-phone me-1 text-warning"></i> <strong>(236)338-1650</strong></span>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
		  <?php
		  if(isset($_SESSION['username']))
		  {
		  ?>
            <span class="me-3"><i class="fa-solid fa-user text-muted me-1"></i><a class="text-muted" href="#">Welcome, <?php echo $_SESSION['username']; ?></a></span>
			<?php
			}
			?>
			<?php
			  if(isset($_SESSION['username']))
			  {
			  ?>
            <span class="me-3"><i class="fa-solid fa-user  text-muted me-2"></i><a class="text-muted" href="logout.php">Logout</a></span>
			<?php
			  }
			  else
			  {
			  ?>
			  <span class="me-3"><i class="fa-solid fa-user  text-muted me-2"></i><a class="text-muted" href="register.php">Register</a></span>
			  
			  <span class="me-3"><i class="fa-solid fa-user  text-muted me-2"></i><a class="text-muted" href="login.php">Login</a></span>
			  <?php
			  }
			  ?>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-cake me-2"></i> <strong>Blissful Bites Bakery</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <form class="m-0" method="POST" action="shop.php">
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
          <div class="input-group">
            <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control border-warning" name="searchbox1" style="color:#7a7a7a">
            <button type="submit" name="searchbtn1" class="btn btn-warning text-white">Search</button>
          </div>
        </div>
		</form>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
		<form class="m-0" method="POST" action="shop.php">
          <div class="ms-auto d-none d-lg-block">
            <div class="input-group">
              <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
              <input type="text" class="form-control border-warning" name="searchbox2"  style="color:#7a7a7a">
              <button type="submit" name="searchbtn2"  class="btn btn-warning text-white">Search</button>
            </div>
          </div>
		  </form>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="about.php">About </a>
            </li>
            
			<li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="contact.php">Contact </a>
            </li>
            
          </ul>
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="cart.php"><i class="fa-solid fa-cart-shopping me-1"></i> Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="order-history.php"><i class="fa-solid fa-cart-shopping me-1"></i> History</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>