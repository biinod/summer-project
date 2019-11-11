<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>summerproject</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style type="text/css">
        h4{
            color: black;
            font-weight: bold;
        }
        b{
            color: red;
        }
        .abc{
            margin:20px;
        }
    </style>
</head>

<body>
<?php
if(isset($_POST['submitFeedback']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['telephone'];
	$message=$_POST['message'];
	$link=mysql_connect('localhost','root','');
	if(!$link)
	{
		die('Not Connected'.mysql_error());
	}
	mysql_select_db('summer',$link);
	$sql="INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `message`) VALUES (NULL, '$name', '$email', '$mobile', '$message');";
	if(mysql_query($sql,$link))
	{
	echo"<script>
	alert('Feedback submitted successfully');
	</script>";
	}
	else{
 	echo "<script>
	alert('Something went wrong');
	</script>";
	}
	mysql_close($link);
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
            <div class="section-content">
                <h2 class="section-header" style="text-align: center;">Get in Touch with us</h2>
            </div>
            <div class="contact-section">
            <div class="container">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="col-md-6 form-line">
                        <div class="form-group">
                            <label for="exampleInputUsername">Your name</label>
                            <input type="text" class="form-control" name="name" required="" placeholder=" Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email Address</label>
                            <input type="email" class="form-control" name="email" required="" placeholder=" Enter Email id">
                        </div>  
                        <div class="form-group">
                            <label for="telephone">Mobile No.</label>
                            <input type="number" class="form-control" name="telephone" required="" placeholder=" Enter 10-digit mobile no.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for ="description"> Message</label>
                            <textarea  class="form-control" name="message"  required="" placeholder=" Enter Your Message"></textarea>
                        </div>
                        <div>

                            <input type="submit" class="btn btn-default" name="submitFeedback" value="Send Message">
                        </div>
                        <div class="abc">
                            <h4><u>Connect with us:</u></h4>
                            <p><b>Green Light Overseas Company (P.) LTD.</b><br>
                                Basundhara, Kathmandu, Nepal<br>
                                Tel: +977-1-4353044<br>
                                E-mail: info@green-lightgroups.com</p>
                        </div>
                    </div>
                </form>
            </div>
            </div>
  </div>
</form>
</div>
     <div class="row">
    <footer class="site-footer">
                <div class="col-sm-12">
                    <h3 class="text-center">© Copyright 2017</h3>
                    </div>
    </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>