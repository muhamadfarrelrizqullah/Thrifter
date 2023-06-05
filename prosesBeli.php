<?php 
@include 'koneksi.php';

session_start();

$id = $_SESSION['user_id'];
$id_barang = $_POST['id_barang'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO history (id, id_barang, alamat) VALUES ('$id', '$id_barang', '$alamat')";
$result = mysqli_query($conn, $query);

if (!$result) {
            die("Query error ".mysqli_errno($conn). "-" .mysql_error($conn));
        } else {
            $queryStok = "UPDATE barang SET qty = 0 WHERE id_barang = '$id_barang'";
            mysqli_query($conn, $queryStok);
            header('location:showHistoryUser.php');
        }
?>

