<?php

include_once('dbconnect.php');
$id = $_GET['id'];
$query = "DELETE FROM notes WHERE id='$id'";
mysqli_query($conn, $query);
header('location: note.php');

?>