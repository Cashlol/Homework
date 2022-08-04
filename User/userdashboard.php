<?php 
include("connectionn.php");

session_start();
if(!isset($_SESSION["mib"]))
{
  echo"<script>alert('You need to login to access this')</script>";
  echo("<script>location.href='menumovie.php'</script>");
}

else{

$mib=$_SESSION["mib"];
$result2=mysqli_query($connect,"SELECT * from member where member_id='$mib' ");
$row2=mysqli_fetch_assoc($result2);

include("connectionn.php");
$sum=mysqli_query($connect,"SELECT SUM(booking_price) AS count FROM booking WHERE booking_status='Confirm' AND member_id='$mib' ");
$row_sum=mysqli_fetch_assoc($sum);

$member=mysqli_query($connect,"SELECT * FROM member");
$count_member=mysqli_num_rows($member);

$result_booking=mysqli_query($connect,"SELECT * from booking WHERE member_id='$mib' AND booking_status='Confirm' ");
$book_count=mysqli_num_rows($result_booking);

$result_review=mysqli_query($connect,"SELECT * from reviews WHERE member_id='$mib' ");
$review_count=mysqli_num_rows($result_review);

$result_wish=mysqli_query($connect,"SELECT * from wishlist WHERE member_id='$mib' AND check_stat='1' ");
$wish_count=mysqli_num_rows($result_wish);
?>
<!DOCTYPE html>

<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="user_dash.css">
<link rel="icon" href="favicon.ico?v=1" type="image/x-icon"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<style>

.closebtn{
  transform:translateY(15px);
}

</style>

<body>

<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></a>
  <a>
    <?php 
    if(isset($mib))
    {?>
      <a href="userdashboard.php"><?php echo $row2['member_name']?></a>
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

<h2 style="font-size:30px;color:#ffffff;font-weight:bold;display:block;margin:0 auto;width:80%;padding-top:10px">Dashboard</h2>
<h2 style="font-size:25px;color:#ffffff;font-weight:bold;display:block;margin:0 auto;width:80%;padding-top:10px">Hello, <?php echo" ";echo $row2['member_name'] ?>
<a href="reset_user_mail.php"><i class="fa-solid fa-pen-to-square" style="font-size:15px;margin-left:5px;color:#ffffff"></i></a>
</h2>
<div class="cardBox">
    <div class="card" style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);">
      <div>
        <div class="cardName"><i class="fa-solid fa-dollar-sign"></i>Total Spent</div>
        <div class="numbers"><?php if(is_null($row_sum))echo"No data";echo"RM ";echo number_format($row_sum['count'],2)?></div>
      </div>

    </div>
      <div class="card" style="background-image: linear-gradient( 135deg, #FCCF31 10%, #F55555 100%);">
      <div>
        <div class="cardName"><i class="fa-solid fa-ticket"></i>Tickets Bought</div>
        <div class="numbers"><?php if(is_null($book_count))echo"No data";else echo $book_count ?></div>
      </div>
    </div>

      <div class="card" style="background-image: linear-gradient( 135deg, #2AFADF 10%, #4C83FF 100%);">
      <div>
        <div class="cardName"><i class="fa-solid fa-comment"></i>Reviews Made</div>
        <div class="numbers"><?php if(is_null($review_count))echo"No data";else echo $review_count ?></div>
      </div>
    </div>

    <div class="card"style="background-image: linear-gradient( 135deg, #F5CBFF 10%, #C346C2 100%);">
      <div>
        <div class="cardName"><i class="fa-solid fa-heart"></i>Wishlist</div>
        <div class="numbers"><?php if(is_null($wish_count))echo"No data";else echo $wish_count?></div>
      </div>
    </div>

  </div>

<div class="cardBox_table">

    <div class="card_table">
    <h3 style="color:#ffffff;margin-left:10px">Booking</h3>
    <table>
    <thead>
    <tr>
        <th>Booking No.</th>
        <th>Movie</th>
        <th>Date</th>
        <th>Price</th>
        <th>Status</th>
    </tr> 
    </thead>
    <tbody>
    <?php while($row_booking=mysqli_fetch_assoc($result_booking)){?>

    <tr>
    <td><?php echo $row_booking['booking_id'];?></td>
    <td><?php echo $row_booking['mov_id'];?></td>
    <td><?php echo $row_booking['booking_date'];?></td>
    <td><?php echo $row_booking['booking_price'];?></td>
    <td><?php echo $row_booking['booking_status'];?></td>
   </tr>

   <?php }?>

   </tbody>
   </table>
   </div>

    <div class="card_table">
    <h3 style="color:#ffffff;margin-left:10px">Reviews</h3>
    <table>
    <thead>
    <tr>
        <th>Movie</th>
        <th>Review</th>
        <th>Rating</th>
    </tr> 
    </thead>
    <tbody>
    <?php while($row_review=mysqli_fetch_assoc($result_review)){?>

    <tr>
    <td><?php echo $row_review['mov_id']?></td>
    <td><?php echo $row_review['rev_detail']?></td>
    <td><?php if($row_review['rev_score']=='1'){echo 'Like';}else {echo 'Dislike';}?></td>
    
    </tr>

    <?php } ?>

    </tbody>
    </table>
    </div>

</div>


</body>

<script type="text/javascript">
    var count=0;
    AOS.init({
        offset:300,
        duration:900
    });
    
  function openNav(){
  document.getElementById("sidenav").style.width = "200px";
  document.querySelector("body").style.marginLeft="200px";
  document.querySelector(".openbtn").style.opacity="0";
}

function closeNav(){
  document.getElementById("sidenav").style.width = "0px";
  document.querySelector("body").style.marginLeft="0px";
  document.querySelector(".openbtn").style.opacity="1";
}
</script>

</html>
  
<?php }?>