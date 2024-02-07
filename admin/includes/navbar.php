<div class="bakeryNav border-bottom py-2 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bakeryMobile text-center">
            
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>Admin Area</strong></span>
            
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
    
        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
          <div class="input-group">
            <span class="border-warning input-group-text bg-warning text-white"><i class="fa-solid fa-magnifying-glass"></i></span>
             
          </div>
        </div>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <div class="ms-auto d-none d-lg-block">
            <div class="input-group">
               
            </div>
          </div>
          
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="javascript:void()"><i class="fa-solid fa-circle-user me-1"></i> Welcome, <?php echo $_SESSION['username']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2 text-uppercase" href="../logout.php"><i class="fa-solid fa-circle-user me-1"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
