<?php

  $conn = mysqli_connect("localhost","root","","inventaris");

  $Konten = $_POST['konten'];
  $Penulis = $_POST['writer'];
  $addkonten = "INSERT INTO notes (content, penulis) VALUES ('$Konten', '$Penulis')";
  if (mysqli_query($conn, $addkonten)) {
    echo "Input berhasil";
  } else {
    echo "Input gagal";
  }

  header('Location: note.php');
  mysqli_close($conn);
  
?>