<?php 

include("connectionn.php");

if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$pass=$_POST['password'];
    $error=1;

	$sql=mysqli_query($connect,"SELECT * from admin where admin_name='$username' and admin_pass='$pass' ");
    $row=mysqli_num_rows($sql);
    $result=mysqli_fetch_assoc($sql);

    if(empty($row))
    {
    $error=0;
    $errorPassword="Account not recognized";
    }
	if($row>0 && $error!=0)
	{
		session_start();
        $_SESSION["aid"]=$result["admin_id"];
		echo '<script>alert("Successfully Login");</script>';
		echo("<script>location.href='Admin Dashboard.php'</script>");
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
    <title>Admin Login</title>
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

        <label>Admin<img src="admin.svg" height="120px" width="120px"></label>
        <input type="text" name="username" placeholder="Username" required>
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
        <a id="forgot" href="reset_pass_admin.php">Forgot Password</a>
        <a id="forgot" href="adminregister.php" style="transform:translateY(-20px)">Register</a>
        <button name="login" id="login">Login</button>
    </form>
</div>

</body>
</html>

