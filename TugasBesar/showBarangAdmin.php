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
                        <li class="nav-item"><a class="nav-link active" href="showBarangAdmin.php">Data Barang<i class="fa-solid fa-store"></i></a></li>
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
         <table class="table table-light table-striped table-hover">
               <tr class="table-info">
                  <th scope="col"><b>No</b></th>
                  <th scope="col"><b>Id</b></th>
                  <th scope="col"><b>Nama</b></th>
                  <th scope="col"><b>Harga</b></th>
                  <th scope="col"><b>Stok<b></th>
                  <th scope="col"><b>Gambar<b></th>
                  <th scope="col"><b>Action</b></th>
               </tr>  
            <tbody class="table-group-divider">
            <?php
            @include 'koneksi.php';

            $barang = mysqli_query($conn, "SELECT b.id_barang, b.nama_barang, b.harga, b.qty, b.id, b.gambar, p.nama FROM barang b
                                             INNER JOIN person p ON b.id = p.id");
            $no = 1;
               foreach ($barang as $row) {
                  if($row['id_barang'] < 10){
                     $id_barang = "000{$row['id_barang']}";
                  } elseif ($row['id_barang'] < 100) {
                     $id_barang = "00{$row['id_barang']}";
                  } elseif ($row['id_barang'] < 1000) {
                     $id_barang = "0{$row['id_barang']}";
                  } else {
                     $id_barang = $row['id_barang'];
                  } 
                  $harga = "Rp ". $row['harga'];
                  if($row['qty'] == 1){
                     $qty = "Avaible";
                  } elseif ($row['qty'] == 0){
                     $qty = "Soldout";
                  }
                  ?>
                  <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $id_barang;?></td>
                  <td><?php echo $row['nama_barang'];?></td>
                  <td><?php echo $harga;?></td>
                  <td><?php echo $qty;?></td>
                  <td><img src="gambarProduk/<?php echo $row['gambar'];?>" style="width: 120px; height: 120px;"></td>      
                  
                  <?php
                  echo "
                  <td>
                  <a href='formEditBarang.php?id_barang=$row[id_barang]'><button >Edit</button></a>
                  <a href='deleteBarang.php?id_barang=$row[id_barang]'><button>Delete</button></a>
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