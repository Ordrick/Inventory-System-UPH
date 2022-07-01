<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inventaris UPH</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href='assets/img/uph.png' rel='shortcut icon'>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" id="bg-nav">
            <a class="navbar-brand ps-3" href="index.php"><img src="assets/img/uph.png" class="img-fluid" width="50px">&nbsp;Inventaris UPH Medan</img></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <a class="nav-link" href="home.php"><i class="fa fa-sticky-note fa-lg" aria-hidden="true"></i></a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                    
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" id='bg-nav'>
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="home.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                                Stok Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="rusak.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
                                Barang Rusak
                            </a>
                            <div class="sb-sidenav-menu-heading">Kode Barang</div>
                            <a class="nav-link" href="kodebarang.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-id-card" aria-hidden="true"></i></div>
                                Registrasi Kode Barang
                            </a>
                            <a class="nav-link" href="kodejenis.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-id-card" aria-hidden="true"></i></div>
                                Registrasi Kode Jenis Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Account</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                Admin
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['nama']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div class="container-fluid">
                <main>
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Notes</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
										 <table class="table table-bordered table-hover"><thead class="thead-dark">  
										<tr>
										 <th><center> No </center></th>
										 <th><center> Catatan </center></th>
                                         <th><center> Penulis </center></th>
										 <th><center> Action </center></th>


										</tr></thead>
										 <form method ='POST' action = 'notes.php'>
										 <tr class="table-active">
											<td><center><input type = 'hidden'/></center> </td>
											<td><center> <input type = 'text' placeholder="Tulis Pesan Disini !" class='form-control' name = 'konten' required /></center> </td>
                                            <td><input type="hidden" name="writer" value="<?php echo $_SESSION['nama']; ?>"></td>
											<td><center><input type = 'submit' name = 'submit'  class='btn btn-primary btn-sm' value = 'Add Note'/></center></td>
											<tr>
										 </form>
                                         <?php

                                            $data=mysqli_query($conn, "SELECT * FROM notes");
                                            $i= 1;
                                            while($datanotes = mysqli_fetch_array($data)){
                                            ?>
                                            <tbody>
                                            <tr class="warning">
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $datanotes['content']; ?></td>
                                            <td><?php echo $datanotes['penulis']; ?></td>
                                            <td><center><a class="btn btn-danger" href="deletenotes.php?id=<?php echo $datanotes['id']; ?>">Delete</a></center></td>

                                            </tr>
                                            </tbody>
                                            <?php } ?> 
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>  
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
