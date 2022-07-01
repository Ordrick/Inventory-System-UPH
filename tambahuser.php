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
        <section class="vh-100" style="background-color: #002d77;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                    <div class="col-md-6 col-lg-5">
                        <div class="py-5"></div><br>
                        <img src="assets/img/model.png" salt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                        <form method="post" action="post.php">

                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-users fa-2x me-3" style="color: #ff6219;"></i>
                            <span class="h1 fw-bold mb-0">Tambah User</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Make new account</h5>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17">Username</label>
                            <input type="username" id="Username" name="Username" required="required" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17">Email Address</label>
                            <input type="email" id="Email" name="Email" required="required" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Password</label>
                            <input type="password" id="Password" name="Password" required="required" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Level</label>
                            <select class="form-select" aria-label="Default select example" name="Level" id="Level" required>
                                <option selected>Select Level</option>
                                <option>Admin</option>
                                <option>Super Admin</option>
                            </select>
                        </div>
                        
                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Add Account</button>
                            <button class="btn btn-primary btn-lg btn-block" type="button"><a class="backbutton" href="admin.php"> Back </a></button>
                        </div>
                        
                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</html>