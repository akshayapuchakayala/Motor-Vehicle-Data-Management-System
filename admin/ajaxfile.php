
<?php
include  'include/config.php';
if(!empty($_POST["Department"])) 
{
$Department=$_POST["Department"];
$sql=$dbh->prepare("SELECT * FROM tblemployee WHERE department_name=:Department");
$sql->execute(array(':Department' => $Department));   
?>
<?php
while($row =$sql->fetch())
{
?>
<option value="<?php echo $row["EmpId"]; ?>"><?php echo $row["EmpId"]; ?>-<?php echo $row["fname"]; ?></option>
<?php
}
}
?>

