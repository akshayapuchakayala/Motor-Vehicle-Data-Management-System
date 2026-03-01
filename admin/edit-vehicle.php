<?php
session_start();
//error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
 $vehid=$_GET['vehid'];
if(isset($_POST['submit'])){
 
$brandid = $_POST['brandid'];
$vehiclename = $_POST['vehiclename'];
$modelnumber = $_POST['modelnumber'];
$regnumber = $_POST['regnumber'];
$vehicletype = $_POST['vehicletype'];
$vehiclesubtype = $_POST['vehiclesubtype'];
$varient = $_POST['varient'];
$transmission = $_POST['transmission'];
$chasisnum = $_POST['chasisnum'];
$enginenumber = $_POST['enginenumber'];
$description = $_POST['description'];

$sql="update tblvehicle set BrandID=:brandid,VehicleName=:vehiclename,ModelNum=:modelnumber,RegNum=:regnumber,VehicleType=:vehicletype,VehcleSubtype=:vehiclesubtype,Varient=:varient,Transmission=:transmission,ChasisNumber=:chasisnum,EngineNumber=:enginenumber,Description=:description where ID=:vehid";
$query = $dbh -> prepare($sql);
$query->bindParam(':brandid',$brandid,PDO::PARAM_STR);
$query->bindParam(':vehiclename',$vehiclename,PDO::PARAM_STR);
$query->bindParam(':modelnumber',$modelnumber,PDO::PARAM_STR);
$query->bindParam(':regnumber',$regnumber,PDO::PARAM_STR);
$query->bindParam(':vehicletype',$vehicletype,PDO::PARAM_STR);
$query->bindParam(':vehiclesubtype',$vehiclesubtype,PDO::PARAM_STR);
$query->bindParam(':varient',$varient,PDO::PARAM_STR);
$query->bindParam(':transmission',$transmission,PDO::PARAM_STR);
$query->bindParam(':chasisnum',$chasisnum,PDO::PARAM_STR);
$query->bindParam(':enginenumber',$enginenumber,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':vehid',$vehid,PDO::PARAM_STR);
$lastInsertId=$query -> execute();
if($lastInsertId)
{

echo "<script>alert('vehicle detail has been updated successfully');</script>";
echo "<script>window.location.href ='manage-vehicle.php'</script>";
 }
else {

echo "<script>alert('Someting went wrong.');</script>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Motor Vehicle Data Management System  || Edit Vehicle</title>
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
        
        <div class="col-md-6">
          <div class="tile">
                 <h2 align="center">Edit Vehicle</h2>
              <hr />
          <!---Success Message--->  
     

           
            <div class="tile-body">
               <?php
                $sql="SELECT tblvehicle.*, tblbrand.id,tblbrand.BrandName FROM tblvehicle join tblbrand on tblbrand.id=tblvehicle.BrandID  where tblvehicle.ID=:vehid";
                $query= $dbh->prepare($sql);
                $query->bindParam(':vehid',$vehid, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                {
                ?>
         
                <form  method="post">
                <div class="form-group col-md-12">
                  <label class="control-label"> Brand Name</label>
                   <select class="form-control" name="brandid" required="true">
                    <option value="<?php  echo $result->id;?>"><?php  echo $result->BrandName;?></option>
                 <?php

$sql="SELECT * from  tblbrand";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <option value="<?php  echo $row->id;?>"><?php  echo $row->BrandName;?></option><?php $cnt=$cnt+1;}} ?>
                   
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Vehicle Name</label>
                  <input class="form-control" name="vehiclename" id="vehiclename" type="text" value="<?php  echo $result->VehicleName;?>" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Model Number</label>
                  <input class="form-control" name="modelnumber" id="modelnumber" type="text" value="<?php  echo $result->ModelNum;?>" required="true">
                </div>
                 <div class="form-group col-md-12">
                  <label class="control-label"> Registration Number</label>
                  <input class="form-control" name="regnumber" id="regnumber" type="text" value="<?php  echo $result->RegNum;?>" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Vehicle Type</label>
                  <select class="form-control" name="vehicletype" required="true">
                    <option value="<?php  echo $result->VehicleType;?>"><?php  echo $result->VehicleType;?></option>
                    <option value="Two Wheeler">Two Wheeler</option>
                    <option value="Three Wheeler">Three Wheeler</option>
                    <option value="Four Wheeler">Four Wheeler</option>
                    <option value="Six Wheeler">Six Wheeler</option>
                    <option value="Eight Wheeler">Eight Wheeler</option>
                    <option value="Ten Wheeler">Ten Wheeler</option>
                    <option value="Others">Others</option>
                  </select></div>
                  <div class="form-group col-md-12">
                  <label class="control-label"> Vehicle Subtype</label>
                  <input class="form-control" name="vehiclesubtype" id="vehiclesubtype" type="text" value="<?php  echo $result->VehcleSubtype;?>" required="true">
                </div>
                 <div class="form-group col-md-12">
                  <label class="control-label"> Varient</label>
                  <select class="form-control" name="varient" required="true">
                    <option value="<?php  echo $result->Varient;?>"><?php  echo $result->Varient;?></option>
                    <option value="CNG">CNG</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                    
                  </select></div>
                   <div class="form-group col-md-12">
                  <label class="control-label"> Transmission</label>
                  <select class="form-control" name="transmission" required="true">
                    <option value="<?php  echo $result->Transmission;?>"><?php  echo $result->Transmission;?></option>
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                   
                  </select></div>
                </div>
                   <div class="form-group col-md-12">
                  <label class="control-label"> Chasis Number</label>
                  <input class="form-control" name="chasisnum" id="chasisnum" type="text" value="<?php  echo $result->ChasisNumber;?>" required="true">
                </div>
                 <div class="form-group col-md-12">
                  <label class="control-label"> Engine Number</label>
                  <input class="form-control" name="enginenumber" id="enginenumber" type="text" value="<?php  echo $result->EngineNumber;?>" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Description</label>
                  <textarea class="form-control" name="description"  placeholder="Enter Description" required="true">"<?php  echo $result->Description;?></textarea>
                  
                </div>
               
                <div class="form-group col-md-4 align-self-end">
                
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value=" Update">
                </div>
              </form>
                <?php  $cnt=$cnt+1; } } ?>
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
  
  </body>
</html><?php } ?>