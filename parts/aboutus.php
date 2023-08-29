<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US</title>
    <link rel="stylesheet" href="aboutus.css"/>
    <style>
         body{
            background: rgb(170,210,222);
background: linear-gradient(0deg, rgba(170,210,222,1) 0%, rgba(233,245,247,1) 100%, rgba(192,68,68,1) 100%, rgba(192,221,240,1) 100%);
        }
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
ul a:hover{
color:black;
}
    </style>
</head>
<body>
    <div class="content">
        
     <!--   <p>Contents of the page:</p>-->

        <ul>
            <li id="bbms">B.B.M.S</li>
            <li><a href="../index.html">Home</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="login.html">Login</a></li>
           

        
                <li><a href="aboutus.php">Contact us</a>
                </li>
            
        </ul>
    </div>
    <div class="im">
        
    </div>
    <div class=about>
        <h1>Contact us</h1>
        <form id="ab" action="" method="post">
            <label>Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name"><br><br>
            <label>Email</label><br>
            <input type="text" id="name" name="email" placeholder="Enter your email address"><br><br>
            <label>Contact</label><br>
            <input type="text" id="name" name="contact" placeholder="Enter your mobile number"><br><br>
            <label>Contact me by </label>
            <input type="radio"  name="contmeby" value="email" id="em"><span id="em">Email</span>
            <input type="radio"  name="contmeby" value="phone" id="em"><span id="em">Phone</span><br><br>
            <label>Question regarding</label>
            <select id="name" name="question_reg"> 
                <option>blood donation</option>
                <option>blood request</option>
                <option>special scheme</option>
                <option>other</option>
            </select><br><br>
            <label>Message</label><br>
            <textarea name="message"> </textarea><br><br>
            <button id="send" name="send" type="submit">submit</button>

        </form>
    </div>
    
</body>
</html>
<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";

$conn = new mysqli($servername,$username,$password,$dbname);
if(isset($_POST['send']))
{



$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$contmeby=$_POST['contmeby'];
$question_reg=$_POST['question_reg'];
$message=$_POST['message'];
$query="INSERT INTO contact VALUES ('$name','$email','$contact','$contmeby','$question_reg','$message')";
if($query)
{
    echo "true";
}
$data = mysqli_query($conn,$query);
if($data)
{
    echo "<script> alert('Query Submitted'); window.location='../index.html'</script>";
}

}
?>
    