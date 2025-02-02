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
	<link rel="shortcut icon" href="./../../favicon.ico" />
	<meta name="msapplication-TileColor" content="#da532c" />
	<meta name="theme-color" content="#ffffff" />

	<link rel="stylesheet" href="./assets/css/inter.css" />
	<link rel="stylesheet" href="./assets/css/app.min.css" />
</head>

<body class="authentication-page">


	<!-- Main Layout Start -->
	<div class="main-layout card-bg-1">
		<div class="container d-flex flex-column">
			<div class="row no-gutters text-center align-items-center justify-content-center min-vh-100">
				<div class="col-12 col-md-6 col-lg-5 col-xl-4">
					<h1 class="font-weight-bold">Sign in</h1>
					<p class="text-dark mb-3">
						We are Different, We Make You Different.
					</p>
					<form class="mb-3" method="POST" action="#" autocomplete="off" id="signin_form">
						<div id="error_text" style="display:none;" class="form-group alert-danger rounded">
							<p class="py-1 " id="error_msg"></p>
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email Address</label>
							<input name="email" type="email" class="form-control form-control-md" id="email" placeholder="Enter your email" />
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input name="password" type="password" class="form-control form-control-md" id="password" placeholder="Enter your password" />
						</div>
						<!-- <div class="form-group d-flex justify-content-between">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" checked="" id="checkbox-remember" />
								<label class="custom-control-label text-muted font-size-sm" for="checkbox-remember">Remember me</label>
							</div>
							<a class="font-size-sm" href="./reset-password.html">Reset password</a>
						</div> -->
						<button class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit" name="submit" id="signin_btn">
							Sign in
						</button>
					</form>

					<p>
						Don't have an account?
						<a class="font-weight-semibold" href="./signup.php">Sign up</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Layout End -->

	<!-- Javascript Files -->
	<script src="./assets/js/jquery/jquery-3.5.0.min.js"></script>
	<script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="./assets/js/svg-inject/svg-inject.min.js"></script>
	<script src="./assets/js/app.js"></script>
	<script src="./assets/js/signin.js"></script>
</body>

</html>