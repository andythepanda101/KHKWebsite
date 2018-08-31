<!DOCTYPE HTML>
<html>
	<head>
		<title>Submission</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Kappa Eta Kappa</a>
				<nav>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="generic.html" class="active">Submission</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
            <?php
              $errors = '';
              $myemail = 'tumax040@umn.edu';
              if(empty($_POST['name'])  || empty($_POST['email']) || !empty($_POST['honey'])){
                $errors .= "\n Error: all fields are required";
              }
              $name = $_POST['name'];
              $email_address = $_POST['email'];
              $message = $_POST['message'];

              // validate the email address with regex
              if (!filter_var($email_address, FILTER_VALIDATE_EMAIL))
                    {
                      $errors .= "\n Error: Invalid email address";
                    }

              if(empty($errors)) {
                $to = $myemail;
                $email_subject = "KHK Website Submission: $name";
                $email_body = "You have received a new message. ".
                " Here are the details:\n Name: $name \n ".
                "Email: $email_address\n Message \n $message";
                $headers = "From: $myemail\n";
                $headers .= "Reply-To: $email_address";
                $result = mail($to,$email_subject,$email_body,$headers);
                if($result){
                  echo "Your message was sent successfully";
                }
                else {
                  echo "Error: Your message could not be sent";
                }
              }
              else {
                echo $errors;
              }
            ?>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
