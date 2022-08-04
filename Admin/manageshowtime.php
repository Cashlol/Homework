<?php


session_start();
if(!isset($_SESSION["aid"]))
{
  echo"<script>alert('Please login again')</script>";
  echo("<script>location.href='adminlogin.php'</script>");
}
else
{
include("connectionn.php");
$msql=mysqli_query($connect,"SELECT * from movies");
$bsql=mysqli_query($connect,"SELECT * from hall");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Showtime</title>
    <link rel="stylesheet" href="animate.css">
    <script type="text/javascript">
    function confirmation(){
	var answer=confirm("Are you sure you want to delete?");
	return answer;}
    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
*{font-family:'Inter',sans-serif;}    

#sidenav
   {
        background-color:#ffffff;
        width:200px;
        height:100%;
        position: fixed;
        z-index: 1;
        box-shadow:6px 1px 20px rgba(69, 65, 78, 0.1);
        top:0;
        left:0;
        border-right: 1px solid #eee;
        overflow-x:hidden;
    }
	
	#links
	{
		list-style:none;
		padding:0;
    margin:0;	
    align-items: center;	
	}

  #active{
    transition:0.3s ease;
    font-size: 25px;
    color:black;
    border-bottom: 1.5px solid #eee;
    padding:20px 20px 20px 15px;
    margin-bottom: 20px;
    font-family: 'Fredoka', sans-serif;
}

li i{font-size:16px;margin-right:10px;}

#active i{
    color:#007bff;
}

#active_link{
    border-left:#007bff 3px solid;
    color:#007bff;
}
	
	li a
	{
		display:block;
		color:#83848a;
		font-size:16px;
        font-weight:600;
		text-decoration:none;
		padding:15px 20px;
	}
	
  li a:hover
	{
	color:#3b7ddd;
  transition:0.3s ease;
	}
	
    #logout{
  color:red;
}

#logout:hover{
  text-decoration: underline;
}
	
	
    #main{
        margin-left:150px;
        padding:0px 10px;
    }

body,html{
    height:100%;
    margin:0;
    background-color:#f5f7fb;
    overflow-x:hidden;
}

#pageHeader{
font-size:30px;
color:#343a40;
font-weight:bold;
display:block;
margin:0 auto;
width:89%;
padding-top:37px;
}

form{
    width:89%;
    padding:20px;
    margin-left:-40px;
}

input,select{
  display:inline-block;
  float:left;
  border:none;
  outline:none;
  padding:5px;
  border: 1px solid #3b7ddd;
  margin:10px 0px 10px 0px;
}

input:focus,select:focus{
  outline:none;
}

label{
display:inline-block;
float:left;
margin:10px 5px 0px 0px;
clear:left;
width:250px;
text-align:right;
}

#submit{
    text-decoration:none;
    color:white;
    background-color:#3b7ddd;
    padding:9px 20px;
    display:inline-block;
    border-radius:20px;
    font-size:15px;
    transform:translateX(250px);
    font-weight:bold;
    clear:left;
    margin-bottom:20px;
    float:left;
    border:3px solid #3b7ddd;
}

#submit:hover{
    border:3px solid #3b7ddd;
    color:#3b7ddd;
    background-color:transparent;
    transition:0.1s ease-in-out;
}
    
#table{
overflow:auto;
height:300px;
width:100%;
border-radius:12px;
}

#table thead th{
    position:sticky;
    top:0;
    z-index:1;
    background-color:#ffffff;
    border-bottom:3px solid #f5f7fb;
    color:#343a40;
}

table
{  
border-collapse: collapse;
width: 90%;
box-shadow: 0 0 .875rem 0 rgba(33,37,41,.05);
border-radius:12px;
background-color:#ffffff;
margin: 0 auto;
}

th,td{padding:8px 16px;text-align:center;}

tr{
    color:#7e7b72;
    border-top:3px solid #f5f7fb;
}

tr:first-child th:first-child{
    border-top-left-radius:12px;
}

tr:first-child th:last-child{
    border-top-right-radius:12px;
}

tr:last-child td:first-child{
    border-bottom-left-radius:12px;
}

tr:last-child td:last-child{
    border-bottom-right-radius:12px;
}

#table::-webkit-scrollbar{
    width:0.25rem; 
}

    #table::-webkit-scrollbar-thumb{
    background:#1b1b1b;
    opacity:0.65;
    border-radius: 1.5px;
    }
    #table::-webkit-scrollbar-track{
    background:white;
    opacity:0;
    }


</style>

<body>

<div id="sidenav"></div>

<script>
$(function(){
  $("#sidenav").load("navigation.html");
});
</script>

<div id="main">
<div id="pageHeader">Showtime</div>
<?php date_default_timezone_set("Asia/Kuala_Lumpur");?>
<form name="addshowtime" method="post" enctype="multipart/form-data">

<label for="showdate">Date : </label>
<input type="date" name="showdate" id="showdate" min="<?php echo date('Y-m-d');?>" required>

<label for="showtime">Showtime : </label>
<input type="time" name="showtime" id="showtime" min="09:00" max="23:00" required>

<label for="showend">Show End : </label>
<input type="time" name="showend" id="showend" min="09:00" required>

<label for="movie">Movie : </label>
<select name="movie" id="movie">
<?php 
while($row_movie=mysqli_fetch_assoc($msql)){?>

<option value="<?php echo $row_movie['mov_id']?>"><?php echo $row_movie['mov_name']?></option>
<?php }?>
</select>

<label for="hall">Hall No :  </label>
<select name="hall" id="hall">
    <option value="1">Hall 1</option>
    <option value="2">Hall 2</option>
    <option value="3">Hall 3</option>
    <option value="4">Hall 4</option>
    <option value="5">Hall 5</option>
    <option value="6">Hall 6</option>
</select>

<button type="submit" name="upload" id="submit">Add<i class="fa-solid fa-plus" style="margin-left:5px"></i></button>

</form>

<div id="table">
<table>
<thead>
    <tr>
        <th>Hall</th>
        <th>ID</th>
        <th>Movie</th>
        <th>Show Start</th>
        <th>Show End</th>
        <th>Date</th>
        <th colspan="2">Action</th>
    </tr> 
</thead>
<tbody>
    
<?php $sql=mysqli_query($connect,"SELECT * FROM showtime JOIN hall ON showtime.hall_id=hall.hall_id JOIN movies ON movies.mov_id=showtime.mov_id"); 
while($row=mysqli_fetch_assoc($sql)){?>

<tr>
    <td><?php echo $row['hall_no']?></td>
    <td><?php echo $row['showtime_id']?></td>
    <td><?php echo $row['mov_name']?></td>
    <td><?php echo $row['show_start']?></td>
    <td><?php echo $row['show_end']?></td>
    <td><?php echo $row['show_date']?></td>
	<td><a href="manageshowtime.php?sid=<?php echo $row['showtime_id'];?>" onclick="return confirm('Are you sure you want to delete this ?')"><i class="fa-solid fa-delete-left" title="Delete" style="color:red"></i></a></td>
</tr>

<?php }?>
</tbody>
</table>
</div>

</div>
</body>
</html>

<?php

if(isset($_POST['upload']))
{   

	$db=mysqli_connect("localhost","root","","movie") or die("Couldn't connect to the server");

    $showtime=$_POST['showtime'];
    $showend=$_POST['showend'];
    $movie=$_POST['movie'];
    $hall=$_POST['hall'];
    $showdate=$_POST['showdate'];
    
    $check_exist=mysqli_query($connect,"SELECT * FROM showtime JOIN hall ON showtime.hall_id=hall.hall_id WHERE hall_no='$hall' AND show_start='$showtime' AND show_date='$showdate'  ");
    $check_dupe=mysqli_query($connect,"SELECT * FROM showtime JOIN hall ON showtime.hall_id=hall.hall_id WHERE hall_no='$hall' AND show_end='$showtime' AND show_date='$showdate' ");

    if(mysqli_num_rows($check_dupe)>0)
    {
        echo '<script>alert("This showtime collides with another showtime");</script>';
        exit;
    }

    if($showend<$showtime)
    {
        echo '<script>alert("What kind of timing is this. You cannot watch a movie backwards");</script>';
        exit;
    }
        
    if(mysqli_num_rows($check_exist)>0)
        echo '<script>alert("This showtime collides with another showtime");</script>';
    else
    {
        mysqli_query($connect,"INSERT INTO hall(hall_no)VALUES('$hall')");
        $hallid=mysqli_insert_id($connect);
        $sqladd1="INSERT INTO showtime(mov_id,show_start,show_end,hall_id,show_date)VALUES('$movie','$showtime','$showend','$hallid','$showdate')";
        if(mysqli_query($db,$sqladd1))
        {
            echo '<script>alert("Record Saved");</script>';
            echo("<script>location.href='manageshowtime.php'</script>");
        }   
    }
 
}

if(isset($_REQUEST["sid"]))
{
    $sid=$_REQUEST["sid"];

    mysqli_query($connect,"DELETE showtime,hall FROM showtime INNER JOIN hall WHERE showtime.hall_id=hall.hall_id AND showtime_id='$sid' ");
    echo("<script>location.href='manageshowtime.php'</script>");
}
}
?>








