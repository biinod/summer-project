<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'summer');
if(isset($_POST['download'])){
$sql= "SELECT * FROM user WHERE id='$_POST[id]'";
}

$q=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($q)){
	$file=$row['file'];
	header('content-Type: application/octent-stream');
	header('content-Disposition: attachment; filename="'.basename($file).'"');
	header('content-Lenght='.filesize($file));
	readfile($file);

}
?>