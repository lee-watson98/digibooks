<?php require_once("config.php");
login();?>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">DigiBooks</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <?php
                if(!isset($_SESSION['username'])){
                  echo "<ul class='nav navbar-nav ml-auto'>
                      <li class='nav-item' role='presentation'><a class='nav-link' href='login.php'>Login</a></li>
                  </ul>
              </div>
          </div>
      </nav>
"; } else{ echo "

      <ul class='nav navbar-nav ml-auto'>
      <li class='nav-item' role='presentation'><a class='nav-link' href='checkout.php'><i class='fa fa-shopping-cart'></i> Cart</a></li>
      </ul>

      <ul class='nav navbar-nav'>
      <li class='nav-item' role='presentation'><a class='nav-link' href='logout.php'><i class='fa fa-sign-out'></i>  Log Out</a></li>
      </ul>
</div>
</div>
</nav>
";
}
