<?php include("connectionn.php");
  session_start();
  if(isset($_SESSION["mib"]))
  {
    $mib=$_SESSION["mib"];
    $result=mysqli_query($connect,"SELECT * from member where member_id='$mib' ");
    $row=mysqli_fetch_assoc($result);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleabout.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="favicon.ico?v=1" type="image/x-icon"/><title>FreshPeeks</title>
</head>
<script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
<style>

#hide{display:none}

body{ transition:margin-left .5s;
  padding:20px;}

i{margin-left:10px;}

#logout:hover{
    color:red;
    text-decoration:underline;
  }

  .socials li a{
    text-decoration:none;color:white;
  }

</style>


<body>

<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></a>
  <a>
    <?php 
    if(isset($mib))
    {?>
      <a href="userdashboard.php"><?php echo $row['member_name']?></a>
      <a id="logout" href="logout.php">Logout</a>
      <a id="link" href="wishlist.php">Wishlist</a>
    <?php
    }
    else {
    ?>
      <a href="login.php">Login</a>
  <?php
    }
    ?>
  </a>
  <a href="menumovie.php">Home</a>
  <a href="aboutus.php">About</a>
</div>

<button class="openbtn" onclick="openNav()"><i class="fa-solid fa-bars-staggered"></i></button>


<h1 style="font-size: 30px;color:white;text-align: center;margin-bottom:15px;">About Us</h1>


<div class="row">

<div class="column">
    <div class="card">
    <h3>Who are we ?</h3> 
    <p>From the opening of doors since 2000, we've entertained countless moviegoers with memories. 
       From the latest blockbuster to intimate dramas, with a dash of horror, romance and documentaries are also in the mix, 
       satisfaction is where our customers get lots of entertainment anytime.
       Tickets can also be purchased real quick and covenient through our website!!!!
    </p>

</div>
</div>  

<div class="column">
    <div class="card">
        <img src="images/3.png">
    </div>
</div>  

<div class="column">
    <div class="card">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163684.34344437727!2d-70.99475281015516!3d24.967902071536116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89451ab5034cb7ab%3A0xb600ecf3df7aca4d!2sBermuda%20Triangle!5e0!3m2!1sen!2smy!4v1650182240986!5m2!1sen!2smy" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>  

<div class="column">
    <div class="card">
    <h3>Our Location</h3> 
    <p>Visit us here sometimes if you want to go on a date.<br>( ͡° ͜ʖ ͡°)</p>
</div>
</div>  

</div>  


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script type="text/javascript">
    var count=0;
    AOS.init({
        offset:300,
        duration:900
    });
    function openNav() {
  document.getElementById("sidenav").style.width = "200px";
  document.querySelector("body").style.marginLeft="200px";
  document.querySelector(".openbtn").style.opacity="0";
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0px";
  document.querySelector("body").style.marginLeft="0px";
  document.querySelector(".openbtn").style.opacity="1";
}
</script>
</body>
<footer>

<div class="container-footer">
<div class="row-footer">

<div class="column-footer">
<h3>FreshPeeks.co</h3>
<div class="line"></div>
<p>Only the best movies meant for your eyes.</p>
</div> 

<div class="column-footer">
<h3>Our Socials</h3>
<div class="line"></div>
<ul class="socials">
<li><a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-square"></i>Facebook</a></li>
<li><a href="https://www.instagram.com/?hl=en"><i class="fa-brands fa-instagram-square"></i>Instagram</a></li>
<li><a href="https://twitter.com/?lang=en"><i class="fa-brands fa-twitter-square"></i>Twitter</a></li>
</ul>
</div> 

<div class="column-footer" style="transform:translateX(-50px)">
<h3>Contact</h3>
<div class="line"></div>
<ul class="socials">
    <li><a><i class="fa-solid fa-envelope"></i>freshpeeks69@gmail.com</a></li>
    <li><a><i class="fa-solid fa-phone"></i>011-22334469</a></li>
</ul>
</div> 

<div class="column-footer">
<h3>Payments</h3>
<div class="line"></div>
<ul class="payments" style="display:flex;flex-wrap:wrap">
    <li><img src="images\american-express.png" style="width:40px;height:40px"></li>
    <li><img src="images\visa.png" style="width:40px;height:40px"></li>
    <li><img src="images\paypal.png" style="width:40px;height:40px"></li>
</ul>
</div> 

</div>
</div>

</footer>
</html>
