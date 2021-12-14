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
							// helper debug function that'll print to console
							function debug_to_console($data) {
								$output = $data;
								if (is_array($output))
									$output = implode(',', $output);
							
								//echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
								// hidden HTML for logging to console
								echo "<div display='none'> 
										<script type='text/javascript'>
											console.log('$output');
										</script>
									</div>";
							}
							$myemail = 'chen6640@umn.edu';
							$ccemail = 'tumax040@umn.edu, simps422@umn.edu';
							$name = $_POST['name'];
							$title = $_POST['title'];
							$bn = $_POST['beta_number'];
							$year = $_POST['year'];
							$major = $_POST['major'];
							$chair = $_POST['chair'];
							$bio = $_POST['bio'];
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
	              				$email_subject = "KHK Website Change: $name";
								
								$email_body = "A change has been made to a members profile:\n\n".
								"{\n\"name\": \"$name\",\n".
								"  \"title\": \"$title\",\n".
								"  \"bn\": \"$bn\",\n".
								"  \"year\": \"$year\",\n".
								"  \"major\": \"$major\",\n".
								"  \"chair\": \"$chair\",\n".
								"  \"image\": \"$image\",\n".
								"  \"email\": \"$email\",\n".
								"  \"bio\": \"$bio\"\n".
								"},";
								
								/*$email_body = "Testing to see if message body is what is causing this headache";*/
								$headers = "From: $email\r\n";
								$headers .= "Reply-To: $email\r\n";
								$headers .= "Cc: $ccemail";
								$result = mail($to, $email_subject, $email_body, $headers);
								if($result){
									// print("mailed requests successful"); // debug
									//Try and auto update the json file for this person
									$jsonString = file_get_contents('members.json');
									$data = json_decode($jsonString, true);
									$members = $data['members'];
									$found = false;
									foreach ($members as $key => $entry) {
										if ($entry['email'] == $email) {
											debug_to_console("email found in members.json");
											$found = true;
											$data['members'][$key]['name'] = $name;
											$data['members'][$key]['title'] = $title;
											$data['members'][$key]['bn'] = $bn;
											$data['members'][$key]['year'] = $year;
											$data['members'][$key]['major'] = $major;
											$data['members'][$key]['chair'] = $chair;
											$data['members'][$key]['image'] = $image;
											$data['members'][$key]['bio'] = $bio;
										}
									}
									$newJsonString = json_encode($data);
									if ($found && false == file_put_contents('members.json', $newJsonString)) {
										print_r(error_get_last());
										echo "An internal error occured but a request was still sent\n";
										file_put_contents('members.json', $jsonString);
									}

									echo "Your request was sent successfully.\n\n
										----- IMPORTANT -----\n
										The website should be automatically updated to show your updated information.\n
										If your changes aren't present, please clear your browser's cookies/cache then reload the page.\n
										If they're still not visble, then let Andy know.\n"

	              				} 
								else {
	                				echo "Error: Your message could not be sent due to a server error\n";
	              				}
							} 
							else {
								echo "\n\n" . $errors;
							}
							// end PHP
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
