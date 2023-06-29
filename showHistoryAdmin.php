<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Page</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="icon" href="img/logo4.png" type="image/icon type">
</head>
<body>
   <div class="containertable">
      <nav class="navbar navbar-dark sticky-top" style="background: #2b2d42;">
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
                        <li class="nav-item"><a class="nav-link" href="showBarangAdmin.php">Data Barang<i class="fa-solid fa-store"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="addBarang.php">Tambah Barang<i class="fa-solid fa-plus"></i></a></li>
                        <li class="nav-item"><a class="nav-link active" href="showHistoryAdmin.php">Histori Pembelian<i class="fa-sharp fa-solid fa-clock-rotate-left"></i></a></li>
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
         <table class="table table-light table-striped table-hover">
               <tr class="table-info">
                  <th scope="col"><b>No</b></th>
                  <th scope="col"><b>Id Histori</b></th>
                  <th scope="col"><b>Id User</b></th>
                  <th scope="col"><b>Nama</b></th>
                  <th scope="col"><b>Id Barang</b></th>
                  <th scope="col"><b>Nama Barang</b></th>
                  <th scope="col"><b>Alamat<b></th>
                  <th scope="col"><b>Tanggal</b></th>
                  <th scope="col"><b>Status Bayar</b></th>
                  <th scope="col"><b>Action</b></th>
               </tr>  
            <tbody class="table-group-divider">
            <?php
            @include 'koneksi.php';

            $koneksi = mysqli_connect("localhost", "root", "", "db_penjualan");
            $query = mysqli_query($koneksi, "SELECT h.id_history, p.id, p.nama, b.id_barang, b.nama_barang, h.alamat, h.waktu_beli, h.status_bayar FROM history as h
                                             INNER JOIN person p ON h.id = p.id
                                             INNER JOIN barang b ON h.id_barang = b.id_barang");
            $no = 1;
               foreach ($query as $row) {
                  if($row['id_history'] < 10){
                     $id_history = "000{$row['id_history']}";
                  } elseif ($row['id_history'] < 100) {
                     $id_history = "00{$row['id_history']}";
                  } elseif ($row['id_history'] < 1000) {
                     $id_history = "0{$row['id_history']}";
                  } else {
                     $id_history = $row['id_history'];
                  }
                  if($row['id'] < 10){
                     $id = "000{$row['id']}";
                  } elseif ($row['id'] < 100) {
                     $id = "00{$row['id']}";
                  } elseif ($row['id'] < 1000) {
                     $id = "0{$row['id']}";
                  } else {
                     $id = $row['id'];
                  } 
                  if($row['id_barang'] < 10){
                     $id_barang = "000{$row['id_barang']}";
                  } elseif ($row['id_barang'] < 100) {
                     $id_barang = "00{$row['id_barang']}";
                  } elseif ($row['id_barang'] < 1000) {
                     $id_barang = "0{$row['id_barang']}";
                  } else {
                     $id_barang = $row['id_barang'];
                  }  
                  if($row['status_bayar'] == 0){
                     $status_bayar = "Belum Bayar";
                  } else {
                     $status_bayar = "Sudah Bayar";
                  } 
                  ?>
                  <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $id_history;?></td>
                  <td><?php echo $id;?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $id_barang;?></td>
                  <td><?php echo $row['nama_barang'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['waktu_beli'];?></td>
                  <td><?php echo $status_bayar;?></td>

                  <?php
                  echo "
                  <td>
                  <a href='formEditHistory.php?id_history=$row[id_history]'><button >Edit</button></a>
                  <a href='deleteHistory.php?id_history=$row[id_history]'><button>Delete</button></a>
                  </td>
                  </tr>";
               $no++;
               }?>
            </tbody>
         </table>
      </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script type="text/javascript">
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