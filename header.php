<?php
  session_start();
 ?>

<header id="pb-navbar" class="top-navbar">
  <nav  class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="img-fluid" style="padding-right:20px">
                  <a href="index.php">
                    <span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;font-size: 30px;">Alpha's</span><span style="font-family: snellroundhandw01-scrip,cursive;font-size: 30px;">Canteen</span>
                  </a>
              </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbars-rs-food">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown"href="#">Menu</a>
            <div class='dropdown-menu' aria-labelledby='dropdown-a'>
              <a class='dropdown-item' href='menu.php?day=Mon'>Monday</a>
              <a class='dropdown-item' href='menu.php?day=Tues'>Tuesday</a>
              <a class='dropdown-item' href='menu.php?day=Wed'>Wednesday</a>
              <a class='dropdown-item' href='menu.php?day=Thu'>Thursday</a>
              <a class='dropdown-item' href='menu.php?day=Fri'>Friday</a>
              <a class='dropdown-item' href='menu.php?day=Sat'>Saturday</a>
              <a class='dropdown-item' href='menu.php?day=Sun'>Sunday</a>
            </div>
          </li>
          <?php
            if ($_SERVER["REQUEST_URI"] != '/canteen-management-system/index.php') {
              echo '
                <li class="nav-item">
                  <a class="nav-link" href="#section-cart">Cart</a>
                </li>
              ';
            }
           ?>
          <?php
              if(!isset($_SESSION['userLoginStatus'])) {
                echo '
                  <li class="nav-item"><a class="nav-link" href="signin.php">Sign Up</a></li>
                ';
              } else {
                echo '
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">
                    <span style="font-family: snellroundhandw01-scrip,cursive;color: #181818;">Hello</span>
                    ,&nbsp;<span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;"> '.$_SESSION['userName']."
                    </span>
                    </a>
                    <div class='dropdown-menu' aria-labelledby='dropdown-a'>
      								<a class='dropdown-item' href='myOrders.php'>Orders</a>
      								<a class='dropdown-item' href='includes/logout.inc.php?logout'>Log out</a>
      							</div>
                  </li>
                  ";
              }
            ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
