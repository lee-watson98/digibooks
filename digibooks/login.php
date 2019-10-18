<?php require("header.php");
require("navbar.php");
login();
if(isset($_SESSION['username'])){
  redirect("index.php");
}
?>
<br/>
<title> Login - DigiBooks</title>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log in</h2>
                    <p>Log in to access your virtual shopping cart and checkout. Don't have an account? <a href="register.php">Create one</a>.</p>
                </div>
                <form class="form" method="post">
                    <div class="form-group"><label for="username">Username</label><input class="form-control item" name="username" type="username" id="username"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control" name="password" type="password" id="password"></div>
                    <input class="btn btn-primary btn-block" name="submit" type="submit" value="Login"></form>
            </div>
        </section>
    </main>
  <?php require("footer.php"); ?>
