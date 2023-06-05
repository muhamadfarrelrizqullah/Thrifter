<?php 
@include 'koneksi.php';

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$gambar = $_FILES['gambar']['name'];

$extension_required = array('png', 'jpg');
$x = explode('.', $gambar);
$extension = strtolower(end($x));
$tmp_files = $_FILES['gambar']['tmp_name'];

if ($gambar != "") {      
    if (in_array($extension, $extension_required) === true) {
        move_uploaded_file($tmp_files, 'gambarProduk/'. $gambar);

        $query= "UPDATE barang SET nama_barang = '$nama_barang', harga = '$harga', qty = 'qty', gambar = '$gambar' WHERE id_barang = '$id_barang'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query error ".mysqli_errno($conn). "-" .mysql_error($conn));
        } else {
            header('location:showBarangAdmin.php');
        } 
    } else {
        $error[] = 'ekstensi gambar tidak sesuai!';
    }
    } else {
      $error[] = 'silahkan upload gambar barang!';
    }


?>

