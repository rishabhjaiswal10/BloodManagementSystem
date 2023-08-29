<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";
$conn = new mysqli($servername,$username,$password,$dbname);
$qry="SELECT bloodtype, count(*) as number FROM bloodstock GROUP BY bloodtype";
$result= mysqli_query($conn,$qry);
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
  <title>BBMS</title>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <!-- <title>Responsive Sidebar Menu</title> -->
    <link rel="stylesheet" href="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript">
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['bloodtype', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["bloodtype"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Total Available Blood According to Blood Groups',  
                      is3D:true,  
                      pieHole: 0.0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>
           <style>
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
  background: #1e1e1e;
  transition: all .5s ease;
  margin-top: 0px;
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
</style>
  </head>
  <body>
    <div class="sidebar">
      <header>Menu</header>
      <a href="dashboard.php" class="active">
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>
      <a href="admin_donors.php">
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
    <h1 style="margin-left:242px;  color:white; font-family: 'Montserrat', sans-serif; font-size:28px; padding-top:15px; margin-top: 0px; 
padding-left:15px; padding-bottom:19px; background-color:#1b1b1b;">Dashboard</h1><br>
<div class=".col-lg-12">
			
<div id="wrapper">
<div id="page-wrapper">
    <div class="row">
        <div class=".col-lg-12">
            <h1 class="page-header">Admin Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                             
                        <!-- in order to count total donor's record -->
                                <?php include 'dashboardcounter.php';?> 

                            <!-- <div class="huge">26</div> -->
                            <div>Total Requests for Voluntary Donations</div>
                        </div>
                    </div>
                </div>
                
                <a href="admin_donors.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <i class="fa fa-heartbeat fa-5x"></i>
                            <!-- <i class="fa fa-heartbeat fa-5x"></i> -->
                        </div>
                        <div class="col-xs-9 text-right">
                            <!-- in order to count total donor's record -->
                            <?php include 'countblood.php';?>
                            <div>Available Blood Stock</div>
                        </div>
                    </div>
                </div>
                <a href="bloodstock.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bullhorn fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                        <?php include 'announcecount.php';?>
                            <div class="huge"> </div>
                            <div>Camps Announcement</div>
                        </div>
                    </div>
                </div>
                <a href="viewannouncement.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <i class="fas fa-tint fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                        <?php include 'countbloodrequests.php';?>
                            <div>Total Blood Requests</div>
                        </div>
                    </div>
                </div>
                <a href="admin_request.php">
                    <div class="panel-footer">
                        <span class="pull-left">Manage Blood Requests</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>	
				<div id="content">
					 
					  <div class="container-fluid">
						
						<div class="row-fluid">
						  
						  <div class="span12">
							
							<div id="piechart" style="width: 690px; height: 320px; margin-left:auto; margin-right:auto;"></div>  

						  </div>
						</div>
					  </div>
				</div>
			
				</div>

</body>
</html>
