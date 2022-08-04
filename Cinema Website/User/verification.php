<?php include("connectionn.php");

if(isset($_POST['reset']))
{
  $error=1;
  $logemail=$_POST['login_email'];
  $username=$_POST['username'];

  $query = mysqli_query($connect,"SELECT * FROM member WHERE member_email='$logemail' AND member_name='$username' ");
  $row = mysqli_num_rows($query);

  if(empty($row))
  {
    $errorEmail= 'Account not recognized';
  }


  if($row>0 && $error!=0)
  {
  session_start();
  $_SESSION['check']=1;
  echo("<script>location.href='reset_pass.php'</script>");
  }	

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
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
	height: 550px;
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
  transform:translateY(30px);
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
		  <label for="check" aria-hidden="true">Verify Your Account</label>
		  <input type="email" id="login_email" placeholder="Email" name="login_email" required>
          <input type="text" id="username" name="username" placeholder="Username" required>
          <div class="error">
            <?php 
            if(!empty($errorEmail))
            {?>
              <p class="error-message" style="transform:translateX(-5px);"><i class="fa-solid fa-circle-exclamation"></i><?php echo $errorEmail;?></p>
            <?php
            }
            ?>
          </div>

		  <button type="submit" name="reset" id="reset">Reset</button>
		  </form>
	</div>
</body>
</html>

