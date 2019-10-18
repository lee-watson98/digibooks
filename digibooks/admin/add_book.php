<?php require("header.php");
add_book();


if(!isset($_SESSION['username'])){
	redirect("login.php");
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
                        <p class="text-primary m-0 font-weight-bold">Add Book</p>
                    </div>
                    <div class="card-body">

                      <div class="row">

                        <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">

                        <div class="col-md-6">
                          <div class="form-group has-info">
                          <label for="exampleInputEmail1">Book Title</label>
                          <input type="text" name="book_title" class="form-control" required="required" aria-describedby="emailHelp" placeholder="Enter book title...">
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
                          <input type="text" name="book_author" required="required" class="form-control" aria-describedby="surnameHelp" placeholder="Enter author name...">
                        </div>

                        <div class="form-group has-info">
                          <label for="exampleInputEmail1">Publisher</label>
                          <input type="text" name="book_publisher" required="required" class="form-control" aria-describedby="surnameHelp" placeholder="Enter publisher...">
                        </div>



                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <label for="exampleInputEmail1">Book Image</label>

                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                            <div>
                                <input class="btn-file" type="file" name="file">

                            </div>
                        </div><br/>

                        </div>


                          <div class="col-md-6">

                              <div class="form-group has-info">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="number" name="book_price" required="required" class="form-control" required="required" aria-describedby="emailHelp" placeholder="Enter price...">
                            </div>

                            <div class="form-group has-info">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="number" name="book_quantity" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter quantity in stock...">
                          </div>

                          <div class="form-group has-info">
                          <label for="exampleInputEmail1">Year Published</label>
                          <input type="number" name="year_published" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter year book was first published...">
                        </div>

                        <div class="form-group has-info">
                        <label for="exampleInputEmail1">ISBN No.</label>
                        <input type="text" name="book_isbn" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter book ISBN number...">
                      </div>

                      <div class="form-group has-info">
                      <label for="exampleInputEmail1">Book Description</label>
                      <textarea name="book_description" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter book description..."></textarea>
                    </div>



                          </div>
                          <br/>
                          <input type="submit" name="publish" class="btn btn-success" value="Add Book">

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
        <?php include("footer.php");
        include("js.php");?>
</body>

</html>
