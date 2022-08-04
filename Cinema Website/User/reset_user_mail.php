<?php include("connectionn.php");

if(isset($_POST['change']))
{
	$db=mysqli_connect("localhost","root","","movie");
    $error=1;
	$email=$_POST['email'];
	$new_uname=mysqli_real_escape_string($db,$_POST['new_uname']);
	$logpass=$_POST['login_pass'];
	$msql=mysqli_query($db,"SELECT * from member where member_email='$email' and member_pass='$logpass'");
	$row = mysqli_num_rows($msql);
	if(empty($row))
	{
	  $errorEmail= 'Oops! email or Password is wrong.';
	  $error=0;
	}

	if($row>0 && $error!=0)
	{
		mysqli_query($db,
		"UPDATE `member` SET `member_name`='".$new_uname."' 
		WHERE `member_email`='".$email."';"
		);
		echo '<script>alert("Successfully Updated Your New Username")</script>';
		echo("<script>location.href='userdashboard.php'</script>");
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Email</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
</head>
<style>
	i{margin-right:5px}
	.error-message{color:red;text-align: center;}
</style>
<body>
	<div class="main">  	
			<div>
				<form method="post">
					<label for="check" >Change Username</label>
					<input type="email" id="login_email" placeholder="Email" name="email" required="">
                    <input type="text" id="New_name" placeholder="New User Name" name="new_uname" required="">
					<input type="password" id="login_pass" placeholder="Password" name="login_pass" required="">
					<div class="error">
                    <?php 
                    if(!empty($errorEmail))
                    {?>
                    <p class="error-message" style=""><i class="fa-solid fa-circle-exclamation"></i><?php echo $errorEmail;?></p>
                    <?php
                    }
                    ?>
                    </div>
					<button name="change" id="change">Change</button>
				</form>
				
			</div>
	</div>
</body>
</html>

