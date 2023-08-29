


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

  <title>BBMS</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:600|Open+Sans:600&display=swap');
*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  
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
/*
label #btn,label #cancel{
  //position: absolute;
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
}*/
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
    margin: 0px 0;
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
.wrapper{
        //float : right;
        width : 500px;
        margin-top:0px;
        height: 500px;
        margin-left:250px;
        margin-top:10px;
    }
  img{
    width:150px;
    height:150px;
    margin-left:0px;
  }
  .content-table{
    border-collapse:collapse;
    width:100%;
    color:#d96459;
    font-family:monospace;
  }



    </style>
  </head>
  <body>
   
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
    <div class="container">
         <form action="" method="post">

</form>
<div class="wrapper" >
    <?php 

    session_start();
    $db=new mysqli("127.0.0.1:3308","root","","bloodbank");
    $user=$_SESSION['user'];
     $q=mysqli_query($db,"SELECT * FROM registration where email='$user'");
    
       ?>
       <div class="myprofile" "> 
       <h1 style="color:white; font-family: 'Montserrat', sans-serif; font-size:28px; background-color:#1b1b1b; 
       padding-left:20px; margin-left:0px; width:1000px; height:38px; padding-top:15px; padding-bottom:18px; margin-top:0px;  ">My Profile</h1></div><br>
       <?php
      $row=mysqli_fetch_assoc($q);
    
        echo "<div ><img class='img-circle profile-img' src='../img/profile.jpg'></div>";
        ?>
        <br>
        <div style=" color:#d96459;
    font-family:monospace; font-size:25px; margin-left:10px;"><b></b>
        <h2>
          <?php echo $row['firstname']; echo " "; echo $row['lastname']; ?>
</h2>

</div>
<div class='table' style="font-size:20px; margin-left:10px;">
<?php
echo "";
    echo "<table class='content-table'>";
      echo "<tr>";
        echo "<td>";
        echo "<h3>--------------</h3>";
          echo "<b>First Name: </b>"; 
        //echo "<h3>--------------</h3>";  
        echo "</td>";
        echo "<td>";
        echo "<h3>-----------------------</h3>";
          echo $row['firstname'];
        //echo "<h3>-----------------------</h3>";
        echo "</td>";
      echo "</tr>";

      echo "<tr>";
        echo "<td>";
        echo "<h3>--------------</h3>";
          echo "<b>Last Name: </b>"; 
          //echo "<h3>--------------</h3>"; 
        echo "</td>";
        echo "<td>";
        echo "<h3>-----------------------</h3>";
          echo $row['lastname'];
          //echo "<h3>-----------------------</h3>";
        echo "</td>";
      echo "</tr>";
      echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Email: </b>"; 
    //echo "<h3>--------------</h3>"; 
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['email'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Password: </b>";
    //echo "<h3>--------------</h3>";  
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['password'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Mobile: </b>";  
    //echo "<h3>--------------</h3>";
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['mobile'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Date of Birth: </b>"; 
    //echo "<h3>--------------</h3>"; 
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['DOB'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Gender: </b>";  
    //echo "<h3>--------------</h3>";
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['gender'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Address: </b>";  
    //echo "<h3>--------------</h3>";
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['address'];
    //echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    echo "";
    echo "<tr>";
    echo "<td>";
    echo "<h3>--------------</h3>";
    echo "<b>Blood group: </b>";  
    echo "<h3>--------------</h3>";
    echo "</td>";
    echo "<td>";
    echo "<h3>-----------------------</h3>";
    echo $row['bloodgroup'];
    echo "<h3>-----------------------</h3>";
    echo "</td>";
    echo "</tr>";
    
    
    echo "</table>";
    echo "";
  
?></div>

      


</div>
</body>
</html>
