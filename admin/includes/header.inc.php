<header id="pb-navbar" class="top-navbar">
  <nav  class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a class="navbar-brand">
        <span class="img-fluid" style="padding-right:20px">
                  <a1><span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;font-size: 30px;">AdminPanel</span></a>
              </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbars-rs-food">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" style="color:white;" href="admin.php">Curstomers</a></li>
          <li class="nav-item"><a class="nav-link" style="color:white;"  href="menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link" style="color:white;"  href="orders.php">Orders</a></li>
          <?php
            echo '
            <li class="nav-link">
              <span style="font-family: snellroundhandw01-scrip,cursive;color: white;">Hello,</span>
              &nbsp;<span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;"> '.$_SESSION['adminName'].'
              </span>
            </li>
            ';
           ?>
          <li class="nav-item"><a class="nav-link" style="color:white;"   href='includes/logout.inc.php?logout'>Log out</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
