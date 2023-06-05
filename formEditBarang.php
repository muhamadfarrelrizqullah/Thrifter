<?php

    @include 'koneksi.php';

    $id_barang = (isset($_GET['id_barang']))?$_GET['id_barang']:'';

    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

   
    $id_barang = $data['id_barang'];
    $nama_barang = $data['nama_barang'];
    $harga = $data['harga'];
    $qty = $data['qty'];
    $gambar = $data['gambar'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Admin Form</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="icon" href="img/logo4.png" type="image/icon type">
</head>
<body>
   <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
   ?>
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
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="adminPage.php">Beranda<i class="fa-solid fa-house"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" href="showBarangAdmin.php">Data Barang<i class="fa-solid fa-store"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="addBarang.php">Tambah Barang<i class="fa-solid fa-plus"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="showHistoryAdmin.php">Histori Pembelian<i class="fa-sharp fa-solid fa-clock-rotate-left"></i></a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data Pengguna<i class="fa-solid fa-users"></i></a>
                           <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" href="penggunaAdmin.php">Admin</a></li>
                              <li><a class="dropdown-item" href="penggunaUser.php">User</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="penggunaAll.php">All</a></li>
                           </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Akun<i class="fa-solid fa-user"></i></a>
                           <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" href="formEditAdmin.php">Edit Akun</a></li>
                              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
         </div>
      </nav>
      <div class="form-container">
         <form action="prosesUpdateBarang.php" method="post" enctype="multipart/form-data">
            <h3>Update Item</h3>
            <input type="text" name="nama_barang" required placeholder="masukkan nama barang..." value="<?php echo $nama_barang?>">
            <input type="number" name="harga" required placeholder="masukkan harga barang dalam rupiah..." value="<?php echo $harga?>">
            <select name="qty">
               <option value="1" <?php echo $qty == '1' ? 'selected="selected"' : '' ?>>Avaible</option>
               <option value="0" <?php echo $qty == '0' ? 'selected="selected"' : '' ?>>Soldout</option>
            </select>
            <input type="file" name="gambar" required value="<?php echo $gambar?>">
            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
            <input type="submit" name="submit" value="update" class="form-btn">
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $(".nav-item").hover(function(){
            $(this).css("background-color", "#52575c");
         },function() {
            $(this).css("background-color", "#28242c");
         });
      });
      
      gsap.from('.form-container', {duration: 1.5, y: -150, ease: 'power3'});
   </script>
</body>
</html>