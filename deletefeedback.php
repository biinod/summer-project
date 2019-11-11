<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'summer');
if(isset($_POST['delete'])){
	$sql= "DELETE FROM feedback WHERE id='$_POST[id]'";
}
if(mysqli_query($con,$sql))
{
header("refresh:1; url=ViewFeedback.php");
}
else{
echo "Not update";
}
mysqli_close($con);
?>