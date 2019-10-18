<?php require("header.php");
require_once("cart.php");
require("navbar.php");

if(isset($_SESSION['product_1'])){

	echo $_SESSION['product_1'];

}
?>
<title> Cart - DigiBooks</title>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
              <br/>
                <div class="block-heading">
                    <h2 class="text-info">Shopping Cart</h2>
                    <h4 class= "text-center bg-danger"> <?php display_message();?> </h4>
                </div>
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">

                              <?php cart();?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Order Summary</h3>

                                <tr class="cart-subtotal"><h4><span class="text">Items: </span><span class="price"><?php
                                echo isset($_SESSION['total_quantity']) ?
                                $_SESSION['total_quantity']: $_SESSION['total_quantity']="";
                                ?></span></h4></tr>

                                <tr class="shipping"><h4><span class="text">Shipping:</span><span class="price">FREE</span></h4></tr>
                                <tr class="order-total"><h4><span class="text">Total: </span> <span class="price">&pound<?php
                                echo isset($_SESSION['total_price']) ?
                                $_SESSION['total_price']: $_SESSION['total_price']="";
                                ?> </span></h4></tr><br/>

                                    <div id="paypal-button-container"></div>
																		
                                  </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php require("footer.php"); ?>
    </main>
