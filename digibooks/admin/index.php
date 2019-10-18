<?php
require("header.php");


if(!isset($_SESSION['username'])){
  redirect("login.php");
}
  ?>
<body id="page-top">
    <div id="wrapper">
        <?php include("sidebar.php");?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include("navbar.php");?>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3></div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>Books</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo display_no_of_books(); ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Categories</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo display_no_of_categories(); ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-bars fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Users</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span><?php echo display_no_of_users(); ?></span></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-user fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Orders</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo display_no_of_orders(); ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-balance-scale fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Reports</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo display_no_of_reports(); ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



        </div>
    </div>
  <?php include("footer.php");?>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <?php include("js.php");?>
</body>

</html>
