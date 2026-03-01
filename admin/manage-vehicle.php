<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
if(isset($_REQUEST['del']))
{
$vid=intval($_GET['del']);
$sql = "delete from tblvehicle WHERE  ID=:vid";
$query = $dbh->prepare($sql);
$query-> bindParam(':vid',$vid, PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Record Delete successfully');</script>";
echo "<script>window.location.href='manage-vehicle.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive">
  
    <title>Motor Vehicle Data Management System || Manage Vehicle</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
 <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
     <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                    <h2 align="center"> Manage Vehicle</h2>
              <hr />
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Vehicle Name</th>
                     <th>Model Number</th>
                    <th>Registration Number</th>
                    <th>Vehicle Type</th>
                    <th>Vehicle Subtype</th>
                   <th>Action</th>
                  </tr>
                </thead>
              
                   <?php
                  $sql="SELECT * FROM tblvehicle";
                  $query= $dbh->prepare($sql);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>

                <tbody>
                  <tr>
<td><?php echo($cnt);?></td>
<td><?php echo htmlentities($result->VehicleName);?></td>
<td><?php echo htmlentities($result->ModelNum);?></td>
<td><?php echo htmlentities($result->RegNum);?></td>
<td><?php echo htmlentities($result->VehicleType);?></td>
<td><?php echo htmlentities($result->VehcleSubtype);?></td>
<td><a href="edit-vehicle.php?vehid=<?php echo htmlentities($result->ID);?>"><span class="btn btn-success">Edit</span> | <a href="manage-vehicle.php?del=<?php echo htmlentities($result->ID);?>"><span class="btn btn-danger">Delete</span></td>
                  </tr>
                 </tbody>
                 <?php  $cnt=$cnt+1; } } ?>
              </table>
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
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
   
  </body>
</html><?php } ?>