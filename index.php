<?php
session_start();
error_reporting(0);
require_once('admin/include/config.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Motor Vehicle Data Management System|| Home Page</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css1/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css1/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css1/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <strong style="color: white;font-size: 20px;">Motor Vehicle Data Management System</strong>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="admin/index.php">Admin</a>
                     </li>
                     
                  </ul>
              
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <div class="call_text_main">
         <div class="container">
             <?php
$pagetype="contactus";            
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
            <div class="call_taital">
               <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->PageDescription);?></span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->MobileNumber);?></span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15"><?php echo htmlentities($row->Email);?></span></a></div>
            </div><?php  $cnt=$cnt+1; } } ?>
         </div>
      </div>
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div id="banner_slider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                               
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                                 
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="banner_taital_main">
                              <h1 class="banner_taital">Vehicle Record <br><span style="color: #fe5b29;">For You</span></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available, but the majority</p>
                              <div class="btn_main">
                                
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                     </a>
                     <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                     </a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="banner_img"><img src="images/banner-img.png"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_2">
               <div class="row">
                  <div class="col-md-6"> 
                     <div class="image_iman"><img src="images/about-img.png" class="about_img"></div>
                  </div>
                  <div class="col-md-6"> 
                     <div class="about_taital_box">
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
                        <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                        <p class="about_text"><?php echo ($row->PageDescription);?> </p>
                        <?php  $cnt=$cnt+1; } } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <div class="search_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="search_taital">Search By VehicleName, RegNum, Model Number</h1>
               
                  <!-- select box section start -->
                  <div class="container">
                     <div class="select_box_section">
                        <div class="select_box_main">
                           <form method="post">
                           <div class="row">
                              <div class="col-md-8 select-outline">
                                   <input type="text"  name="searchinputdata" class="form-control" required="true" placeholder="Search By VehicleName, RegNum, Model Number">
                              </div>
                            
                             
                              <div class="col-md-4">
                                 <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                              </div>
                           </div></form>
                        </div>
                     </div>
                  </div>
                  <!-- select box section end -->
               </div>
            </div>
         </div>
      </div>
      <!-- gallery section start -->
      <div class="gallery_section layout_padding">
         <div class="container">
            <?php 
if(Isset($_POST['Submit'])){?>
<?php
$searchinput=$_POST['searchinputdata'];

?>
            <div class="row">
               <div class="col-md-12">
                  <h1 class="gallery_taital">Search Result against <?php echo $searchinput;?></h1>
               </div>
            </div>
            <div class="gallery_section_2">
                <?php
                  $sql="SELECT tblvehicle.*, tblbrand.id,tblbrand.BrandName FROM tblvehicle join tblbrand on tblbrand.id=tblvehicle.BrandID
where tblvehicle.VehicleName like '$searchinput' || tblvehicle.ModelNum like '$searchinput' || tblvehicle.RegNum like '$searchinput'";
                  $query= $dbh->prepare($sql);
                
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>
               <div class="row">
                 
                  <div class="col-md-120">
                     <div class="gallery_box">
                      
                        <h3 class="types_text"><?php echo htmlentities($result->VehicleName);?></h3>
                          <p>Brand Name: <?php echo htmlentities($result->BrandName);?></p>
                          <p>Model Number: <?php echo htmlentities($result->ModelNum);?></p>
                          <p>Registration Number: <?php echo htmlentities($result->RegNum);?></p>
                          <p>Vehicle Type: <?php echo htmlentities($result->VehicleType);?></p>
                          <p>Vehcle Subtype: <?php echo htmlentities($result->VehcleSubtype);?></p>
                          <p>Varient: <?php echo htmlentities($result->Varient);?></p>
                          <p>Transmission: <?php echo htmlentities($result->Transmission);?></p>
                          <p>Chasis Number: <?php echo htmlentities($result->ChasisNumber);?></p>
                          <p>Engine Number: <?php echo htmlentities($result->EngineNumber);?></p>
                        <div class="looking_text"><?php echo htmlentities($result->Description);?></div>
                     </div>
                  </div>
               </div>
               <?php }} else{ ?>
                  <p style="color:red">No record found</p><?php } ?>
            </div>
            
          <?php }?></div>
      </div>
      <!-- gallery section end -->
     
    
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <p class="copyright_text">Vehicle Records System</p>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js1/jquery.min.js"></script>
      <script src="js1/popper.min.js"></script>
      <script src="js1/bootstrap.bundle.min.js"></script>
      <script src="js1/jquery-3.0.0.min.js"></script>
      <script src="js1/plugin.js"></script>
      <!-- sidebar -->
      <script src="js1/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js1/custom.js"></script>
   </body>
</html>