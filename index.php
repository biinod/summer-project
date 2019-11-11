<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summerproject</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style type="text/css">
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
        <div class="col-md-8 col-md-offset-0"><a href="assets/img/recruitment.jpg"><img class="img-responsive" src="assets/img/recruitment.jpg"></a>
            <p class="text-justify"> Welcome toGreen Light Overseas Pvt. Ltd.It is professional recruitment agency in the Kathmandu, Nepal.We have been at the forefront of the worldwide recruitment forover 15 years and were to achieve ISO9001 certification: a reflectionof our
                constant emphasis on quality and customer satisfaction.With our well-developed infrastructure and staff strength,we are able to assist you with all kinds of recruitment needsranging from junior professionals. <a href="aboutus.php">Read More</a></p>
        </div>
        <div class="col-md-4">
            <h3 class="text-center bg-info"> Current Requirements</h3>
            <form action="jobvaccancies.php" method="post">
            <?php
            $con=mysqli_connect('localhost','root','');
			mysqli_select_db($con,'summer');
			$sql="SELECT * FROM jobvaccancies ORDER BY id DESC";
			$records=mysqli_query($con,$sql);
			echo "<marquee direction=up behavior=scroll scrolldelay=150 onMouseOver=this.stop() onMouseOut=this.start() height=400px><ul>";
			while($row = mysqli_fetch_array($records))
			{
				echo "<li><input type=submit name=jobtitlesubmit value='".$row['job title']."'></li>";
			}
			echo "</ul></marquee>";
			mysqli_close($con);
            ?>
        </form>
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