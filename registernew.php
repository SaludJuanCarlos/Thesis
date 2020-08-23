<?php require_once 'controllers/authController.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title> Registration </title>
	<?php include 'assets/header.php' ?>
</head>
<body>

			<div id="formContent">
			<div class="container1">
				<h2> Registration </h2>
			</div>
			<div class="form1">
			<table class="table" border="none">
			<form method="post" class="form form1" action="register.php" autocomplete="off" >
			<?php include 'errors.php' ?>
			<tr>
			<div class="input-group1">
				<td><label>Account id: </label></td>
				<td><input type="text" name="accountid" class="form-control form-control-lg" value="<?php echo $accountid; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Email: </label></td>
				<td><input type="text" name="email" class="form-control form-control-lg" value="<?php echo $email; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Password: </label></td>
				<td><input type="password" name="password" class="form-control form-control-lg"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Confirm Password: </label></td>
				<td><input type="password" name="passwordConf" class="form-control form-control-lg"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>First Name: </label></td>
				<td><input type="text" name="fName" class="form-control form-control-lg" value="<?php echo $fName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Middle Name: </label></td>
				<td><input type="text" name="mName" class="form-control form-control-lg" value="<?php echo $mName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Last Name: </label></td>
				<td><input type="text" name="LName" class="form-control form-control-lg" value="<?php echo $LName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Phone Number: </label></td>
				<td><input type="text" name="pNumber" class="form-control form-control-lg" value="<?php echo $pNumber; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group1">
				<td><label>Address: </label></td>
				<td><input type="text" name="address" class="form-control form-control-lg" value="<?php echo $address; ?>"></td>
			</div>
			</tr>
			</table>
			<div class="input-group1">
				<button type="submit" name="register" class="btn btn-primary btn-block btn-lg">Register</button>
			</div>
			<br>
			<p align="center">Already a member? <a href="login.php">Sign in</a></p>
			<br>
			</form>
		</div>
		</div>
<?php include('assets/footer.php');?>
