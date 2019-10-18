<?php require("header.php");
include("navbar.php");
?>
<title> Home - DigiBooks </title>
    <main class="page catalog-page">

      <?php
      if(!isset($_SESSION['username'])){

        echo "
        <br/><br/>
          <section class='clean-block clean-hero' style='background-image:url(&quot;assets/img/bg.jpg&quot;);color:rgba(9, 162, 255, 0.60);'>
              <div class='text'>
                  <h2>Welcome to DigiBooks!</h2>
                  <p>We stock and ship books to your home address. Sign up for an account and order some books.</p><a href='register.php'><button class='btn btn-outline-light btn-lg' type='button'>Sign Up</button></a></div>
          </section>
        ";

} else{
} ?>




<br/>
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Catalogue</h2>
                    <p>Welcome to the DigiBooks online catalogue! You can refine by category or search by author, title or ISBN number.</p>
                </div>
                <div class="container">
                  <form name="search" action="search.php" method="post">
                    <div class="input-group mb-3">
  <input type="text" name="search" class="form-control" placeholder="Search for books by title, author or ISBN..." aria-label="Search" aria-describedby="basic-addon2">

</div>

                  </form>
                </div>
                <div class="content">
                    <div class="row">
                        <?php include("sidebar.php"); ?>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">

                                    <?php get_books();?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include("footer.php");?>
