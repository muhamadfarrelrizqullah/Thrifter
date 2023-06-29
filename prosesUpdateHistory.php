<?php 
@include 'koneksi.php';

$id_history = $_POST['id_history'];
$alamat = $_POST['alamat'];
$waktu_beli = $_POST['waktu_beli'];
$timestamp = strtotime($waktu_beli);
$waktu_belibaru = date("Y/m/d H:i:s",$timestamp );
$status_bayar = $_POST['status_bayar'];

$query = "UPDATE history SET alamat = '$alamat', waktu_beli = '$waktu_belibaru', status_bayar = '$status_bayar' WHERE id_history = '$id_history'";
$result = mysqli_query($conn, $query);

if($result){
    header('location:showHistoryAdmin.php');
}

?>

