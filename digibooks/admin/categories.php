<?php require("header.php");
add_category();
if(!isset($_SESSION['username'])){
	redirect("login.php");
}?>

<body id="page-top">
    <div id="wrapper">
      <?php include("sidebar.php");
      ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("navbar.php");?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">DigiBooks Genres</h3>

                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Categories:</p>
                    </div>
                    <div class="card-body">
                      <form action="" method="post">

                          <div class="form-group">
                              <label for="category-title">Title</label>
                              <input name="cat_title" type="text" class="form-control">
                          </div>

                          <div class="form-group">

                              <input name="add_category" required="required" type="submit" class="btn btn-primary" value="Add Category">
                          </div>


                      </form>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php show_categories_in_admin();?>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php");
        include("js.php");?>
</body>

</html>
