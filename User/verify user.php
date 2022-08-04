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
		<form method="post">
		<label for="check" aria-hidden="true">Verify Your Account</label>
		<input type="text" id="username" name="username" placeholder="Username" required>

		<button name="reset_pass" id="reset_pass">NEXT</button>
		</form>		
	</div>
</body>
</html>

<?php
if(isset($_POST['reset_pass']))
{
	$email=$_POST['mail'];

    $query=mysqli_query($connect,"SELECT * FROM member WHERE member_email='$email' ");

    if (mysqli_num_rows($query)>0)
	{
		echo '<script>alert("User found")</script>';
		session_start();
		$_SESSION['check']=1;
		echo '<script>location.href="reset_pass.php"</script>';
	}
	else
	{
		echo '<script>alert("User not available")</script>';
	}

}
?>