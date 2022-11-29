<?php
ob_start();
include "koneksi.php";
include "Controller/library.php";
// include "Controller/Peminjaman.php";
include "Controller/Flashdata.php";
session_start();
$lib = new Library();
$fungsi = new Fungsi();
if (!isset($_SESSION['nama'])) {
    header("Location: auth/login.php");
}

$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTable -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            //change selectboxes to selectize mode to be searchable
            $("#selectBuku").select2({
                theme: "bootstrap-5"
            });
            $("#selectMember").select2({
                theme: "bootstrap-5"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:purple;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-accusoft"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Perpustakaan Sekolah</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= (!$page) ? 'active' : '' ?>
            ">
                <a class="nav-link" href="index2.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= ($page == 'Member') ? 'active' : '' ?>">
                <a class="nav-link" href="?page=Member">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Member</span></a>
            </li>
            <li class="nav-item <?= ($page == 'Kategori') ? 'active' : '' ?>">
                <a class="nav-link" href="?page=Kategori">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kategori Buku</span></a>
            </li>
            <li class="nav-item <?= ($page == 'Buku') ? 'active' : '' ?>">
                <a class="nav-link" href="?page=Buku">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span></a>
            </li>
            <li class="nav-item <?= ($page == 'Peminjaman') ? 'active' : '' ?>">
                <a class="nav-link" href="?page=Peminjaman">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Peminjaman</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
                                <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="auth/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];

                        switch ($page) {
                            case 'Kategori':
                                include "Kategori/index.php";
                                break;
                                case 'Kategori-detail':
                                    include "Kategori/detail.php";
                                    break;
                                case 'Kategori-edit':
                                    include "Kategori/edit.php";
                                    break;
                                case 'Kategori-delete':
                                    $id = $_GET['id'];
                                    $hapus = $lib->hapus('kategori',$id);
                                    if ($hapus == true) {
                                        header('location: ?page=Kategori');
                                    }else{
                                        header('location: ?page=Kategori');
                                    }
                                    break;
                                
                            
                            case 'Member':
                                include "Member/index.php";
                                break;
                            case 'Member-detail':
                                include "Member/detail.php";
                                break;
                            case 'Member-edit':
                                include "Member/edit.php";
                                break;
                            case 'Member-delete':
                                $id = $_GET['id'];
                                $row = mysqli_fetch_assoc($lib->getDataId('buku', $id));
                                unlink('assets/img/Member/' . $row['foto']);
                                $hapus = $lib->hapus('member', $id);
                                if ($hapus == true) {
                                    header('location: ?page=Member');
                                } else {
                                    header('location: ?page=Member');
                                }
                                break;

                            case 'Buku':
                                include "Buku/index.php";
                                break;

                            case 'Buku-detail':
                                include "Buku/detail.php";
                                break;

                            case 'Buku-edit':
                                include "Buku/edit.php";
                                break;

                            case 'Buku-delete':
                                $id = $_GET['id'];
                                $row = mysqli_fetch_assoc($lib->getDataId('buku', $id));
                                unlink('assets/img/Buku/' . $row['sampul']);
                                $hapus = $lib->hapus('buku', $id);
                                if ($hapus == true) {
                                    header('location: ?page=Buku');
                                } else {
                                    header('location: ?page=Buku');
                                }
                                break;

                            case 'Peminjaman':
                                include "Peminjaman/index.php";
                                break;

                            case 'Peminjaman-detail':
                                include "Peminjaman/detail.php";
                                break;

                            case 'Peminjaman-edit':
                                include "Peminjaman/edit.php";
                                break;

                            case 'Peminjaman-delete':
                                $id = $_GET['id'];
                                $hapus = $lib->hapus('peminjaman', $id);
                                if ($hapus == true) {
                                    header('location: ?page=Peminjaman');
                                } else {
                                    header('location: ?page=Peminjaman');
                                }
                                break;
                            default:
                                # code...
                                break;
                        }
                    } else {
                        include "home.php";
                    }
                    ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <!--  <script src="assets/vendor/jquery/jquery.min.js"></script>  -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>