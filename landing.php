<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing page</title>
    <link rel="stylesheet" href="css/landing.css?v=<?php echo time(); ?>">
    <link rel="icon" href="img/logo4.png" type="image/icon type">
</head>
<body>
    <div id="bg"></div>
    <div id="main"> 
    <div id="logo"><img src="img/logo3.png" style="width: 200px; height: 200px; margin-top: 50px;"></div>
    <div id="sign-nav">
        <div id="signin">
            <a href="formLogin.php">Login</a>
        </div>
        <div id="signup">
            <a href="registerForm.php">Sign up</a>
        </div>
    </div>

    <div id="main-content">
        <div id="big-title">
            <h1>Thrifter Enjoyer</h1>
        </div>
        <div id="desc">
            <p>Kami mengundang Anda untuk mengeksplorasi keajaiban baju bekas kami yang penuh cerita.
                 Dalam dunia yang semakin terhubung ini, kami ingin memperkenalkan Anda pada keindahan kesederhanaan 
                 dan gaya yang berkelanjutan. </p>
        </div>
        <div class="btn"><a class="bt-main" href="formLogin.php">Get Started</a></div>
    </div>
    </div>

    <div id="map">
    <div id="main-content">
        <div id="big-title">
            <h2>Kunjungi kami</h2>
        </div>
        <div id="map-content">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d493.942440061091!2d112.616068!3d-7.943064!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7883cb018b4f41%3A0x33ece0cb8a8f9fa0!2sTHRIFT%20SHOP%20%5BSAYAK%20VINTAGE%5D!5e0!3m2!1sid!2sus!4v1688211817909!5m2!1sid!2sus"
            width="1000" height="400" frameborder="0" style="border:0;" allowfullscreen=""aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    </div>
</body>

</html>