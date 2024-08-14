<?php
use Cake\ORM\TableRegistry;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Favicon-->
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('School_dashboard.min.css'); ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display','School_dashboard'])?>">

                <div class="sidebar-brand-text mx-3">Organic Print Studio</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display','home'])?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->

            <hr class="sidebar-divider">

            <!-- Heading -->

            <div class="sidebar-heading">
                Shortcuts
            </div>


            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <span>Create Campaign</span>
                </a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/utilities-color.html">Colors</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/utilities-border.html">Borders</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/utilities-other.html">Other</a>
                    </div>
                </div>
            </li>
            -->

            <!-- Divider -->
            <!--
            <hr class="sidebar-divider">
            -->

            <!-- Heading -->
            <!--
            <div class="sidebar-heading">
                Addons
            </div>
            -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/login.html">Login</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/register.html">Register</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/404.html">404 Page</a>
                        <a class="collapse-item" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            -->

            <!-- Nav Item - Charts -->
            <!--
            <li class="nav-item">
                <a class="nav-link" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>
            -->

            <!-- Nav Item - Tables -->
            <!--
            <li class="nav-item">
                <a class="nav-link" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>
            -->

            <!-- Divider -->
            <!--
            <hr class="sidebar-divider d-none d-md-block">
            -->



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if($this->Identity->isLoggedIn()){
                                    $school_table = TableRegistry::getTableLocator()->get('Schools');
                                    $user_id = $this->Identity->get('id');
                                    $school_rep= $school_table->find()->where(['id' => $user_id])->first();
                                    $school_rep_firstname = $school_rep->get('rep_first_name');
                                    $school_rep_lastname = $school_rep->get('rep_last_name');


                                }

                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $school_rep_firstname . ' ' . $school_rep_lastname?></span>
                                <i class="fas fa-user-circle fa-2x text-gray-600"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?= $this->fetch('content') ?>

            <!-- Footer -->
                <!--
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Auth', 'action' => 'logout']) ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('School_dashboard.js'); ?>
    <?= $this->fetch('script'); ?>



    <!-- Page level plugins -->
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
    <script src="../../../../Desktop/school_dashboard/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script>

</body>

</html>
