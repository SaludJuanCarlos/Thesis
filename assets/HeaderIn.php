<?php require_once 'controllers/authController.php';

	//verify usertoken
	if (isset($_GET['token'])){
		$token = $_GET['token'];
		verifyUser($token);
	}

	if (!isset($_SESSION['id'])) {
		header('location: login.php');
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Multi-Purpose Cardona Cooperative</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <script src="scrolling.js"></script>
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript">
     $(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ) ) {
        $(this).collapse('hide');
    }
    });
  </script>
  
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	 <div class="container-fluid">
		<a class="navbar-brand" href="index.php"><img src="img/logo.png" width=50px height=100%></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse"
			data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
				<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="">Bill Information</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="calculator.php">Calculator</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#payment">Payment</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#contact">Contact Us</a>
				</li>
				<li class="nav-item nav-link" style="color: black;">
				<?php if (isset($_SESSION['email'])): ?>
				<?php echo ucfirst($_SESSION['fName']); ?>	
				</li>
				<li class="nav-item">
				<a class="nav-link" href="main.php?logout='1'" style="color: red;">Logout</a>
				<?php endif ?>
				</li>
		</ul>
		</div>
	</div>
</nav>