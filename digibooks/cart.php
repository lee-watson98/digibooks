<?php require_once("config.php");



if(isset($_GET['add'])){
	//$_SESSION['product_'. $_GET['add']] +=1;
	//redirect("index.php");

	$query = query("SELECT*FROM books WHERE book_id=". escape_string($_GET['add'])." ");
	confirm($query);

	while($row = fetch_array($query)){

		if($row['book_quantity'] != $_SESSION['product_' .$_GET['add']]){

			$_SESSION['product_'.$_GET['add']]+=1;
			redirect("checkout.php");
	}
	else {

		set_message("We only have ". $row['book_quantity']. " copies of "."{$row['book_title']}"." available");
		redirect("checkout.php");
	}
}
}

if(isset($_GET['remove'])){
	$_SESSION['product_'.$_GET['remove']]--;
	if($_SESSION['product_'.$_GET['remove']]<1){
		unset($_SESSION['product_'.$_GET['remove']]);
		unset($_SESSION['total_price']);
		unset($_SESSION['total_quantity']);
		redirect("checkout.php");
	} else {
			redirect("checkout.php");
	}
}

if(isset($_GET['delete'])){

	$_SESSION['product_'.$_GET['delete']]='0';
	unset($_SESSION['product_'.$_GET['delete']]);
	redirect("checkout.php");
	unset($_SESSION['total_price']);
	unset($_SESSION['total_quantity']);

}

function cart(){
	$total=0;
	$item_quantity=0;
	$item_name=1;
	$item_number=1;
	$amount=1;
	$quantity=1;

	foreach($_SESSION as $name => $value){
		if(substr($name, 0, 8)== "product_"){
			$length = strlen($name) - 8;
			$id = substr($name, 8, $length);



	$query = query("SELECT * FROM books WHERE book_id=".escape_string($id)."");
	confirm($query);
	while($row = fetch_array($query)){
	$sub = $row['book_price']*$value;
	$item_quantity +=$value;
	$product = <<<DELIMITER
  <div class="product">
      <div class="row justify-content-center align-items-center">
          <div class="col-md-3">
              <div class="product-image"><img class="img-fluid d-block mx-auto image" src="admin/uploads/{$row['book_image']}"></div>
          </div>
          <div class="col-md-5 product-info"><a class="product-name" href="#">{$row['book_title']}</a>
              <div class="product-specs">
                  <div><span>Author:&nbsp;</span><span class="value">{$row['book_author']}</span></div>
                  <div><span>ISBN:&nbsp;</span><span class="value">{$row['book_isbn']}</span></div>

									<div>{$value} in your cart</div><br/>
									<div><a class='btn btn-success' href="cart.php?add={$row['book_id']}">+</a>
									<a class='btn btn-warning' href="cart.php?remove={$row['book_id']}">-</a>
									<a class='btn btn-danger' href="cart.php?delete={$row['book_id']}">x</a></div>

              </div>
          </div>

          <div class="price"><span>&pound{$row['book_price']}</span></div>
      </div>
  </div>
	<input type="hidden" name="item_name_{$item_name}" value="{$row['book_title']}">
	<input type="hidden" name="item_number_{$item_number}" value="{$row['book_id']}">
	<input type="hidden" name="amount_{$amount}" value="{$row['book_price']}">
	<input type="hidden" name="quantity_{$quantity}" value="{$value}">
DELIMITER;
echo $product;
$item_name++;
$item_number++;
$amount++;
$quantity++;

	}
	$_SESSION['total_price']=$total+=$sub;
	$_SESSION['total_quantity']=$item_quantity;
}}}

function show_paypal(){

if(isset($_SESSION['total_quantity']) && $_SESSION['total_quantity'] >=1){

	$paypal_button = <<<DELIMITER

	<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
	<script>paypal.Buttons().render('body');</script>
DELIMITER;

return $paypal_button;
}}

function report(){

	if(isset($_GET['tx'])){

	$amount= $_GET['amt'];
	$currency= $_GET['cc'];
	$transaction= $_GET['tx'];
	$status= $_GET['st'];

	$send_order = query("INSERT INTO orders(order_amount, order_currency, order_transaction,
	order_status)VALUES('{$amount}', '{$currency}', '{$transaction}', '{$status}') ");

	$last_id = last_id();
	confirm($send_order);
	}

	$total = 0;
	$item_quantity = 0;
	foreach($_SESSION as $name => $value){
	if($value > 0){
		if(substr($name, 0, 8) == "product_"){
			$length = strlen($name) - 8;
			$id = substr($name, 8, $length);
			$query = query("SELECT * FROM books WHERE book_id = ".escape_string($id)."");

			confirm($query);

			while($row = fetch_array($query)){
				$product_price = $row['book_price'];
				$sub = $row['book_price']*$value;
				$item_quantity +=$value;
				$insert_report = query("INSERT INTO reports(book_id, order_id, book_price, book_quantity)
				VALUES('{$id}', '{$last_id}', '{$product_price}', '{$value}') ");

				confirm($insert_report);
			}
			$total +=$sub;
			echo $item_quantity;
		}
	}
	 else {
		redirect(index.php);
}}}
?>
