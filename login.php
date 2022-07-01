<?php
require 'function.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'");
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] = 'True';
        $row = mysqli_fetch_array($cekdatabase);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];
        
        header('location:home.php');
    } else {
        echo "<script>alert('Email atau Password Salah'); 
        window.location.href='home.php';
        </script>";
    };
};

if(!isset($_SESSION['log'])){
    
}else{
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
        <title>Form Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href='assets/img/uph.png' rel='shortcut icon'>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">
                                    <img src="assets/img/uph.png" class="img-fluid" width="250px"><br><br>
                                    <div class="margin-tulisan">Login Inventaris Barang <br> Universitas Pelita Harapan Medan</div></h3>
                                </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><marquee direction="right"> Dibuat Oleh Ordrick <marquee></div>
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
    </body>
</html>
