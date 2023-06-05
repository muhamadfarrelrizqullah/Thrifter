<?php

@include 'koneksi.php';

session_start();

if(isset($_POST['submit']) && isset($_FILES['gambar']['name'])){

   $nama_barang = $_POST['nama_barang'];
   $harga = $_POST['harga'];
   $gambar = $_FILES['gambar']['name'];
   $id = $_SESSION['user_id'];

   $extension_required = array('png', 'jpg');
   $x = explode('.', $gambar);
   $extension = strtolower(end($x));
   $tmp_files = $_FILES['gambar']['tmp_name'];

   if ($gambar != "") {      
      if (in_array($extension, $extension_required) === true) {
         move_uploaded_file($tmp_files, 'gambarProduk/'. $gambar);

         $insert = "INSERT INTO barang(nama_barang, harga, qty, gambar, id) VALUES('$nama_barang','$harga','1','$gambar', '$id')";
         $result = mysqli_query($conn, $insert);

         if (!$result) {
            die("Query error ".mysqli_errno($conn). "-" .mysql_error($conn));
         } else {
            header('location:showBarangUser.php');
         } 
      } else {
            $error[] = 'ekstensi gambar tidak sesuai!';
      }
   } else {
      $error[] = 'silahkan upload gambar barang!';
   }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sales Form</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
   <div class="container">
      <nav class="navbar navbar-dark fixed-top" style="background: #2b2d42;">
         <div class="container-fluid">
            <h1><span>THRIFTER </span> Tempat Jual Beli Baju Second Termurah katanya..</h1>
               <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="background: #28242c;">
                  <div class="offcanvas-header">
                     <h5 class="offcanvas-title text-white" id="offcanvasDarkNavbarLabel">Ini Sidebar</h5>
                     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                     <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="userPage.php">Beranda<i class="fa-solid fa-house"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="showBarangUser.php">Barang Dijual<i class="fa-solid fa-store"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" href="addBarang.php">Tambah Barang<i class="fa-solid fa-plus"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="showHistoryUser.php">Histori Pembelian<i class="fa-sharp fa-solid fa-clock-rotate-left"></i></a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Akun<i class="fa-solid fa-user"></i></a>
                           <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" href="formEditUser.php">Edit Akun</a></li>
                              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
         </div>
      </nav>
      <div class="form-container">
         <form action="" method="post" enctype="multipart/form-data">
            <h3>Add Item</h3>
            <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            };
            ?>
            <input type="text" name="nama_barang" required placeholder="masukkan nama barang...">
            <input type="number" name="harga" required placeholder="masukkan harga barang dalam rupiah...">
            <input type="file" name="gambar" required placeholder="masukkan gambar barang...">
            <input type="submit" name="submit" value="add item" class="form-btn">
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script type="text/javascript">
      gsap.from('.form-container', {duration: 1.5, y: -150, ease: 'power3'});

      $(document).ready(function() {
         $(".nav-item").hover(function(){
            $(this).css("background-color", "#52575c");
         },function() {
            $(this).css("background-color", "#28242c");
         });
      });
   </script>
</body>
</html>