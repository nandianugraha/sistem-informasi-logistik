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
    <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
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
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                        <a class="nav-link" href="/barangkeluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></i></div>
                            Barang Keluar
                        </a>

                        <a class="nav-link" href="/barangrusak">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></i></div>
                            Barang Rusak
                        </a>

                        <a class="nav-link active" href="/laporan">
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
                    <h1 class="mt-4">Report</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>

                    <div class="row">
                        <p id="date_filter">
                            <span id="date-label-from" class="date-label">From: </span><input
                                class="date_range_filter date" type="text" id="datepicker_from" />
                            <span id="date-label-to" class="date-label">To:<input class="date_range_filter date"
                                    type="text" id="datepicker_to" />
                        </p>

                        <div class="col-md-4">
                            <span> Pilih tipe transaksi</span>
                            <div class="input-group">

                                <select class="form-control form-control-sm" name="type" id="type"
                                    oninput="filterTable()">
                                    <option>--select none--</option>
                                    <option>TRANSAKSI MASUK</option>
                                    <option>TRANSAKSI KELUAR</option>
                                    <option>TRANSAKSI RUSAK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div id="printableArea" class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Report
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="tableLaporan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Tanggal Rusak</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>




                                <?php
                                $i = 1;
                                if (count($report_barang) > 0) : ?>
                                <?php foreach ($report_barang as $row) : ?>
                                <tbody>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['id_barang']; ?></td>
                                        <td><?php echo $row['nama_barang']; ?></td>
                                        <td><?php echo $row['tanggal_in']; ?></td>
                                        <td><?php echo $row['tanggal_out']; ?></td>
                                        <td><?php echo $row['tanggal_rusak']; ?></td>
                                        <td><?php echo $row['jumlah']; ?></td>
                                        <td><?php echo $row['satuan']; ?></td>

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
                    <input type="button" onclick="printDiv('printableArea')" value="CETAK" />

                    <!-- <button><a target="_blank" href="cetak.php">CETAK</a></button> -->
                    <br><br><br>


                </div>
            </main>

        </div>
    </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css"></script>
    <script src="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script data-require="jqueryui@*" data-semver="1.10.0"
        src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4"
        data-require="datatables@*"></script>
    <script>
        $(function () {
            var oTable = $('#tableLaporan').DataTable({
                "oLanguage": {
                    "sSearch": "Filter Data"
                },
                "iDisplayLength": -1,
                "sPaginationType": "full_numbers",

            });

            $("#datepicker_from").datepicker({
                format: 'yyyy-mm-dd',
                showOn: "button",
                "onSelect": function (date) {
                    minDateFilter = new Date(date).getTime();
                    oTable.fnDraw();
                }
            }).keyup(function () {
                minDateFilter = new Date(this.value).getTime();
                oTable.fnDraw();
            });

            $("#datepicker_to").datepicker({
                format: 'yyyy-mm-dd',
                showOn: "button",
                "onSelect": function (date) {
                    maxDateFilter = new Date(date).getTime();
                    oTable.fnDraw();
                }
            }).keyup(function () {
                maxDateFilter = new Date(this.value).getTime();
                oTable.fnDraw();
            });

        });

        // Date range filter
        minDateFilter = "";
        maxDateFilter = "";

        $.fn.dataTableExt.afnFiltering.push(
            function (oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                    aData._date = new Date(aData[6]).getTime();
                }

                if (minDateFilter && !isNaN(minDateFilter)) {
                    if (aData._date < minDateFilter) {
                        return false;
                    }
                }

                if (maxDateFilter && !isNaN(maxDateFilter)) {
                    if (aData._date > maxDateFilter) {
                        return false;
                    }
                }

                return true;
            }
        );
    </script>

</body>

<script>
    function filterTable() {
        let dropdown, table, rows, cells, type, filter;
        dropdown = document.getElementById("type");
        table = document.getElementById("tableLaporan");
        rows = table.getElementsByTagName("tr");
        filter = dropdown.value;

        for (let row of rows) {
            cells = row.getElementsByTagName("td");
            type = cells[1] || null;
            if (filter === "--select none--" || !type || (filter === type.textContent)) {
                row.style.display = ""; // shows this row
            } else {
                row.style.display = "none"; // hides this row
            }
        }
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>


</html>