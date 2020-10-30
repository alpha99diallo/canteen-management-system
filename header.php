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
          <li class="nav-item"><a class="nav-link" href="#section-about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-menu">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-contact">Contact</a></li>
          <?php
              if(!isset($_SESSION['userLoginStatus'])) {
                echo '
                  <li class="nav-item"><a class="nav-link" href="signin.php">Sign Up</a></li>
                ';
              } else {
                echo '
                  <li class="nav-link">
                  <span style="font-family: snellroundhandw01-scrip,cursive;color: #181818;">Hello</span>
                  ,&nbsp;<span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;"> '.$_SESSION['userName']."</span>&nbsp;&nbsp;
                  </li>
                  ";
                echo '
                  <li class="nav-item"><a class="nav-link" href="includes/logout.inc.php?logout">Log out</a></li>
                ';
              }
            ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
