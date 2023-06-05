<?php 
@include 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM person WHERE id = '$id'";
$result = mysqli_query($conn, $query);

 
header("location:penggunaAll.php?");
?>