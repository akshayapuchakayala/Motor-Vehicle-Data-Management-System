<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{

if(isset($_POST['update']))
  {
$abtdetails=$_POST['aboutus'];
$pagetype="aboutus";
$sql="update  tblpage set PageDescription=:abtdetails where PageType=:pagetype";
$query = $dbh->prepare($sql);
$query->bindParam(':abtdetails',$abtdetails,PDO::PARAM_STR);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Success : About us details updated successfully');</script>";
echo "<script>window.location.href='about-us.php'</script>";
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Motor Vehicle Data Management System || About Us</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
                 <h2 align="center">Update About Us Page</h2>
              <hr />
          <!---Success Message--->  
     

           
            <div class="tile-body">
              <?php
$pagetype="aboutus";            
$sql = "SELECT * from tblpage where PageType=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ 
?>
              <form  method="post">
                <div class="form-group col-md-12">
                  <label class="control-label">Page Description</label>
               <textarea class="form-control" name="aboutus"  required rows="8"><?php echo htmlentities($row->PageDescription);?></textarea>
                </div>
                <div class="form-group col-md-4 align-self-end">
                
                  <input type="submit" name="update" id="update" class="btn btn-primary" value=" Update">
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