<?php 
@include 'koneksi.php';

$id_barang = $_GET['id_barang'];

$query = "DELETE FROM barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($conn, $query);

 
header("location:showBarangAdmin.php?");
?>