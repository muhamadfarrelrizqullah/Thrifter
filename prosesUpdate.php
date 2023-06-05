<?php 
@include 'koneksi.php';

session_start();
    
if ($_SESSION['admin_id'] != "") {
   $id = $_SESSION['admin_id'];
}

if ($_SESSION['admin_id'] == "") {
   $id = $_SESSION['user_id'];
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$jk = $_POST['jk'];

$query = "UPDATE person SET nama ='$nama', email = '$email', password = '$password', jk = '$jk' WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if($result){
	if ($_SESSION['admin_id'] != "") {
		$_SESSION['admin_name'] = $nama;
        header("location:adminPage.php");
    } else {
    	$_SESSION['user_name'] = $nama;
    	header("location:userPage.php");
    }
}



?>

