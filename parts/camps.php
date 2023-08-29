<html>
<head>
<title>ACTIVE CAMPS</title>
</head>
<body>
<div class="content">
           <ul>
               <li id="bbms">B.B.M.S</li>
               <li><a href="../index.html">Home</a></li>
               <li><a href="register.html">Register</a></li>
               <li><a href="login.html">Login</a></li>
               <li><a href="aboutus.html">Contact us</a>
               </li>
            </ul>
     </div>


    <div class="filter">
    <table>
    <tr>
        <th>Sr.no</th>
        <th>Date</th>
        <th>Time</th>
        <th>Camp Name</th>
        <th>Address</th>
        <th>State</th>
        <th>District</th>
        <th>Contact</th>
        <th>Conducted By</th>
        <th>Organised By</th>
    </tr>
    </div>
<style>
     .content{
    text-decoration: none;
    width:100%;
    background: rgb(227,221,221);
    background: linear-gradient(0deg, rgba(227,221,221,1) 0%, rgba(245,163,163,1) 2%, rgba(251,83,83,1) 3%, rgba(251,117,100,1) 97%, rgba(196,196,200,1) 99%);
    float: right;
    position: fixed;
    top: 0px;
    left: 0px;
    height:50px;

}
.content ul li{

display:inline;
padding-right: 10px;
font-size:18px;
left:60px;

}

ul li a {
    color:white;
    text-decoration:none;
}
ul li a:hover{
color:black;
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
        left:50%;
        top:50%;
        transform: translate(-50%,-50%);
        width:95%;
        border-collapse:collapse;
        border-spacing:0;
        border-radius:12px 12px 0 0;
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
    }
    th,td{
        padding:5px 5px;

    }
   

    </style>


<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
if(isset($_POST["camps123"])){
    $district=$_POST['loc'];
    $state=$_POST['state'];
$query = "SELECT * FROM camps WHERE State='$state' AND District='$district'"; //WHERE State='$state'";
$data=mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

//$result = mysqli_fetch_assoc($data);
//echo $result['Sr.no']." ".$result['Bloodbank'];
$c=1;
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$c++."</td>
        <td>".$result['Date']."</td>
        <td>".$result['Time']."</td>
        <td>".$result['Camp_Name']."</td>
        <td>".$result['Address']."</td>
        <td>".$result['State']."</td>
        <td>".$result['District']."</td>
        <td>".$result['Contact']."</td>
        <td>".$result['Organised_By']."</td>
        <td>".$result['Conducted_By']."</td>
        </tr>
        ";
    }
}
else{
    ?>
    <h1 style="margin-top:400px; margin-left:45%;">No results found<h1>
        <?php
}
}
?>
</table>
</body>
</html>  