<?php include 'assets/headerIn.php' ?>


<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4 form-div login">
		
		
		<?php if (isset($_SESSION['message'])): ?> 
		<div class="alert <?php echo $_SESSION['alert-class']; ?>">
			<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
			unset($_SESSION['alert-class']);
			?>
		</div>
		<?php endif; ?>
		
		
			<?php if (isset($_SESSION['email'])): ?>
				<h3>Welcome <strong><?php echo ucfirst($_SESSION['fName']); ?></strong></h3>
				
				<p><a href="main.php?logout='1'" style="color: red;">Logout</a></p>
				
			<?php endif ?>

	<?php if(!$_SESSION['verified']):?>
		<div class = "alert alert-warning">
			You need to verify your account.
			Sign in to your email account and click on the verification link
			that was emailed to you at <strong><?php echo $_SESSION['email']; ?></strong>
		</div>
	<?php endif; ?>

	<?php if($_SESSION['verified']):?>
		<button class="btn btn-block btn-lg btn-primary">I am verified.</button>
	<?php endif; ?>
	
			</div>
		</div>
	</div>
<?php include('assets/footer.php');?>