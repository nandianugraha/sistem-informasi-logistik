<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<!-- Page Wrapper -->
<div id="wrapper">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #8B0000;">

        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="localhost:8080">
            <img src="/assets/logo pmi.png" alt="" width="50" height="50" class="d-inline-block align-text-center">
            Sistem Logistik
        </a>
        <!-- Sidebar Toggle-->
        <!--<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>-->       
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                    <li><a class="dropdown-item" href="/">Logout</a></li>
                </ul>
            </li>
        </ul>
    
    </nav>
</div>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link active" href="/index">
                            <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="/barangmasuk">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="/stokbarang">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes-stacked"></i></i></div>
                            Stok Barang
                        </a>
                        <a class="nav-link" href="/barangkeluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></i></div>
                            Barang Keluar
                        </a>
                        <a class="nav-link" href="/barangkeluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></i></div>
                            Barang Rusak
                        </a>

                        <a class="nav-link" href="/laporan">
                            <div class="sb-nav-link-icon"><i class="far fa-folder-open"></i></div>
                            Laporan
                        </a>



                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">LOGISTIK</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <section>
                        <div class="row">
                            <div class="col-xl-3 col-sm-3 col-6 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-box-archive text-info fa-2x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3><?php echo $count_masuk ?></h3>

                                                <p class="mb-0">Barang Masuk</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-3 col-6 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-boxes-stacked text-info fa-2x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3><?php echo $count_stok ?></h3>
                                                <p class="mb-0">Stok Barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-3 col-6 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-box-open text-info fa-2x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3><?php echo $count_keluar ?></h3>
                                                <p class="mb-0">Barang Keluar</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-3 col-6 mb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-box-open text-info fa-2x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3><?php echo $count_rusak ?></h3>
                                                <p class="mb-0">Barang Rusak</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>


                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>

                        <!-- <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div> -->

                    </div>
                </div>
        </div>
        </main>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>