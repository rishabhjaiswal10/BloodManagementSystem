<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
$id=$_GET['id'];
$query="SELECT * FROM camps where camp_id='$id'";
$data = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodstock</title>
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
  margin-top:30px;
}
        </style>
</head>
<body>
<h3 style="text-decoration:none;">Update Camp Details</h3>

<div>
  <form action="" method="post">
  <label for="date">Date</label><br>
    <input type="text" name="date" value="<?php echo $row['Date'];?>" placeholder="<?php echo $row['Date'];?>"><br>
    <label for="volume">Time</label><br>
    <input type="text" name="time" value="<?php echo $row['Time'];?>" placeholder="<?php echo $row['Time'];?>"><br>
    <label for="volume">Camp Name</label><br>
    <input type="text" name="cpname" value="<?php echo $row['Camp_Name'];?>" placeholder="<?php echo $row['Camp Name'];?>"><br>
    <label for="volume">Address</label><br>
    <input type="text"  name="address" value="<?php echo $row['Address'];?>" placeholder="<?php echo $row['Address'];?>"><br>
    <label>State</label>
    <select id="name" name="state" required>
    <label>District</label><br>
    <option value="<?php echo $row['State'];?>"hidden><?php echo $row['State'];?></option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>

       </select>
       <label>District</label><br>
                        <select id="name" name="loc">
                        <option value="<?php echo $row['District'];?>"hidden><?php echo $row['District'];?></option>
                            <option value="select">select</option>
                           <option value="Ahmednagar">Ahmednagar</option>
                           <option value="Akola">Akola</option>
                           <option value="Aurangabad">Aurangabad</option>
                           <option value="Bhandara">Bhandara</option>
                           <option value="Chandrapur">Chandrapur</option>
                           <option value="Dhule">Dhule</option>
                           <option value="Gadchiroli">Gadchiroli</option>
                           <option value="Gondia">Gondia</option>
                           <option value="Hingoli">Hingoli</option>
                           <option value="Jalgaon">Jalgaon</option>
                           <option value="Jalna">Jalna</option>
                           <option value="Kolhapur">Kolhapur</option>
                           <option value="Latur">Latur</option>
                           <option value="Mumbai">Mumbai</option>
                           <option value="Nandurbar">Nandurbar</option>
                           <option value="Nanded">Nanded</option>
                           <option value="Nagpur">Nagpur</option>
                           <option value="Nashik">Nashik</option>
                           <option value="Osmanabad">Osmanabad</option>
                           <option value="Parbhani">Parbhani</option>
                           <option value="Pune">Pune</option>
                           <option value="Raigad">Raigad</option>


                
                       </select>
    <label for="volume">Contact</label><br>
    <input type="text"  name="contact" value="<?php echo $row['Contact'];?>" placeholder="<?php echo $row['Contact'];?>"><br>
    <label for="bloodtype">Conducted By</label><br>
    <input type="text"  name="cond" value="<?php echo $row['Conducted_By'];?>" placeholder="<?php echo $row['Conducted By'];?>"><br>
    <label for="volume">Organised By</label><br>
    <input type="text"  name="org" value="<?php echo $row['Organised_By'];?>" placeholder="<?php echo $row['Organised By'];?>"><br>
   
   <input type="submit" name="update" class="button" value="Submit">
  </form>
</div>
<button style="margin-top : 10px; margin-left:47%; padding : 10px 20px 10px 20px; background-color:#eeeeee"><a href='admin_camps.php'>Back</a></button>
</body>
</html>
<?php

if(array_key_exists('update', $_POST))
{
    $date=$_POST['date']; 
    $time=$_POST['time']; 
    $cpname=$_POST['cpname'];  
    $add=$_POST['address'];  
    $state=$_POST['state'];  
    $loc=$_POST['loc'];  
    $contact=$_POST['contact'];  
    $cond=$_POST['cond'];  
    $org=$_POST['org']; 
 echo $cpname;
$query="update camps set Date='$date',Time='$time',Camp_Name='$cpname',Address='$add',State='$state',District='$loc',Contact='$contact',Conducted_By='$cond',Organised_By='$ord' where camp_id='$id'";
$data = mysqli_query($conn,$query);
if($data)
{
  
  echo "<script>alert('Data updated successfully'); window.location='admin_camps.php';</script>";
}
}


?>