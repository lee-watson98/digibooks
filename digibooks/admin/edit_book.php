<?php require("header.php");
if(!isset($_SESSION['username'])){
	redirect("login.php");}

if(isset($_GET['id'])){

$query = query("SELECT*FROM books WHERE book_id =".escape_string($_GET['id'])."");
	confirm($query);

while($row = fetch_array($query)){

	$book_title			= escape_string($row['book_title']);
	$book_category_id	= escape_string($row['book_category_id']);
	$book_price			= escape_string($row['book_price']);
	$book_quantity	= escape_string($row['book_quantity']);
	$book_description				= escape_string($row['book_description']);
	$book_author		= escape_string($row['book_author']);
  $book_publisher		= escape_string($row['book_publisher']);
  $year_published		= escape_string($row['year_published']);
  $book_isbn		= escape_string($row['book_isbn']);
	$book_image			= escape_string($row['book_image']);
}
update_book();}


  ?>

<body id="page-top">
    <div id="wrapper">
      <?php include("sidebar.php");
      ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("navbar.php");?>
            <div class="container-fluid">

                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Update Book</p>
                    </div>
                    <div class="card-body">

                      <div class="row">

                        <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">

                        <div class="col-md-6">
                          <div class="form-group has-info">
                          <label for="exampleInputEmail1">Book Title</label>
                          <input type="text" name="book_title" class="form-control" required="required" aria-describedby="emailHelp" value="<?php echo $book_title ?>">
                        </div>

                        <div class="form-group has-info">
                          <label for="exampleInputEmail1">Book Category</label>
                          <select name="book_category_id" id="" required="required" class="form-control">
                              <option value="0">Select Category</option>
                  			<?php show_categories_add_product_page();?>
                          </select>
                        </div>

                        <div class="form-group has-info">
                          <label for="exampleInputEmail1">Author</label>
                          <input type="text" name="book_author" required="required" class="form-control" aria-describedby="surnameHelp" value="<?php echo $book_author ?>">
                        </div>

                        <div class="form-group has-info">
                          <label for="exampleInputEmail1">Publisher</label>
                          <input type="text" name="book_publisher" required="required" class="form-control" aria-describedby="surnameHelp" value="<?php echo $book_publisher ?>">
                        </div>



                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <label for="exampleInputEmail1">Book Image</label>

                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"><img src="uploads/<?php echo $book_image ?>" height="150px" width="100px"/></div>
                            <div>
                                <input class="btn-file" type="file" name="file">

                            </div>
                        </div><br/>

                        </div>


                          <div class="col-md-6">

                              <div class="form-group has-info">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="number" name="book_price" required="required" class="form-control" required="required" aria-describedby="emailHelp" value="<?php echo $book_price ?>">
                            </div>

                            <div class="form-group has-info">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="number" name="book_quantity" required="required" class="form-control" aria-describedby="emailHelp" value="<?php echo $book_quantity ?>">
                          </div>

                          <div class="form-group has-info">
                          <label for="exampleInputEmail1">Year Published</label>
                          <input type="number" name="year_published" required="required" class="form-control" aria-describedby="emailHelp" value="<?php echo $year_published ?>">
                        </div>

                        <div class="form-group has-info">
                        <label for="exampleInputEmail1">ISBN No.</label>
                        <input type="text" name="book_isbn" required="required" class="form-control" aria-describedby="emailHelp" value="<?php echo $book_isbn ?>">
                      </div>

                      <div class="form-group has-info">
                      <label for="exampleInputEmail1">Book Description</label>
                      <textarea name="book_description" rows="10" required="required" class="form-control" aria-describedby="emailHelp" ><?php echo $book_description ?></textarea>
                    </div>



                          </div>
                          <br/>
                          <input type="submit" name="update" class="btn btn-success" value="Update Book">

                        </div></form>

                      <div class="col-sm-12">


                          </div><br/>


                                      <br/>



                      </div>

                      </div>

                    </div>
                </div>
            </div>
        </div>
      <?php
        include("footer.php");
        include("js.php");?>
</body>

</html>
