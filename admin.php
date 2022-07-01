<?php

    require 'function.php';
    require 'cek.php'; 
    $admin = "Admin";
    if( $_SESSION['level'] == $admin ){
        
        header('location:home.php');
    }
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
            <a class="nav-link" href="note.php"><i class="fa fa-sticky-note fa-lg" aria-hidden="true"></i></a>
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List Admin</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Admin List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <a class="btn btn-primary" href="tambahuser.php"> Add User </a></td>
                                    <br><br>
                                            <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
													<th>Email</th>
                                                    <th>Password</th>
													<th>Level</th>
													<th>Action</th>  
                                            </tr>
                                        </thead>
                                    <tbody>
                                            <?php

                                              $data=mysqli_query($conn, "SELECT * FROM login");
                                              $i= 1;
                                              while($admin = mysqli_fetch_array($data)){
                                                $idu=$admin['iduser'];
                                                $nama=$admin['nama'];
                                                $email=$admin['Email'];
                                                $password=$admin['Password'];
                                                $level=$admin['level'];
                                            ?>
                                              <tr class="warning">
                                              <td><?php echo $i++; ?></td>
	                                          <td><?php echo $admin['nama']; ?></td>
                                              <td><?php echo $admin['Email']; ?></td>
                                              <td><?php echo $admin['Password']; ?></td>
                                              <td><?php echo $admin['level']; ?></td>
                                              <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idu;?>">
                                                        Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idu;?>">
                                                        Delete
                                                </button>
                                              </td>
	                                          </tr>
                                              
                                              <div class="modal fade" id="edit<?=$idu;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="function.php">
                                                        <div class="modal-body">
                                                            <label>Username</label>
                                                            <Input type="text" name="nama" value="<?=$nama;?>" class="form-control">
                                                            <br>
                                                            <label>Email</label>
                                                            <Input type="email" name="email" value="<?=$email;?>" class="form-control">
                                                            <br>
                                                            <label>Password</label>
                                                            <Input type="password" name="password" value="<?=$password;?>" class="form-control">
                                                            <br>
                                                            <label>level</label>
                                                            <select class="form-select" aria-label="Default select example" name="Level" value="<?=$level;?>" id="Level" required>
                                                                <option selected>Select Level</option>
                                                                <option>Admin</option>
                                                                <option>Super Admin</option>
                                                            </select>
                                                            <input type="hidden" name="idu" value="<?=$idu?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="updateadmin">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="modal fade" id="delete<?=$idu;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Admin?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="function.php">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?=$nama?>,<?=$level?> ?
                                                            <input type="hidden" name="idu" value="<?=$idu?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="hapusadmin">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                                </div>
                                                <?php } ?> 
                                              </tbody>
                                    </thead>
                                </table>
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
