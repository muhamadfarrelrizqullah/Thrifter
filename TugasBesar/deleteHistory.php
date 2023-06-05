<?php 
@include 'koneksi.php';

$id_history = $_GET['id_history'];

$query = "DELETE FROM history WHERE id_history = '$id_history'";
$result = mysqli_query($conn, $query);

 
header("location:showHistoryAdmin.php?");
?>