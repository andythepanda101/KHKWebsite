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
						<li><a href="login.html" class="active">Members</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
            <?php
              $myemail = 'tumax040@umn.edu';
              $name = $_POST['name'];
              $title = $_POST['title'];
              $bn = $_POST['beta_number'];
              $year = $_POST['year'];
              $major = $_POST['major'];
              $chair = $_POST['chair'];
              $image = $_POST['image'];
              $email = $_POST['email'];

              $to = $myemail;
              $email_subject = "KHK Website Request: $name";
              $email_body = "You have received a new reqest:\n\n".
              "{\n\"name\": \"$name\",\n".
              "  \"title\": \"$title\",\n".
              "  \"bn\": \"$beta_number\",\n".
              "  \"year\": \"$year\",\n".
              "  \"major\": \"$major\",\n".
              "  \"chair\": \"$chair\",\n".
              "  \"image\": \"$image\",\n".
              "  \"email\": \"$email\"\n".
              "},";
              $headers = "From: $myemail\n";
              $headers .= "Reply-To: $myemail";
              $result = mail($to, $email_subject, $email_body, $headers);
              if($result){
                echo "Your request was sent successfully";
              }
              else {
                echo "Error: Your message could not be sent";
              }
            ?>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>Kappa Eta Kappa: Beta Chapter</li>
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
