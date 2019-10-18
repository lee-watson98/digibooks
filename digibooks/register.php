<?php require("header.php");
include("navbar.php");
register();
if(isset($_SESSION['username'])){
  redirect("index.php");
}
?>
<br/>
  <title> Register - DigiBooks</title>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Register</h2>
                    <p>Register to access your virtual shopping cart and checkout securely.</p>
                </div>
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label for="email">Email</label><input class="form-control item" required="required" name="email" type="email" id="email"></div>
                    <div class="form-group"><label for="username">Name</label><input class="form-control item" required="required" name="username" type="text" id="username"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" required="required" name="password" type="password" id="password"></div>
                    <input class="btn btn-primary btn-block" type="submit" name="publish" value="Register"></form>
            </div>
        </section>
    </main>
    <?php require("footer.php")?>
