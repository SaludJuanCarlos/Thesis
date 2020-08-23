<?php require_once 'controllers/authController.php' ?>
<?php include 'assets/header.php' ?>

		 <div id="formContent">
			<div class="container1">
				<h2> Login </h2>
			</div>
			<form method="post" class="form form1" action="login.php"  autocomplete="off">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Account id or Email Address: </label>
				<input type="text" name="email"value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<label>Password: </label>
				<input type="password" name="password">
				</div>
				<div class="input-group">
				<button type="submit" name="login" class="button btn">Login</button>
			</div>
			<p>Not a member? <a href="registeras.php">Sign Up</a></p>
</form>
</div>
<?php include('assets/footer.php');?>