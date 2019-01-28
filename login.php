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
							ini_set('display_errors', 'on');

              $myemail = 'tumax040@umn.edu';
              $name = $_POST['name'];
              $title = $_POST['title'];
              $bn = $_POST['beta_number'];
              $year = $_POST['year'];
              $major = $_POST['major'];
              $chair = $_POST['chair'];
              $image = $_POST['image'];
							$whichImage = $_POST['whichImage'];
              $email = $_POST['email'];
							$errors = '';


							// Handle the image upload portion
							if (($whichImage == 'new') && count($_FILES['imageFile']['tmp_name']) > 0) {
								$image = $_FILES["imageFile"]["name"];
								$target_dir = "images/khkpics/";
								$target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
								$uploadOk = 1;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								// Check if image file is a actual image or fake image
								if(isset($_POST["submit"])) {
								    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
								    if($check !== false) {
								        $uploadOk = 1;
								    } else {
								        $errors .= "Error: File is not an image.\n";
								        $uploadOk = 0;
								    }
								}
								// Check file size
								if ($_FILES["imageFile"]["size"] > 500000) {
								    $errors .= "Error: your image file is too large.\n";
								    $uploadOk = 0;
								}
								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
								    $errors .= "Sorry, your photo was not uploaded due to a previous error.\n";
							  }
							  else {
									if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
											echo "The file ". basename( $_FILES["imageFile"]["name"]). " has been uploaded.\n";
									} else {
											print_r(error_get_last());
											$errors .= "Sorry, the server encountered an error uploading your file.\n";
									}
								}
							}


							// Handle the email portion
							if(empty($errors)) {
								$to = $myemail;
	              $email_subject = "KHK Website Request: $name";
	              $email_body = "You have received a new reqest:\n\n".
	              "{\n\"name\": \"$name\",\n".
	              "  \"title\": \"$title\",\n".
	              "  \"bn\": \"$bn\",\n".
	              "  \"year\": \"$year\",\n".
	              "  \"major\": \"$major\",\n".
	              "  \"chair\": \"$chair\",\n".
	              "  \"image\": \"$image\",\n".
	              "  \"email\": \"$email\"\n".
	              "},";
	              $headers = "From: $email\n";
	              $headers .= "Reply-To: $email";
	              $result = mail($to, $email_subject, $email_body, $headers);
	              if($result){
	                echo "Your request was sent successfully\n";
	              }
	              else {
	                echo "Error: Your message could not be sent due to a server error\n";
	              }
							}
							else {
								echo "\n\n" . $errors;
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
