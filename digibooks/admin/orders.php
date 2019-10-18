<?php require("header.php");
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
                <h3 class="text-dark mb-4">DigiBooks Orders</h3>

                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Orders:</p>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Transaction</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php display_orders();?>

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
