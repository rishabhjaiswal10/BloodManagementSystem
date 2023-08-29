<html>
<head>
<!-- Bootstrap Core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../icofont/icofont.min.css">
<title>BBMS<title>
</head>
<body>
<div id="wrapper">
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class=".col-lg-12">
<h1 class="page-header">Announcement Detail</h1>
</div>
  </div>  
		<div class="row">
            <div class=".col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Total Records of announcement made
                    </div>
				<div class="panel-body">
            <div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<?php
$servername="127.0.0.1:3308";
$username="root";
$password="";
$dbname="bloodbank";
$conn = new mysqli($servername,$username,$password,$dbname);
						$qry="select * from camps";
						$result=mysqli_query($conn,$qry);
						echo"
						<thead>
							<tr>
							<th>#</th>
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
						</thead>";

						while($row=mysqli_fetch_array($result)){
						  echo"<tbody>
						  <tr>
						  <td>".$row['camp_id']."</td>
						  <td>".$row['Date']."</td>
						  <td>".$row['Time']."</td>
						  <td>".$row['Camp_Name']."</td>
						  <td>".$row['Address']."</td>
						  <td>".$row['State']."</td>
						  <td>".$row['District']."</td>
						  <td>".$row['Contact']."</td>
						  <td>".$row['Conducted_By']."</td>
						  <td>".$row['Organised_By']."</td>

						</tr>
						</tbody>";
						}

						?>
						</table>
									
				</div>
				</div>		
		</div>
		</div>	
		</div>	
		</div>
		</div>

</div>




  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>
<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>
</html>