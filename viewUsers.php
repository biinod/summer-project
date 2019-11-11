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
     <style type="text/css">
        th {
    background-color: #4CAF50;
    color: white;
}
      table,tr {
    border-bottom: 1px solid #4CAF50;
    }
    </style>
</head>

<body>
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
    <h2 class="text-center text-primary">Job Vaccancies</h2>
    </div>
    <div class="col-md-12">
    <?php
    $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'summer');
    $sql="SELECT * FROM user ORDER BY id DESC";
    $records=mysqli_query($con,$sql);
    ?>
    <table class="table"><tr>
    <th></th>
    <th>Name</th>
    <th>Address</th>
    <th>Email</th>
    <th>Mobile No.</th>
    <th>Subject</th>
    <th>Message</th>
    <th>CV of users</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($records))
    {
    echo "<tr> <form action=download.php method=post>";
    echo "<td> <input type=hidden name=id value='".$row['id']."'> </td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['mobile']."</td>";
    echo "<td>".$row['subject']."</td>";
    echo "<td>".$row['message']."</td>";
    echo "<td> <input type=submit value=download name=download> </td>";
    echo "</form></tr>";
    }
    ?>
    </table>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>