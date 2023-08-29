<html>
<head>
<title>SEARCH</title>
</head>
<body>
    <h1>Blood request details<h1>
    
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
         color:#f77e93;
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
    td{
         text-align:center;
    }
       


    </style>


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
$query = "SELECT * FROM request_blood WHERE user_id='$id'"; 
$data=mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['id']."</td>
        <td>".$result['bloodtype']."</td>
        <td>".$result['bloodcomponent']."</td>
        <td>".$result['volume(l)']."</td>
        <td>".$result['date']."</td>
        <td>".$result['status']."</td>
        </tr>
        ";
    }
}
?>
</table>
<button style="margin-top:400px; margin-left:50px; padding : 10px 20px 10px 20px; background-color:#eeeeee"><a href='user_request.php'>Back</a></button>
</body>
</html>  