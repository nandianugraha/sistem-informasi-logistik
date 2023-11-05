<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Charts</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
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
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link" href="/index">
                            <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="/barangmasuk">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="/stokbarang">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes-stacked"></i></div>
                            Stok Barang
                        </a>
                        <a class="nav-link active" href="/barangkeluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Barang Keluar
                        </a>

                        <a class="nav-link" href="/barangrusak">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
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
                    <h1 class="mt-4">Barang Keluar</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/index">Dashboard</a></li>
                        <li class="breadcrumb-item active">Barang Keluar</li>
                    </ol>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Barang
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                    <button type="button" href="<?php echo site_url('barangmasuk/addmasuk'); ?> class=" btn-close data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('barangkeluar/addkeluar'); ?>" method="post">
                                        <label>ID Barang</label>
                                        <br></br>
                                        <select class="form-control" name="id_barang">
                                            <?php foreach ($stok as $l) { ?>
                                                <option value="<?php echo $l['id_stok_barang']; ?>"><?php echo $l['id_stok_barang']; ?> <?php echo $l['nama_barang']; ?> </option>
                                            <?php } ?>

                                        </select>
                                        <br>
                                        <p>Tanggal Keluar
                                            <input type="text" name="tanggal_out" placeholder="Tanggal Keluar" required>
                                        </p>
                                        <p>Jumlah
                                            <input type="text" name="jumlah" placeholder="Jumlah" required>
                                        </p>

                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <br><br>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Barang Keluar
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if (count($keluar_barang) > 0) : ?>
                                    <?php foreach ($keluar_barang as $keluarbarang) : ?>
                                        <tbody>
                                            <tr>

                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $keluarbarang['id_barang']; ?></td>
                                                <td><?php echo $keluarbarang['nama_barang']; ?></td>
                                                <td><?php echo $keluarbarang['tanggal_out']; ?></td>
                                                <td><?php echo $keluarbarang['jumlah']; ?></td>
                                                <td><?php echo $keluarbarang['satuan']; ?></td>

                                            </tr>
                                        </tbody>
                                    <?php
                                        $i++;
                                    endforeach; ?>
                                <?php endif; ?>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
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
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>