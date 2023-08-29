   <?php
session_start();
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";
$conn = new mysqli($servername,$username,$password,$dbname);
$user=$_SESSION['user'];
$q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
$row=mysqli_fetch_assoc($q);
$id=$row['id'];
$que =mysqli_query($conn,"SELECT * FROM donors WHERE user_id='$id'");
$row2=mysqli_fetch_assoc($que);
$stat=$row2['status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:600&display=swap');
*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  
}
h4{
  font-family: 'Montserrat', sans-serif;
}
.sidebar{
  position: fixed;
  width: 240px;
  left: 0;//-240px;
  height: 100%;
  background: #ff8080;//#1e1e1e;
  transition: all .5s ease;
}
.sidebar header{
  font-size: 28px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #1b1b1b;
  user-select: none;
  font-family: 'Montserrat', sans-serif;
}
.sidebar a{
  display: block;
  height: 65px;
  width: 100%;
  color: white;
  line-height: 65px;
  padding-left: 30px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  border-left: 5px solid transparent;
  font-family: 'Open Sans', sans-serif;
  transition: all .5s ease;
}
a.active,a:hover{
  border-left: 5px solid #b93632;
  color: #b93632;
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: absolute;
  cursor: pointer;
  color: white;
  border-radius: 5px;
  border: 1px solid #262626;
  margin: 15px 30px;
  font-size: 29px;
  background: #262626;
  height: 45px;
  width: 45px;
  text-align: center;
  line-height: 45px;
  transition: all .5s ease;
}
label #cancel{
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  margin-left: 245px;
  opacity: 0;
  visibility: hidden;
}
#check:checked ~ label #cancel{
  margin-left: 245px;
  opacity: 1;
  visibility: visible;
}

@media(max-width : 860px){
  .sidebar{
    height: auto;
    width: 70px;
    left: 0;
    margin: 100px 0;
  }
  header,#btn,#cancel{
    display: none;
  }
  span{
    position: absolute;
    margin-left: 23px;
    opacity: 0;
    visibility: hidden;
  }
  .sidebar a{
    height: 60px;
  }
  .sidebar a i{
    margin-left: -10px;
  }
  a:hover {
    width: 200px;
    background: inherit;
  }
  .sidebar a:hover span{
    opacity: 1;
    visibility: visible;
  }
}
.form-control{
    width : 300px;
    height : 38px;
}
.btn{
    padding:5px;
    width:55px;
    height:30px;
    color:#d96459;
   // margin-left:120px;

}
.edit{
    color:#d96459;
}

        </style>
</head>
<body>
<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <a href="user_main.php" class="active">
        <i class="fas fa-user-alt"></i>
        <span>Profile</span>
      </a>
      <a href="user_update.php">
        <i class="fas fa-house-user"></i>
        <span>Update details</span>
      </a>
      <a href="user_donate.php">
        <i class="fas fa-burn"></i>
        <span>Donate blood</span>
      </a>
      <a href="user_request.php">
         <i class="fas fa-qrcode"></i>
        <span>Request blood</span>
      </a>
      <a href="check_status.php">
        <i class="fas fa-medkit"></i>
       <span>Check status</span>
     </a>
      <a href="login.html">
        <i class="fas fa-power-off"></i>
        <span>Logout</span>
      </a> 
    </div>
    <h1 style="margin-left:242px; margin-top:0px; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:0px; padding-bottom:19px; background-color:#1b1b1b;">Check status</h1><br>

<h2 style="font-size:25px; letter-spacing:1px; color:#5b5a5a; margin-top:50px; margin-left:300px; text-decoration:underline;">Blood request details<h2>
    
    <div class="filter">

    <table>
    <tr>
        <th>Sr.no</th>
        <th>Bloodtype</th>
        <th>bloodcomponent</th>
        <th>volume</th>
        <th>date</th>
        <th>status</th>
    </tr>
</div>
<style>
     /**{
        margin:0;
        padding:0;
        outline:0;
    }*/
    h1{
         text-align:center;
         margin-top:20px;
         color: black;//#f77e93;
    }
    .filter{
        //position:absolute;
        left:0;
        right:0;
        top:0;
        bottom:0;
        z-index:1;
        opacity: .7;
        //background: rgb(131,58,180);
//background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(229,11,11,1) 0%, rgba(251,176,171,1) 0%);
    }
    table{
        position:absolute;
        left:58%;
        top:40%;
        transform: translate(-50%,-50%);
        width:70%;
        border-collapse:collapse;
        border-spacing:1px;
        border-radius:5px 5px 0 0;
        overflow:hidden;
        box-shadow:0 12px 5px rgba(32,32,32,.3);
        background-color: white;
        text-align:centre;

    }
    tr:nth-child(odd){
        background:#eeeeee;
    }
    th{
        background: #F44336;
        color: #fafafa;
        text-transform: uppercase;
        font-size:20px;
    }
    th,td{
        padding:5px 5px;

    }
    td{
         text-align:center;
         font-size:20px;
    }
       


    </style>
<h2 style="font-size:25px;  letter-spacing:1px; margin-top:180px; margin-left:300px; text-decoration:underline;">Voluntary Donation status<h2>
<p style="font-size:25px; letter-spacing:1px; margin-top:10px; margin-left:300px; ">Status : 
<?php
if($stat=='pending')
{?>
    <p style="color:red; margin-left:32%; margin-top:-30px; font-size:25px;">Your request is pending</p>
    <?php
} 
if($stat=='accepted')
{?>
  <p style="color:green; margin-left:32%; margin-top:-30px; font-size:25px; ">Your request has been accepted. You can donate blood now!</p>
<?php
}
if($stat=='')
{?>
    <p style="color:#F44336; margin-left:32%; margin-top:-30px; font-size:25px; ">You haven't registered as a voluntary donor yet. Register Now!</p>
    <?php
} 
?></p>
<?php
$c=1;
$user=$_SESSION['user'];
$q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
$row=mysqli_fetch_assoc($q);
$id=$row['id'];
$query = "SELECT * FROM request_blood WHERE user_id='$id'"; 
$data=mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {?>
        <tr>
        <td> <?php $result['id']; echo $c++;?> </td>
        <td> <?php echo $result['bloodtype'];?> </td>
        <td> <?php echo $result['bloodcomponent'];?> </td>
        <td> <?php echo $result['volume(l)'];?> </td>
        <td> <?php echo $result['date'];?> </td>
        <td> <?php echo $result['status'];?> </td>
        </tr>
       <?php 
    }
}
else{
    ?>
    <p style="margin-left:50%; margin-top:-140px; font-size:25px;"><?php echo "No results Found";?></p>
    <?php
}
?>
</table>