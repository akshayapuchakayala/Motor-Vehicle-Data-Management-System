<?php 
error_reporting(0);
include  'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Motor Vehicle Data Management System|| Vehicle Report</title>
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
     

    <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
             <!---Success Message--->  
          
          <!---Error Message--->
                      <h3 class="tile-title">Vehicle Between Date Report</h3>
            <div class="tile-body">
              <form class="row" method="post">
               <div class="form-group col-md-6">
                  <label class="control-label">From Date</label>
                  <input class="form-control" type="date" name="fdate" id="fdate" placeholder="Enter From Date">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">To Date</label>
                  <input class="form-control" type="date" name="todate" id="todate" placeholder="Enter To Date">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php 
if(Isset($_POST['Submit'])){?>
<?php
 $fdate=$_POST['fdate'];
 $tdate=$_POST['todate'];
?>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <h2 align="center">Vehicle Report from <?php echo date("d-m-Y", strtotime($fdate)); ?> To  <?php echo date("d-m-Y", strtotime($tdate)); ?></h2>
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
                  $sql="SELECT * FROM tblvehicle
where date(CreationDate) between :fdate and :tdate";
                  $query= $dbh->prepare($sql);
                 $query->bindParam(':fdate',$fdate, PDO::PARAM_STR);
                 $query->bindParam(':tdate',$tdate, PDO::PARAM_STR);
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
                     <?php }} else{ ?>
                      
                       
                    
                      
                       <tr>
                         <th colspan="6" style="color:red">No record found</th>
                       </tr> <?php } ?>
                 
                </tbody>
                         </table>

            </div>
          </div>
        </div>
      </div>
      <?php }?>
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
  
  </body>
</html>