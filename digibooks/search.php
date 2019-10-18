<?php require("header.php");
include("navbar.php");
?>
<title> Search - DigiBooks </title>
    <main class="page catalog-page">
<br/>

        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Search Results</h2>

                </div>
                <div class="container">
                  <form name="search" action="" method="post">
                    <div class="input-group mb-3">
  <input type="text" name="search" action="search" class="form-control" placeholder="Search for books by title, author or ISBN..." aria-label="Search" aria-describedby="basic-addon2">

</div>

                  </form>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="container">
                        <div class="col-sm-12">
                            <div class="products">
                                <div class="row no-gutters">



                                  <?php
                                	include 'database.php';
                                	$pdo = Database::connect();

                                	if (isset($_POST['search'])) {

                                		$search=$_POST['search'];
                                		$query = $pdo->prepare("SELECT * FROM books WHERE book_title LIKE '%$search%' OR book_author LIKE '%$search%' OR book_isbn LIKE '%$search%' LIMIT 10");
                                		$query->bindValue(1, "%$search%", PDO::PARAM_STR);
                                		//binds a value to a named placeholder, in this case
                                		$query->execute();
                                		// Display search result

                                			if ($query->rowCount() > 0){

                                				while ($row = $query->fetch()) {

                                          $books = <<<DELIMITER

                                          <div class="col-12 col-md-6 col-lg-4">
                                              <div class="clean-product-item">
                                                  <div class="image"><a href="book.php?id={$row['book_id']}"><img class="img-fluid d-block mx-auto" src="admin/uploads/{$row['book_image']}"></a></div>
                                                  <div class="product-name"><a href="book.php?id={$row['book_id']}">{$row['book_title']}</a></div>
                                                  <div class="about">
                                                  <p>By {$row['book_author']}<br/>
                                                  ISBN: {$row['book_isbn']}</p>
                                                  <div class="price">
                                                      <h3>&pound{$row['book_price']}</h3>
                                                  </div>
                                                  </div>
                                                  <a href="cart.php?add={$row['book_id']}"><button class="btn btn-primary" type="button"><i class="fa fa-cart-plus"></i> Add to Cart</button></a>

                                              </div>
                                          </div>
                                      DELIMITER;

                                      		echo $books;
                                				}
                                			} else {
                                				echo 'No results found';
                                			}

                                	}
                                	?>

                                </div>

                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include("footer.php");?>
