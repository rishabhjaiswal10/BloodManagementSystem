<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$id=$_GET['id'];
$query="SELECT * FROM bloodstock where stock_id='$id'";
$data = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS</title>
    <style>
        input[type=text], select {
 width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
 width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
h3{
    font-size:35px;
    text-align:center;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left:425px;
  width:30%;
  margin-top:70px;
}
        </style>
</head>
<body>
<h3>Update Blood Stock</h3>

<div>
  <form action="" method="post">
    <label for="bloodtype">Blood type</label><br>
    <select id="name" name="bloodgroup" required>
    <option value="<?php echo $row['bloodtype'];?>"hidden><?php echo $row['bloodtype'];?></option>
           <option value="A+">A+</option>
           <option value="A-">A-</option>
           <option value="B+">B+</option>
           <option value="B-">B-</option>
           <option value="O+">O+</option>
           <option value="O-">O-</option>
           <option value="AB+">AB+</option>
           <option value="AB-">AB-</option>

       </select><br>

    <label for="volume">Volume</label><br>
    <input type="text" id="lname" name="volume" value="<?php echo $row['volume'];?>" placeholder="<?php echo $row['volume'];?>"><br>

    <label for="bloodcomponent">Blood component</label><br>
    <select name="bloodcomponent" id="" class="custom-select select5" placeholder="<?php echo $row['component'];?>" required><br>
      <option value="<?php echo $row['component'];?>"hidden><?php echo $row['component'];?></option>
				<option>whole Blood</option>
				<option>Red Cells</option>
				<option>Platelets</option>
				<option>Plasma</option>
				<option>Cryo</option>
				<option>White Cells & Granulocytes</option>
        </select>
   
   <input type="submit" name="update" class="button" value="Submit">
  </form>
</div>
<button style="margin-top : 10px; margin-left:47%; padding : 10px 20px 10px 20px; background-color:#eeeeee"><a href='bloodstock.php'>Back</a></button>
</body>
</html>
<?php

if(array_key_exists('update', $_POST))
{
    $bloodgroup=$_POST['bloodgroup']; 
    $volume=$_POST['volume']; 
    $bloodcomponent=$_POST['bloodcomponent'];  
$query="update bloodstock set bloodtype='$bloodgroup',volume='$volume',component='$bloodcomponent' where stock_id='$id'";
$data = mysqli_query($conn,$query);
if($query)
{
  
  echo "<script>window.location='bloodstock.php';</script>";
}
}


?>