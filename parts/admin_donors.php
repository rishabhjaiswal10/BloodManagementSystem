<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
  <title>BBMS</title>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Responsive Sidebar Menu</title> -->
    <link rel="stylesheet" href="admin_main.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
      
      .bstable{
        margin-left:270px;
      }
    table, td, th {  
  border: 1px solid #000000;
  text-align: left;
}
.bstable{
        margin-left:300px;
      }
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  padding: 15px;
}
.button {
  padding: 5px 5px;
  //margin-bottom:30px;
  font-size: 15px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 5px;
 // box-shadow: 0 9px #999;
  //margin-top:30px;
}
.button:hover {background-color: #3e8e41;}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
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
      <a href="dashboard.php" >
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>
      <a href="admin_donors.php" class="active">
        <i class="fas fa-house-user"></i>
        <span>Donor's list</span>
      </a>
      <a href="bloodstock.php">
        <i class="fas fa-stream"></i>
        <span>Blood stock</span>
      </a>
      <a href="admin_camps.php">
         <i class="fas fa-medkit"></i>
        <span>Camps</span>
      </a>
      <a href="admin_request.php">
        <i class="far fa-calendar-check"></i>
        <span>Blood requests</span>
      </a>

      <a href="login.html">
        <i class="fas fa-power-off"></i>
        <span>Logout</span>
      </a>
    </div>
<h1 style="margin-left:242px; width:120%; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Voluntary Donors</h1><br>

<div class="bstable">
<!--  <button onclick="window.location='admin_camps_insert.php'" class="button" name="insert">Add new camp</button>&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
-->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Age</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
      <th scope="col">Blood Bank</th>
      <th scope="col">Status</th>
      <th colspan=2>Action</th>

      
    </tr>
  </thead>
  <tbody>
    <?php
    session_start();
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$user=$_SESSION['user'];
$q=mysqli_query($conn,"SELECT * FROM registration where email='$user'");
$row1=mysqli_fetch_assoc($q);
$name=$row1['firstname']." ".$row1['lastname'];
$query="select * from donors";
$row = mysqli_query($conn,$query);
$total = mysqli_num_rows($row);
$c=1;
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($row))
    {  $donorid=$result['user_id'];
      $query1 = mysqli_query($conn,"SELECT * FROM registration where id='$donorid'");
      $result1=mysqli_fetch_assoc($query1);
      ?>
        <tr>
        <td> <?php $result['id']; echo $c++;?> </td>
        <td> <?php echo $result1['firstname']." ".$result1['lastname']?> </td>
        <td> <?php echo $result1['mobile'];?> </td>
        <td> <?php echo $result['age'];?> </td>
        <td> <?php echo $result['state'];?> </td>
        <td> <?php echo $result['district'];?> </td>
        <td> <?php echo $result['bloodbank'];?> </td>
        <?php if($result['status']=='pending')
        {?>
        <td style="color:red; font-weight:bold;"> <?php echo  $result['status'];?></td><?php
        }
        else 
        {?>
            <td style="color:green; font-weight:bold;"> <?php echo  $result['status'];?></td><?php
        }
        ?>
        <td><a href="donate_status.php?id=<?php echo $result['id'];?>"><button class='button'>Accept</button></a></td>
        
        </tr>
    <?php    
    }
}
else
{
  ?>
  <p>No results found</p>
  <?php
}




?>

    </tbody>
</div>
</body>
</html>
