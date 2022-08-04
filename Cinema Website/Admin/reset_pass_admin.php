<?php 
include("connectionn.php");

session_start();

if(isset($_POST['reset']))
{

	$logemail=$_POST['login_email'];
  $name=$_POST['name'];
 $pass1=$_POST['pass'];
  $pass2=$_POST['re_pass'];
  $error=1;

    $query = mysqli_query($connect,"SELECT * FROM admin WHERE admin_email='$logemail' AND admin_name='$name' ");
    $row = mysqli_num_rows($query);

    if (empty($row)){
    $errorEmail= 'Account not recognized';
    $error=0;
    }
    if ($pass1!=$pass2){
    $errorPassword= 'Both password should be same.';
    $error=0;
    }
    if($pass2==$pass1)

    if($row>0 && $error!=0)
    {
    mysqli_query($connect,"UPDATE admin SET admin_pass='$pass2' WHERE admin_email='$logemail'");
    echo '<script>alert("Successfully Updated Password Login with The New Password")</script>';
    echo("<script>location.href='adminlogin.php'</script>");
    }	

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
  <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<style>
body
{
	background-color: rgb(0, 0, 0);
	display: flex;
	padding: 0;
	margin: 0;
	justify-content: center;
	font-family: 'Jost', sans-serif;
	min-height: 100vh;
	align-items: center;
}

.main
{
	background-color: #ffffff;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
	width: 500px;
	height: 600px;
	overflow: hidden;
}

#check
{
	display: none;
}

.registration
{
	position: relative;
	width:100%;
	height: 100%;
	margin-top: -30px;
}

label
{
	color: black;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}

i{margin-right:5px}

.error-message{color:red;text-align: center;}

input
{
	width: 47%;
	height: 20px;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border:none;
	outline:none;
	border: 1px solid #F50057;
}

input:focus
{ 
    outline:none;
}

button
{
	width: 35%;
	height: 45px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: rgb(255, 255, 255);
	background: #F50057;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
    transform:translateY(10px);
	border: none;
	border-radius: 20px;
	transition: .15s ease-in-out;
	cursor: pointer;
}

button:hover
{
	background-color:transparent;
	border:2px solid #F50057;
	color:#F50057; 
}

.login
{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}

.login label
{
	color: #000000;
	margin-top:100px;
	transform: scale(.6);
}


</style>
<body>
	<div class="main">  	
		  <form method="post" >
		  <label for="check" aria-hidden="true">Password Reset</label>
		  <input type="text" id="name" name="name" placeholder="Admin Name" required>
		  <input type="email" id="login_email" placeholder="Email" name="login_email" required>
          <div class="error">
            <?php 
            if(!empty($errorEmail))
            {?>
              <p class="error-message"><i class="fa-solid fa-circle-exclamation"></i><?php echo $errorEmail;?></p>
            <?php
            }
            ?>
          </div>
		      <input type="password" id="login_pass" placeholder="Password" name="pass" required>
          <input type="password" id="login_pass" placeholder="Repeat Password" name="re_pass" required>
          <div class="error">
            <?php 
            if(!empty($errorPassword))
            {?>
              <p class="error-message"><i class="fa-solid fa-circle-exclamation"></i><?php echo $errorPassword;?></p>
            <?php
            }
            ?>
          </div>

		  <button type="submit" name="reset" id="reset">Reset</button>
		  </form>
	</div>
</body>
</html>

