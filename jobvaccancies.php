<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summerproject</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style type="text/css">
        th {
    background-color: #4CAF50;
    color: white;
}
      table,tr {
    border-bottom: 1px solid #4CAF50;
    }
    input:hover{
        background-color: black;
    }
    </style>
</head>

<body>
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
<div class="col-md-12">
    <h2 class="text-center text-primary">Job Vaccancies</h2>
    </div>
    <div class="col-md-12">
    <?php
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'summer');
    ?>
    <table class="table"><tr>
    <th></th>
    <th>Job Title</th>
    <th>Job Description</th>
    <th>No. of Worker</th>
    <th>Age</th>
    <th>Salary</th>
    <th>Contract Period</th>
    <th>Working Days</th>
    <th>Working Hours</th>
    <th>Qualification</th>
    <th>Country</th>
    <th></th>
    </tr>
    <?php
    $records="";
    if(isset($_POST['jobtitlesubmit'])){
    $sql="SELECT * FROM `jobvaccancies` WHERE `jobvaccancies`.`job title` ='$_POST[jobtitlesubmit]'";
    $records=mysqli_query($con,$sql);
    }
    else{
        $sql="SELECT * FROM jobvaccancies ORDER BY id DESC";
    $records=mysqli_query($con,$sql);
    }
    while($row = mysqli_fetch_array($records))
    {
    echo "<form action=userform.php method=post>";
    echo "<td> <input type=hidden name=id value='".$row['id']."'> </td>";
    echo "<td>".$row['job title']."</td>";
    echo "<td>".$row['job description']."</td>";
    echo "<td>".$row['no of worker']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['salary']."</td>";
    echo "<td>".$row['contract period']."</td>";
    echo "<td>".$row['working days']."</td>";
    echo "<td>".$row['working hours']."</td>";
    echo "<td>".$row['qualification']."</td>";
    echo "<td>".$row['country']."</td>";
    echo "<td> <input type=submit name=submitjobapply value='Apply for the Job'></td>";
    echo "</tr>";
    echo "</form>";
    }
    ?>
    </table>
</div>
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