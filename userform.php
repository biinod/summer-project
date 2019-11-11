<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summerproject</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/formcontrol.css">
</head>
<style type="text/css">
    .error{
        color: red;
    }
</style>
<body>
<?php
$errfile="";
    if(isset($_POST['submit']))
    {
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $mobile=$_POST['telephone'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    if(empty($_FILES['f']['name']))
    {
    $errfile="Need to upload CV";
    }
    if($errfile=="")
    {
    $link=mysql_connect('localhost','root','');
    if(!$link)
    {
        die('Not Connected'.mysql_error());
    }
    mysql_select_db('summer',$link);
    $fnm=$_FILES['f']['name'];
    $dst="assets/img/".$fnm;
    move_uploaded_file($_FILES['f']['tmp_name'],$dst);
    $query="INSERT INTO `user` (`id`, `name`, `address`, `email`, `mobile`, `subject`, `message`, `file`) VALUES (NULL, '$name', '$address', '$email', '$mobile', '$subject', '$message', '$dst');";
    if(mysql_query($query,$link))
    {
    echo"<script>
    alert('Registered successfully');
    </script>";
    }
    else{
    echo "<script>
    alert('Something went wrong');
    </script>";
    }
    }

}
?>
<?php
$sub="";
if(isset($_POST['submitjobapply']))
{
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'summer');
    $sql="SELECT * FROM jobvaccancies WHERE id='$_POST[id]'";
    $records=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($records);
    $sub=$row['job title'];
}
    ?>
    <div class="row">
        <div class="col-md-10">
            <h1> <strong>Green Light Overseas</strong></h1></div>
        <div class="col-md-2">
            <a href="adminlogin.php"><button class="btn btn-info" type="submit">Admin Login</button></a>
        </div>
    </div>
    <div class="col-md-12">
        <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header"><a href="#" class="navbar-brand navbar-link">Menu </a>
            <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"><a href="index.php">Home </a></li>
                <li role="presentation"><a href="jobvaccancies.php">Job Vaccancies</a></li>
                <li role="presentation"><a href="contactus.php">Contact Us</a></li>
                <li role="presentation"><a href="aboutus.php">About Us</a></li>
            </ul>
        </div>
    </div>
</nav>
</div>
<div class="row">
<h3 class="text-center text-primary">Apply for the job</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputUsername">Your name</label>
                            <input type="text" class="form-control" name="name" required="" placeholder=" Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" class="form-control" name="address" required="" placeholder=" Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email Address</label>
                            <input type="email" class="form-control" name="email" required="" placeholder=" Enter Email id">
                        </div>  
                        <div class="form-group">
                            <label for="telephone">Mobile No.</label>
                            <input type="number" class="form-control" name="telephone" required="" placeholder=" Enter 10-digit mobile no.">
                        </div>
                        <div class="form-group">
                            <label for="exampleSubject">Subject</label>
                            <input type="text" class="form-control" name="subject" value="<?php echo 'for post '.$sub?>" required="" placeholder=" Enter Subject">
                        </div>
                        <div class="form-group">
                            <label for ="description">Message</label>
                            <textarea  class="form-control" name="message"  required="" placeholder=" Enter Your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for ="biodata">Upload Your CV</label>
                            <input class="form-control" type="file" name="f"><span class="error"> <?php echo $errfile?></span>
                        </div>
                        <div class="form-group text-center">

                            <button class="btn btn-primary" type="submit" name="submit">Apply</button>
                        </div>
                        
                </form>
</div>
   <div class="row">
    <div class="col-sm-12">
        <footer class="site-footer">
                        <h3 class="text-center">© Copyright 2017</h3>
        </footer>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>