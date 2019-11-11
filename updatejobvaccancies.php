<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'summer');
if(isset($_POST['change'])){
	$sql= "UPDATE jobvaccancies SET age='$_POST[age]',salary='$_POST[salary]',`job title`='$_POST[jobtitle]',`job description`='$_POST[jobdesc]',`no of worker`='$_POST[now]',`contract period`='$_POST[contractperiod]',`working hours`='$_POST[workhours]',`working days`='$_POST[workdays]',qualification='$_POST[qualification]',country='$_POST[country]' WHERE id='$_POST[id]'";
}
if(isset($_POST['delete'])){
	$sql= "DELETE FROM jobvaccancies WHERE id='$_POST[id]'";
}
if(mysqli_query($con,$sql))
{
header("refresh:1; url=ViewJobVaccancies.php");
}
else{
echo "Not update";
}
mysqli_close($con);
?>
