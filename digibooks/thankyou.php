

<?php require("header.php");?>
<?php require("cart.php");?>
<?php include("navbar.php");?>
<?php
if(isset($_GET['tx'])){

	$amount= $_GET['amt'];
	$currency= $_GET['cc'];
	$transaction= $_GET['tx'];
	$status= $_GET['st'];

	$query = query("INSERT INTO orders(order_amount, order_currency, order_transaction,
	order_status)VALUES('{$amount}', '{$currency}', '{$transaction}', '{$status}') ");

	confirm($query);
	report();
}else{
/*redirect("index.php");

https://itweb2018/ac/lee/WEEK9/thank_you.php?tx=4ER479150A602812L&amt=597&cc=GBP&st=completed
*/
}?><br/><br/>
<title> Thank You! </title>


<h1 class="text-center">THANK YOU!</h1>

        <!-- Footer -->
        	<?php require("footer.php");?>


    </div>
    <!-- /.container -->


</body>

</html>
