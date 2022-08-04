<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
    <title>Admin Register</title>
</head>

<style>

*{padding:0;margin: 0;box-sizing: border-box;font-family: 'Space Grotesk',sans-serif;overflow: hidden;}

body,html{
    background-color:#1b1b1b;
    min-height:100vh;
    margin:0;
}

body{
    display:flex;
    align-items:center;
    justify-content:center;
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
	width: 60%;
	height: 40px;
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


#col{
    margin: 0 auto;
    background-color: white;
    text-align: center;
    border-radius: 10px;
    height:600px;
    width:500px;
    overflow:hidden;
}

header{
    font-size: 5em;
    font-weight: bold;
    color:#1b1b1b;
    padding-top: 40px;
}

#forgot{
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
    text-decoration:none;
    color:#F50057;
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

</style>

<body>


<div id="col">
    <form method="post">

        <label>Register<img src="undraw_register.svg" height="120px" width="120px"></label>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <div class="error">
        <?php 
        if(!empty($errorPassword))
        {?>
        <p class="error-message"><i class="fa-solid fa-circle-exclamation"></i><?php echo $errorPassword;?></p>
        <?php
        }
        ?>
        </div>
        <a id="forgot" href="adminlogin.php" style="transform:translateY(-20px)">Login</a>
        <button name="register" id="register">Register</button>
    </form>
</div>

</body>
</html>

<?php 

include("connectionn.php");

if(isset($_POST['register']))
{
	$db=mysqli_connect("localhost","root","","movie");

	$email=$_POST['email'];
	$password=$_POST['password'];
	$user=$_POST['username'];

	$check=mysqli_query($connect,"SELECT * FROM admin WHERE admin_email='$email' ");

	if(mysqli_num_rows($check)>0)
	{
		echo '<script>alert("An account with this email already exist");</script>';
	}
	else
	{
		$sql="INSERT into admin(admin_name,admin_email,admin_pass)VALUES('$user','$email','$password')";
		if(mysqli_query($db,$sql))
		{
			echo '<script>alert("Successfully Registered");</script>';
			echo("<script>location.href='Admin Dashboard.php'</script>");
			
			$msql=mysqli_query($connect,"SELECT * from admin where admin_email='$email' and admin_pass='$password'");
			if($row=mysqli_fetch_assoc($msql))
			{
				session_start();
				$_SESSION["aid"]=$row["admin_id"];
			}
		}    	
	}

}

?>