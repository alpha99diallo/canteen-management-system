<header id="pb-navbar" class="top-navbar">
  <nav  class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <span class="img-fluid" style="padding-right:20px">
                  <a1><span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;font-size: 30px;">Alpha's</span><span style="font-family: snellroundhandw01-scrip,cursive;font-size: 30px;">CanteenAdmin</span></a>
              </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbars-rs-food">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="admin.php">Curstomers</a></li>
          <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>
          <?php
          echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="dropdown-a" data-toggle="dropdown">
              <span style="font-family: snellroundhandw01-scrip,cursive;color: #181818;">Hello</span>
              ,&nbsp;<span style="font-family: snellroundhandw01-scrip,cursive;color: #900C3F;"> '.$_SESSION['userName']."
              </span>
              </a>
              <div class='dropdown-menu' aria-labelledby='dropdown-a'>
                <a class='dropdown-item' href='orders.php'>Orders</a>
                <a class='dropdown-item' href='includes/logout.inc.php?logout'>Log out</a>
              </div>
            </li>
            ";
           ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
