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
    <!--
<form>
  <div class="form-group">
  <label>Blood Group</label><br>
        <input type="text" id="name" name="bg">
       <select id="name" name="bloodgroup" required>
            <option value="select">select</option>
           <option value="A+">A+</option>
           <option value="A-">A-</option>
           <option value="B+">B+</option>
           <option value="B-">B-</option>
           <option value="O+">O+</option>
           <option value="O-">O-</option>
           <option value="AB+">AB+</option>
           <option value="AB-">AB-</option>

       </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Volume</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group form-check">
  <label for="" class="control-label">Blood Component :</label><br>
			<select name="bloodcomponent" id="" class="custom-select select5" required>
      <option value=""></option>
				<option>whole Blood</option>
				<option>Red Cells</option>
				<option>Platelets</option>
				<option>Plasma</option>
				<option>Cryo</option>
				<option>White Cells & Granulocytes</option>
        </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>-->
<h3>Insert new Blood Stock</h3>

<div>
  <form action="" method="post">
    <label for="bloodtype">Blood type</label><br>
    <select id="name" name="bloodgroup" required>
            <option value="select">select</option>
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
    <input type="text" id="lname" name="volume" placeholder="Enter volume available"><br>

    <label for="bloodcomponent">Blood component</label><br>
    <select name="bloodcomponent" id="" class="custom-select select5" required><br>
      <option value="select">select</option>
				<option>whole Blood</option>
				<option>Red Cells</option>
				<option>Platelets</option>
				<option>Plasma</option>
				<option>Cryo</option>
				<option>White Cells & Granulocytes</option>
        </select>
   
   <input type="submit" name="insert" class="button" value="Submit"><br><br>
   
  </form>
  
</div>
<button style="margin-top : 10px; margin-left:47%; padding : 10px 20px 10px 20px; background-color:#eeeeee"><a href='bloodstock.php'>Back</a></button>

</body>
</html>
<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
if(array_key_exists('insert', $_POST))
{
    $bloodgroup=$_POST['bloodgroup']; 
    $volume=$_POST['volume']; 
    $bloodcomponent=$_POST['bloodcomponent'];  
$query="INSERT INTO bloodstock VALUES('','$bloodgroup','$volume','$bloodcomponent')";
$data = mysqli_query($conn,$query);
if($query)
{
    echo "<script>alert('Data inserted successfully!'); window.location='bloodstock.php';</script>";
}
}


?>