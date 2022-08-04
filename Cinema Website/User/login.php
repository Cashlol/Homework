<?php include("connectionn.php");?>

<!DOCTYPE html>
<html>
<head>
	<title>Login/Sign Up</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="check" aria-hidden="true">

			<div class="registration">
				<form method="post">
					<label for="check" aria-hidden="true">Register</label>
					<input type="text" id="user" name="user" placeholder="User name" required>
					<input type="text" id="phone" name="phone" placeholder="Contact No" required>
					<input type="email" id="email" name="email" placeholder="Email" required>
					<input type="password" id="pass" name="pass" placeholder="Password" required>
					<button name="register" id="register">Register</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="check" aria-hidden="true">Login</label>
					<input type="email" id="login_email" placeholder="Email" name="login_email" required>
					<input type="password" id="login_pass" placeholder="Password" name="login_pass" required>
					<a id="forgot" href="reset_pass.php">Forgot password</a>
					<button name="login" id="login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>

<?php

if(isset($_POST['register']))
{
	$db=mysqli_connect("localhost","root","","movie");

	$email=$_POST['email'];
	$password=$_POST['pass'];
	$user=$_POST['user'];
	$phone=$_POST['phone'];

	$check=mysqli_query($connect,"SELECT * FROM member WHERE member_email='$email' or member_phone='$phone' ");

	if(mysqli_num_rows($check)>0)
	{
		echo '<script>alert("An account with this email/phone number already exist");</script>';
	}
	else
	{
		$sql="INSERT into member(member_name,member_email,member_phone,member_pass)VALUES('$user','$email','$phone','$password')";
		if(mysqli_query($db,$sql))
		{
			echo '<script>alert("Successfully Registered");</script>';
			echo("<script>location.href='menumovie.php'</script>");
			
			$msql=mysqli_query($connect,"SELECT * from member where member_email='$email' and member_pass='$password'");
			if($row=mysqli_fetch_assoc($msql))
			{
				session_start();
				$_SESSION["mib"]=$row["member_id"];
			}
		}    	
	}

}

if(isset($_POST['login']))
{
	$logemail=$_POST['login_email'];
	$logpass=$_POST['login_pass'];
	
	$msql=mysqli_query($connect,"SELECT * from member where member_email='$logemail' and member_pass='$logpass'");

	if($row=mysqli_fetch_assoc($msql))
	{
		session_start();
        $_SESSION["mib"]=$row["member_id"];
		echo '<script>alert("Successfully Login")</script>';
		echo("<script>location.href='menumovie.php'</script>");
	}
	else
	echo '<script>alert("Account not recognized");</script>';
}
?>
