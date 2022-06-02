<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<!-- Viewport-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<!-- SEO Meta Tags-->
	<meta name="keywords" content="quicky, chat, messenger, conversation, social, communication" />
	<meta name="description" content="Quicky is a Bootstrap based modern and fully responsive Messaging template to help build Messaging or Chat application fast and easy." />
	<meta name="subject" content="communication" />
	<meta name="copyright" content="frontendmatters" />
	<meta name="revised" content="Tuesday, November 10th, 2020, 08:00 am" />
	<title>Quicky - HTML Chat Template</title>
	<!-- Favicon and Touch Icons-->
	<link rel="apple-touch-icon" sizes="180x180" href="./assets/img/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon-16x16.png" />
	<link rel="shortcut icon" href="./assets/img/favicon.ico" />
	<meta name="msapplication-TileColor" content="#da532c" />
	<meta name="theme-color" content="#ffffff" />

	<link rel="stylesheet" href="./assets/css/inter.css" />
	<link rel="stylesheet" href="./assets/css/app.min.css" />
	<link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body class="authentication-page">
	<!-- Main Layout Start -->
	<div class="main-layout card-bg-1">
		<div class="container d-flex flex-column">
			<div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<h1 class="font-weight-bold">Sign up</h1>
					<p class="text-dark mb-3">
						We are Different, We Make You Different.
					</p>
					<form class="mb-3" id="signup_form" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
						<div id="error_text" style="display:none;" class="form-group alert-danger rounded">
							<p class="py-1 " id="error_msg">mnmnmnm</p>
						</div>
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" class="form-control form-control-md" name="name" id="name" placeholder="Enter your name" />
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email Address</label>
							<input type="email" class="form-control form-control-md" name="email" id="email" placeholder="Enter your email" />
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control form-control-md" name="password" id="password" placeholder="Enter your password" />
						</div>
						<div class="form-group">
							<input type="file" class="form-control form-control-md" name="image" id="image" />
						</div>
						<input class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold signup" id="signup_btn" name="submit" type="submit" value="Sign Up">
					</form>

					<p>Already have an account? <a class="font-weight-semibold" href="./signin.php">Sign in</a>.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Layout End -->
	<!-- Javascript Files -->
	<script src="./assets/js/signup.js"></script>
	<script src="./assets/js/jquery/jquery-3.5.0.min.js"></script>
	<script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="./assets/js/svg-inject/svg-inject.min.js"></script>
	<script src="./assets/js/modal-stepes/modal-steps.min.js"></script>
	<script src="./assets/js/app.js"></script>
</body>

</html>