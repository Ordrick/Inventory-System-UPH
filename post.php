<?php

  $conn = mysqli_connect("localhost","root","","inventaris");

  $Username = $_POST['Username'];
  $Email  = $_POST['Email'];
  $Password  = $_POST['Password'];
  $Level  = $_POST['Level'];

  $adduser = "INSERT INTO login (nama, Email, Password, level) VALUES ('$Username', '$Email', '$Password', '$Level')";
  if (mysqli_query($conn, $adduser)) {
    echo "Input berhasil";
  } else {
    echo "Input gagal";
  }

  header('Location: admin.php');
  mysqli_close($conn);
  
?>