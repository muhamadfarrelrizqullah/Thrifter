<?php

@include 'koneksi.php';

session_start();

if(isset($_POST['submit'])){

   
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];

   $select = " SELECT * FROM person WHERE email = '$email' && password = '$password'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['person_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['nama'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:adminPage.php');

      }elseif($row['person_type'] == 'user'){

         $_SESSION['user_name'] = $row['nama'];
         $_SESSION['user_id'] = $row['id'];
         header('location:userPage.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="icon" href="img/logo4.png" type="image/icon type">
</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <img src="img/logo3.png" style="width: 300px; height: 300px; margin: auto;">
         <h3>Login now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="masukkan email...">
         <input type="password" name="password" id="password" required placeholder="masukkan password...">
         <span id="show-hide"><i class="fa-regular fa-eye" id="eye" onclick="toggle()"></i></span>
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Tidak punya akun? <a href="registerForm.php">daftar sekarang</a></p>
      </form>
   </div>
   <script type="text/javascript">
         let password = document.getElementById('password')
         let button = document.getElementById('show-hide')

         button.addEventListener('click', function() {
            if (password.type === "password") {
                document.getElementById("eye").style.color='#2b2d42';
                password.type = "text"
            } else {
                document.getElementById("eye").style.color='#8d99ae';
                password.type = "password"
            }
         })
   </script>
</body>
</html>