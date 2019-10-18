<?php require("header.php");
include("navbar.php");
?>
<title> <?php get_category_title();?> - DigiBooks </title>
    <main class="page catalog-page">


      <section class="clean-block clean-catalog dark">
          <div class="container"><br/>
              <div class="block-heading">
                  <h2 class="text-info"><?php get_category_title();?> Books</h2>
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

                                  <?php get_books_in_cat_page();?>

                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </main>
    <?php include("footer.php");?>
