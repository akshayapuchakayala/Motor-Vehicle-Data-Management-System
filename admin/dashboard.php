<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Motor Vehicle Data Management System || Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
      <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
  <?php
$query=$dbh->prepare("SELECT id FROM tblbrand");
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$brandcnt=$query -> rowCount();
?>

        <div class="col-md-6 col-lg-6">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info"><a href="manage-brand.php">
              <h4>Listed Brand</h4>
              <p><b><?php echo $brandcnt;?></b></p></a>
            </div>
          </div>
        </div>





<?php
$sql=$dbh->prepare("SELECT ID FROM tblvehicle");
$sql-> execute();
$result = $sql -> fetchAll(PDO::FETCH_OBJ);
$listedvehicle=$sql -> rowCount();
?>
        <div class="col-md-6 col-lg-6">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-car fa-3x"></i>
            <div class="info">  <a href="manage-vehicle.php">
              <h4>Listed Vehicle</h4>
              <p><b><?php echo $listedvehicle;?></b></p>
            </a>
            </div>
          </div>
        </div>
      </div>




    </main>
    <!-- Essential javascripts for application to work-->
     <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript" src="../js/plugins/chart.js"></script>

  </body>
</html><?php } ?>