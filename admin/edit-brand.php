<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
$bid=$_GET['bid'];
if(isset($_POST['submit'])){
$brandname = $_POST['brandname'];

$sql="update tblbrand set BrandName=:brandname where id=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':brandname',$brandname,PDO::PARAM_STR);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$lastInsertId=$query -> execute();
if($lastInsertId)
{

echo "<script>alert('Brand update Successfully');</script>";
 }
else {

echo "<script>alert('Brand not update Successfully.');</script>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Motor Vehicle Data Management System || Edit Brand</title>
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
                 <h2 align="center">Edit Brand</h2>
              <hr />
          <!---Success Message--->  
     

           
            <div class="tile-body">
               <?php
                  
                $sql="SELECT * FROM tblbrand  where id=:bid";


                $query= $dbh->prepare($sql);
                $query->bindParam(':bid',$bid, PDO::PARAM_STR);
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
                  <label class="control-label">Brand Name</label>
                  <input class="form-control" name="brandname" id="brandname" type="text" placeholder="Enter Add Department Name" value="<?php echo $result->BrandName;?>">
                </div>
                <div class="form-group col-md-4 align-self-end">
                
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value=" Submit">
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