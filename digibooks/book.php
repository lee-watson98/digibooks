<?php require("header.php");
include("navbar.php");
?>

<?php
$query = query("SELECT*FROM books WHERE book_id=" .escape_string($_GET['id'])."");
confirm($query);
while($row = fetch_array($query)): ?>
    <title> <?php echo $row['book_title']; ?> - DigiBooks</title>
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <br/>
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $row['book_title']; ?></h2>
                    <p><i>By <?php echo $row['book_author']; ?></i></p>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">
                                    <div class="sp-wrap"><img class="img-fluid d-block mx-auto" src="admin/uploads/<?php echo $row['book_image']?>"></div>
                                </div><br/>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3><?php echo $row['book_title']; ?></h3>
                                    <div><span><b>Author:</b>&nbsp;</span><span class="value"><?php echo $row['book_author']?></span></div>
                                    <div><span><b>Genre:</b>&nbsp;</span><span class="value"><?php echo $row['book_genre']?></span></div>
                                    <div><span><b>Publisher:</b>&nbsp;</span><span class="value"><?php echo $row['book_publisher']?></span></div>
                                    <div><span><b>Year of Release:</b>&nbsp;</span><span class="value"><?php echo $row['year_published']?></span></div>
                                    <div><span><b>ISBN:</b>&nbsp;</span><span class="value"><?php echo $row['book_isbn']?></span></div>
                                    <div class="price">
                                        <h3>&pound<?php echo $row['book_price']; ?></h3>
                                    </div><a href="cart.php?add=<?php echo $row['book_id']?>"><button class="btn btn-primary" type="button"><i class="icon-basket"></i>Add to Cart</button></a>
                                    <div class="summary">
                                      <h4> Book Description </h4>
                                        <p><?php echo $row['book_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php
    endwhile;

    require("footer.php");
    ?>
