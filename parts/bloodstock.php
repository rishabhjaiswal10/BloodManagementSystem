<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Responsive Sidebar Menu</title> -->
    <title>BBMS</title>
    <link rel="stylesheet" href="admin_main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
      
      .bstable{
        margin-left:300px;
      }
    table, td, th {  
  border: 1px solid #000000;
  text-align: left;
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
      <a href="dashboard.php">
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>
      <a href="admin_donors.php">
        <i class="fas fa-house-user"></i>
        <span>Donor's list</span>
      </a>
      <a href="bloodstock.php" class="active">
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
<h1 style="margin-left:242px; color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Blood Stock</h1><br>

<div class="bstable">
  <button onclick="window.location='bs_insert.php'" class="button" name="bs_insert">Insert</button>&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
<?php
if(isset($_POST['bs_insert']))
{
  echo "<script> window.location='bs_insert.php';</script>";
}

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Blood type</th>
      <th scope="col">Volume</th>
      <th scope="col">Blood Component</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$query="select * from bloodstock";
$row = mysqli_query($conn,$query);
$total = mysqli_num_rows($row);
$c=1;
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($row))
    {?>
        <tr>
        <td> <?php $result['stock_id']; echo $c++;?> </td>
        <td> <?php echo $result['bloodtype'];?> </td>
        <td> <?php echo $result['volume'];?> </td>
        <td> <?php echo $result['component'];?> </td>
        <td><a href="bs_update.php?id=<?php echo $result['stock_id'];?>"><button class='button'>Update</button></a></td>
        <td><a href="bs_delete.php?id=<?php echo $result['stock_id'];?>"><button class='button'>Delete</button></a></td>
        
        </tr>
    <?php    
    }
}




?>

    </tbody>
</div>
</body>
</html>
