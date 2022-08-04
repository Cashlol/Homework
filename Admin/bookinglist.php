<?php include("connectionn.php");

session_start();
if(!isset($_SESSION["aid"]))
{
  echo"<script>alert('Please login again')</script>";
  echo("<script>location.href='adminlogin.php'</script>");
}
else{
?>


<!DOCTYPE html>
<html>
<head>
    <title>Booking List</title>
    <link rel="stylesheet" href="animate.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://kit.fontawesome.com/e2277e6a95.js" crossorigin="anonymous"></script>
<script type="text/javascript">

function confirmation(){
	
	var answer=confirm("Are you sure you want to delete?");
	return answer;
}

</script>

	
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
*{font-family:'Inter',sans-serif;box-sizing:border-box}    

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
        margin-left:200px;
        padding:0px 10px;
    }
    
#table{
    overflow:auto;
    height:540px;
    width:100%;
    margin-left:-40px;
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
margin: 0 auto;
border-radius:12px;
background-color:#ffffff;
}

th,td{padding:8px 16px;text-align:center;}

tr{
    color:#343a40;
    border-top:3px solid #f5f7fb;
}

input{
  display:inline-block;
  float:left;
  border:none;
  outline:none;
  border-radius:12px;
  padding:8px;
  width:30%;
  border: 1px solid #343a40;
  margin:10px;
  transform:translateX(20px);
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

body::-webkit-scrollbar{
    width:0.25rem; 
}

    body::-webkit-scrollbar-thumb{
    background:#1b1b1b;
    opacity:0.65;
    border-radius: 1.5px;
    }
    body::-webkit-scrollbar-track{
    background:white;
    opacity:0;
    }
    
body,html{
    height:100%;
    background-color:#f5f7fb;
    margin:0;
}

#pageHeader{
font-size:30px;
color:#343a40;
font-weight:bold;
display:block;
margin:0 auto;
width:96%;
padding-top:37px;
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
<div id="pageHeader">Booking List</div>
<?php
$result=mysqli_query($connect,"SELECT * from booking");
$count=mysqli_num_rows($result);?>
<div style="font-size:20px;color:black;display:block;margin:0 auto;width:96%;padding:20px 0px 20px 0px;font-weight:bold">Record Total : <?php echo $count;?></div>
<input type="text" id="input" onkeyup="search()" placeholder="Search Booking" title="Type a booking id">
<div id="table">
<table>
<thead>
    <tr>
        <th>Booking ID</th>
        <th>Member ID</th>
        <th>Movie ID</th>
        <th>Booking Date</th>
        <th>Booking Price</th>
        <th>Status</th>
    </tr> 
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($result)){?>

<tr>
    <td><?php echo $row['booking_id'];?></td>
    <td><?php echo $row['member_id'];?></td>
    <td><?php echo $row['mov_id'];?></td>
    <td><?php echo $row['booking_date'];?></td>
    <td><?php echo $row['booking_price'];?></td>
    <td><?php echo $row['booking_status'];?></td>
</tr>

<?php }?>
</tbody>
</table>

<script>
function search()
{
    var input,filter,table,tr,td,i,txtValue;
    
    input=document.getElementById("input");
    filter=input.value.toUpperCase();
    table=document.getElementById("table");
    tr=table.getElementsByTagName("tr");

    for(i=0;i<tr.length;i++)
    {
      td = tr[i].getElementsByTagName("td")[0];
      if(td)
      {
          txtValue=td.textContent || td.innerText;
          if(txtValue.toUpperCase().indexOf(filter)> -1)
          {
              tr[i].style.display="";
          }
          else{
              tr[i].style.display="none";
          }
      }
    }

}
</script>
</div>

</body>
</html>

<?php

if(isset($_REQUEST["movid"])) 
{
	$mid=$_REQUEST["movid"];
	
	mysqli_query($connect,"delete from movies where mov_id=$mid");
    echo("<script>location.href='movielist.php'</script>");
}
}
?>






