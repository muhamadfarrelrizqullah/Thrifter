<?php

@include 'koneksi.php';

if(isset($_POST['submit'])){

   $nama = mysqli_real_escape_string($conn, $_POST['nama']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $person_type = $_POST['person_type'];
   $jk = $_POST['jk'];

   $select = " SELECT * FROM person WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user telah ada!';

   }else{

      if($password != $cpassword){
         $error[] = 'password tidak cocok!';
      }else{
         $insert = "INSERT INTO person(nama, email, password, person_type, jk) VALUES('$nama','$email','$password','$person_type', '$jk')";
         mysqli_query($conn, $insert);
         header('location:formLogin.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link rel="icon" href="img/logo4.png" type="image/icon type">
</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Register now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="nama" required placeholder="masukkan nama...">
         <input type="email" name="email" required placeholder="masukkan email...">
         <input type="password" name="password" required placeholder="masukkan password...">
         <input type="password" name="cpassword" required placeholder="konfirmasi password...">
         <select name="person_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
         </select>
         <select name="jk">
            <option value="l">Laki-laki</option>
            <option value="p">Perempuan</option>
         </select>
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>Sudah punya akun? <a href="formLogin.php">login sekarang</a></p>
      </form>
   </div>
</body>
</html>