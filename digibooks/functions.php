<?php

function redirect($location){
	header("Location: $location");
}

/* to call the connection within a function we need to make it global*/
function query ($sql){
	global $connection;
	return mysqli_query($connection,$sql);
}

function confirm($result) {
	global $connection;
	if(!$result){
		die("QUERY FAILED ".mysqli_error($connection));
	}
}

function escape_string($string){
	global $connection;
	/* use escape_string to help prevent sql injection attacks*/
	return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result) {
	return mysqli_fetch_array($result);
}



function get_books(){
	$query = query("SELECT*FROM books");
	confirm($query);

	while ($row = fetch_array($query)){
		$books = <<<DELIMITER

    <div class="col-12 col-md-6 col-lg-4">
        <div class="clean-product-item">
            <div class="image"><a href="book.php?id={$row['book_id']}"><img class="img-fluid d-block mx-auto" src="admin/uploads/{$row['book_image']}"></a></div>
            <div class="product-name"><a href="book.php?id={$row['book_id']}">{$row['book_title']}</a></div>
            <div class="about">
            By {$row['book_author']}<br/>
            ISBN: {$row['book_isbn']}


            </div>	<div class="price">
									<h3>&pound{$row['book_price']}</h3>
							</div>
            <a href="cart.php?add={$row['book_id']}"><button class="btn btn-primary" type="button"><i class="fa fa-cart-plus"></i> Add to Cart</button></a>

        </div>
    </div>
DELIMITER;

		echo $books;
	}
}

function get_categories() {
	$query= query("SELECT * FROM categories");
	confirm($query);

	while($row = fetch_array($query)){
		$categories_links = <<<DELIMITER
        <br/>
		   <a href="category.php?id={$row['cat_id']}">{$row['cat_title']}</a><hr>

DELIMITER;

		echo $categories_links;
	}
}

function get_category_title() {
	$query= query("SELECT * FROM categories WHERE cat_id=" .escape_string($_GET['id'])."");
	confirm($query);

	while($row = fetch_array($query)){
		$category_title = <<<DELIMITER

		{$row['cat_title']}
DELIMITER;

		echo $category_title;
	}
}


function get_books_in_cat_page(){
	$query = query("SELECT*FROM books WHERE book_category_id =".escape_string($_GET['id'])."");
	confirm("query");
	$query2 = query("SELECT*FROM users");
	confirm("query");
	while ($row = fetch_array($query, $query2)){
		$books = <<<DELIMITER

    <div class="col-12 col-md-6 col-lg-4">
        <div class="clean-product-item">
            <div class="image"><a href="book.php?id={$row['book_id']}"><img class="img-fluid d-block mx-auto" src="admin/uploads/{$row['book_image']}"></a></div>
            <div class="product-name"><a href="book.php?id={$row['book_id']}">{$row['book_title']}</a></div>
            <div class="about">
            By {$row['book_author']}<br/>
            ISBN: {$row['book_isbn']}
            <div class="price">
                <h3>&pound{$row['book_price']}</h3>
            </div>
            </div><br/>
            <a href="cart.php?add={$row['book_id']}"><button class="btn btn-primary" type="button"><i class="fa fa-cart-plus"></i> Add to Cart</button></a>

        </div>
    </div>
DELIMITER;

		echo $books;
	}
}

function get_products_in_shop_page(){
	$query = query("SELECT*FROM products");
	confirm("query");

	while ($row = fetch_array($query)){
		$product = <<<DELIMITER
		<div class="col-sm-4 col-lg-4 col-md-4">
	    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img src="admin/uploads/{$row['product_image']}" class="img-thumbnail" alt=""></a>
        <div class="caption">
		&pound{$row['product_price']}
        <a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
        <p>{$row['short_desc']}</p>
        <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to cart</a>
		</div></div></div>
DELIMITER;

		echo $product;
	}
}



function login_user(){
//check if the submit button has been pressed
	if(isset($_POST['submit'])){
		//create variables and assign values from the username and password fields in the login form
		$username= escape_string($_POST['username']);
		$password= hash('sha256', $_POST['password']);
		//check them against the values held in the database
		$query= query("SELECT*FROM users WHERE username = '{$username}' AND password = '{$password}'");
		confirm($query);
		//use the num_rows function to work out whether there is a match - or not
		if(mysqli_num_rows($query) == 0){
			set_message("Your username or password is incorrect. Please try again.");
			redirect("login.php");
		}else{
		$_SESSION['username'] = $username;
		redirect("index.php");
		}
	}
}

function login(){
//check if the submit button has been pressed
	if(isset($_POST['submit'])){
		//create variables and assign values from the username and password fields in the login form
		$username= escape_string($_POST['username']);
		$password= hash('sha256', $_POST['password']);
		//check them against the values held in the database
		$query= query("SELECT*FROM users WHERE username = '{$username}' AND password = '{$password}'");
		confirm($query);
		//use the num_rows function to work out whether there is a match - or not
		if(mysqli_num_rows($query) == 0){
			set_message("Your username or password is incorrect. Please try again.");
			redirect("login.php");
		}else{
		$_SESSION['username'] = $username;
		redirect("index.php");
		}
	}
}

function set_message($msg) {
	if(!empty($msg)){
		$_SESSION['message'] = $msg;
	} else{
		$msg="";
	}
}

function display_message(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset ($_SESSION['message']);
	}
}

function send_message(){
	if(isset($_POST['submit'])) {
		echo "It works!";
	}
}

function last_id(){
	global $connection;
	return mysqli_insert_id($connection);
}

function display_orders(){
	$query = query("SELECT*FROM orders");
	confirm($query);

	while($row = fetch_array($query)){
		$orders = <<<DELIMITER
		<tr>
			<td>{$row['order_id']}</td>
			<td>{$row['order_amount']}</td>
			<td>{$row['order_transaction']}</td>
			<td>{$row['order_currency']}</td>
			<td>{$row['order_status']}</td>
			<td><a class= "btn btn-danger" href="delete_order.php?id= {$row['order_id']}">
			<span class="fa fa-minus-circle"></span></a></td>
		</tr>
DELIMITER;
echo $orders;
	}
}

function display_books(){
	$query = query("SELECT*FROM books");
	confirm($query);

	while($row = fetch_array($query)){
		$books = <<<DELIMITER
		<tr>
				<td>{$row['book_id']}</td>
				<td>{$row['book_title']}</td>
				<td>{$row['book_price']}</td>
				<td>{$row['book_quantity']}</td>
				<td><img class="rounded-circle mr-2" width="30" height="30" src="uploads/{$row['book_image']}"></img></td>
				<td><a class= "btn btn-warning" href="edit_book.php?id={$row['book_id']}"><span class="fa fa-edit"></span></a>
				 <a class= "btn btn-danger" href="delete_book.php?id={$row['book_id']}"><span class="fa fa-minus-circle"></span></a>
</td>

		</tr>
DELIMITER;
	echo $books;
	}

}

function add_book(){

if(isset($_POST['publish'])){

	$book_title			= escape_string($_POST['book_title']);
	$book_category_id	= escape_string($_POST['book_category_id']);
	$book_price			= escape_string($_POST['book_price']);
	$book_quantity	= escape_string($_POST['book_quantity']);
	$book_description				= escape_string($_POST['$book_description']);
	$book_author		= escape_string($_POST['book_author']);
	$book_publisher		= escape_string($_POST['book_publisher']);
	$year_published		= escape_string($_POST['year_published']);
	$book_isbn		= escape_string($_POST['book_isbn']);
	$book_image			= escape_string($_FILES['file']['name']);
	$image_temp_location	= escape_string($_FILES['file']['tmp_name']);

	move_uploaded_file($image_temp_location, "uploads/".$book_image);

$query = query("INSERT INTO books(book_title, book_category_id, book_genre, book_price, book_quantity, book_description, book_author, book_publisher, year_published, book_isbn, book_image)
								VALUES('{$book_title}', '{$book_category_id}', ' ', '{$book_price}', '{$book_quantity}', '{$book_description}', '{$book_author}', '{$book_publisher}', '{$year_published}', '{$book_isbn}', '{$book_image}')");
	$last_id = last_id();
	confirm($query);
	redirect("books.php");
	}
}

function show_categories_add_product_page() {
	$query= query("SELECT * FROM categories");
	confirm($query);

	while($row = fetch_array($query)){
		$categories_options = <<<DELIMITER

		<option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMITER;

		echo $categories_options;
	}
}

function show_product_category_title($product_category_id){

	$category_query = query("SELECT*FROM categories WHERE cat_id= '{$product_category_id}'");

	confirm($category_query);

	while($category_row = fetch_array($category_query)){
	return $category_row['cat_title'];

	}
}

function update_book(){

	if(isset($_POST['update'])){

		$book_title			= escape_string($_POST['book_title']);
		$book_category_id	= escape_string($_POST['book_category_id']);
		$book_price			= escape_string($_POST['book_price']);
		$book_quantity	= escape_string($_POST['book_quantity']);
		$book_description				= escape_string($_POST['$book_description']);
		$book_author		= escape_string($_POST['book_author']);
		$book_publisher		= escape_string($_POST['book_publisher']);
		$year_published		= escape_string($_POST['year_published']);
		$book_isbn		= escape_string($_POST['book_isbn']);
		$book_image			= escape_string($_FILES['file']['name']);
		$image_temp_location	= escape_string($_FILES['file']['tmp_name']);

if(empty($book_image)){

$get_pic= query ("SELECT book_image FROM books WHERE book_id=" .escape_string($_GET['id']). " ");
		confirm ($get_pic);

		while($pic= fetch_array($get_pic)){

			$book_image = $pic['book_image'];
		}
}

	move_uploaded_file($image_temp_location, "uploads/".$book_image);

	//make sure to put a space after SET
	$query = "UPDATE books SET ";
	$query.= "book_title	  = '{$book_title}' , ";
	$query.= "book_category_id	= '{$book_category_id}' , ";
   	 $query.= "book_price = '{$book_price}' , ";
	$query.= "book_quantity	= '{$book_quantity}' , ";
	$query.= "book_description = '{$book_description}'	, ";
	$query.= "book_author = '{$book_author}' , ";
	$query.= "book_publisher = '{$book_publisher}' , ";
	$query.= "year_published = '{$year_published}' , ";
	$query.= "book_isbn = '{$book_isbn}' , ";
	$query.= "book_image = '{$book_image}'	";
	$query.= "WHERE book_id=" .escape_string($_GET['id']);

	$send_update_query = query($query);
	confirm($send_update_query);
redirect("books.php");}}




function show_categories_in_admin(){

	$category_query = query("SELECT*FROM categories");

	confirm($category_query);
	while($row = fetch_array($category_query)){

		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

		$category = <<<DELIMITER
		<tr>
			<td>{$cat_id}</td>
			<td>{$cat_title}</td>
			<td><a class= "btn btn-danger" href="delete_category.php?id={$row['cat_id']}"> <span class="fa fa-minus-circle"> </span> </a></td>
		</tr>
DELIMITER;
echo $category;
	}
}

function add_category(){
	if(isset($_POST['add_category'])){
		$cat_title = escape_string($_POST['cat_title']);
		$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
		confirm($insert_cat);
		redirect("categories.php");
	}
}

function display_users(){

	$user_query = query("SELECT*FROM users WHERE username != 'admin'");

	confirm($user_query);
	while($row = fetch_array($user_query)){

		$user_id = $row['user_id'];
		$email = $row['email'];
		$username = $row['username'];


		$user = <<<DELIMITER
		<tr>
			<td>{$user_id}</td>
			<td>{$email}</td>
			<td>{$username}</td>

			<td><a class= "btn btn-danger" href="delete_user.php?id={$row['user_id']}"> <span class="fa fa-minus-circle"> </span> </a></td>
		</tr>
DELIMITER;
echo $user;
	}
}

function register(){

	if(isset($_POST['publish'])){
		$username =
		escape_string($_POST['username']);
		$password =
		hash('sha256',$_POST['password']);
		$email =
		escape_string($_POST['email']);

		$query = query("INSERT INTO users(username, password, email)
		VALUES('{$username}', '{$password}', '{$email}')");
			$last_id = last_id();
			confirm($query);

			redirect("index.php");
	}
}



function display_reports(){
	$query = query("SELECT*FROM reports");
	confirm($query);

	while($row = fetch_array($query)){
		$reports = <<<DELIMITER
		<tr>
		<td>{$row['report_id']}</td>
		<td>{$row['book_id']}</td>
		<td>{$row['order_id']}</td>
		<td>{$row['book_price']}</td>
		<td>{$row['book_quantity']}</td>
		<td><a class= "btn btn-danger" href="delete_report.php?id={$row['report_id']}"> <span class="fa fa-minus-circle"> </span> </a></td>
		</tr>
DELIMITER;
	echo $reports;
	}

}

function display_no_of_orders(){
$query = query("SELECT * FROM orders");
$count = mysqli_num_rows($query);
return $count;
}

function display_no_of_reports(){
$query = query("SELECT * FROM reports");
$count = mysqli_num_rows($query);
return $count;
}
function display_no_of_users(){
$query = query("SELECT * FROM users");
$count = mysqli_num_rows($query);
return $count;
}

function display_no_of_books(){
$query = query("SELECT * FROM books");
$count = mysqli_num_rows($query);
return $count;
}

function display_no_of_categories(){
$query = query("SELECT * FROM categories");
$count = mysqli_num_rows($query);
return $count;
}


?>
