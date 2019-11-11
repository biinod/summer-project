<!DOCTYPE html>
<?php
session_start();
if($_SESSION['email']=="")
{
header("location:adminlogin.php");
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/formcontrol.css">
</head>

<body>
<?php
$errjobtitle=$errjobdesc=$errnow=$errage=$errsalary=$errcontractperiod=$errworkdays=$errworkhour=$errqualification=$errcountry="";
$jobtitle=$jobdesc=$now=$age=$salary=$contractperiod=$workdays=$workhour=$qualification=$country="";
if(isset($_POST['submit']))
{
if(empty($_POST['jobtitle']))
{
$errjobtitle="Empty";
}
else
{
$jobtitle=$_POST['jobtitle'];
}

#validation for age
if(empty($_POST['age']))
{
$errage="Empty";
}
else
{
$age=$_POST['age'];
}

#validation for job description
if(empty($_POST['jobdescription']))
{
$errjobdesc="Empty";
}
else
{
$jobdesc=$_POST['jobdescription'];
}

#validation for No of workers
if(empty($_POST['now']))
{
$errnow="Empty";
}
else if(!preg_match("/^[0-9]+$/",$_POST['now']))
{
$errnow="In number only";
}
else
{
$now=$_POST['now'];
}

#validation for salary
if(empty($_POST['salary']))
{
$errsalary="Empty";
}
else
{
$salary=$_POST['salary'];
}

#validation for contract period
if(empty($_POST['contractperiod']))
{
$errcontractperiod="Empty";
}
else
{
$contractperiod=$_POST['contractperiod'];
}

#validation for working days
if(empty($_POST['workdays']))
{
$errworkdays="Empty";
}
else{
	$workdays=$_POST['workdays'];
}

#validation for working hour
if(empty($_POST['workhours']))
{
$errworkhour="Empty";
}
else{
	$workhour=$_POST['workhours'];
}

#validation for minimum qualification
if(empty($_POST['qualification']))
{
$errqualification="Empty";
}
else{
	$qualification=$_POST['qualification'];
}

#validation for minimum qualification
if(empty($_POST['country']))
{
$errcountry="Empty";
}
else{
	$country=$_POST['country'];
}
if($errjobtitle==""&&$errjobdesc==""&&$errnow==""&&$errage==""&&$errsalary==""&&$errcontractperiod==""&&$errworkdays==""&&$errworkhour==""&&$errqualification==""&&$errcountry=="")
{
$link=mysql_connect('localhost','root','');
if(!$link)
{
die('Not Connected'.mysql_error());
}
mysql_select_db('summer',$link);
$sql="INSERT INTO `jobvaccancies` (`id`, `job title`, `job description`, `no of worker`, `age`, `salary`, `contract period`, `working days`, `working hours`, `qualification`, `country`) VALUES (NULL, '$jobtitle', '$jobdesc', '$now', '$age', '$salary', '$contractperiod', '$workdays', '$workhour', '$qualification', '$country');";
if(mysql_query($sql,$link))
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
mysql_close($link);
}
}
?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">HELLO ADMIN</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="adminpage.php">Post Job Vaccancies</a></li>
                            <li role="presentation"><a href="viewUsers.php">View Users</a></li>
                            <li role="presentation"><a href="ViewFeedback.php">View Feedback</a></li>
                            <li role="presentation"><a href="ViewJobVaccancies.php">View Job Vaccancies</a></li>
                            <li role="presentation"><a href="signout.php">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-primary">Post Job Vaccancies</h2></div>
    </div>
    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <div class="form-group"><?php echo $errjobtitle?>
        <input class="form-control" type="text" name="jobtitle" placeholder="Job Title" value="<?php echo $jobtitle?>"></div>
        <div class="form-group"><?php echo $errjobdesc?>
        <textarea class="form-control" rows="5" cols="3" name="jobdescription" placeholder="Enter Job Description" value="<?php echo $jobdesc?>"></textarea></div>
        <div class="form-group"><?php echo $errnow?>
        <input class="form-control" type="text" name="now" placeholder="No of Workers" value="<?php echo $now?>"></div>
        <div class="form-group"><?php echo $errage?>
        <input class="form-control" type="text" name="age" placeholder="Age Range" value="<?php echo $age?>"></div>
        <div class="form-group"><?php echo $errsalary?>
        <input class="form-control" type="text" name="salary" placeholder="Salary" value="<?php echo $salary?>"></div>
        <div class="form-group"><?php echo $errcontractperiod?>
        <input class="form-control" type="text" name="contractperiod" placeholder="Contract Period" value="<?php echo $contractperiod?>"></div>
        <div class="form-group"><?php echo $errworkdays?>
        <input class="form-control" type="text" name="workdays" placeholder="Working Days" value="<?php echo $workdays?>"></div>
        <div class="form-group"><?php echo $errworkhour?>
        <input class="form-control" type="text" name="workhours" placeholder="Working Hours" value="<?php echo $workhour?>"></div>
        <div class="form-group"><?php echo $errqualification?>
        <input class="form-control" type="text" name="qualification" placeholder="Minimum Qualification" value="<?php echo $qualification?>"></div>
        <div class="form-group"><?php echo $errcountry?>
        <input class="form-control" type="text" name="country" placeholder="Country" value="<?php echo $country?>"></div>
        <div class="form-group text-center">
        <button class="btn btn-primary" type="submit" name="submit">Post Job</button></div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>