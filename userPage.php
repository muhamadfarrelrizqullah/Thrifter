<?php

@include 'koneksi.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:formLogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Page</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="icon" href="img/logo4.png" type="image/icon type">
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="userPage.php">Beranda<i class="fa-solid fa-house"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="showBarangUser.php">Barang Dijual<i class="fa-solid fa-store"></i></a></li>
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
         <div class="content">
            <h4 id="hello" style="text-align: left;"></h4>
            <h1>Selamat Datang <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>anda berada dihalaman user</p>
            <h2><a href="logout.php" class="btn">logout</a> Jika anda Bosan</h2>
         </div>
      </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
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

      gsap.from('.content', {duration: 3, y: -200, opacity: 0, ease: 'back'});

      var hello = document.getElementById('hello');
      var typewriter = new Typewriter(hello, {
         loop: true
      });

      typewriter.typeString('Halo User yang <strong>Cakep</strong>')
         .pauseFor(1000)
         .deleteChars(5)
         .typeString('<strong>Rajin Menabung</strong>')
         .pauseFor(1000)
         .deleteChars(14)
         .typeString('<strong>Baik</strong>')
         .pauseFor(1000)
         .deleteChars(4)
         .typeString('<strong>Tidak Sombong</strong>')
         .pauseFor(1000)
         .deleteChars(13)
         .typeString('<strong>Jujur</strong>')
         .pauseFor(1000)
         .deleteChars(5)
         .typeString('<strong>Sabar</strong>')
         .pauseFor(1000)
         .deleteAll()
         .typeString('<strong>Tapi Boong, yahahaha hayuk..</strong>')
         .start();
   </script>
</body>
</body>
</html>