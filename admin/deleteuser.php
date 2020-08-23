<?php
	chdir("..");
	require_once 'controllers/authController.php';
	
	
  $id = $_POST['delete_id'];
  $query = mysqli_query($conn,"DELETE FROM User WHERE accountid='$id'");

	?>