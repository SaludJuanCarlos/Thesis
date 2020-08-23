<?php
	
	session_start();

require 'config/db.php';
require_once 'emailController.php';

	$errors = array();
	$fName = "";
	$accountid = "";
	$mName = "";
	$LName = "";
	$pNumber = "";
	$email = "";
	$address = "";


	if (isset($_POST['register'])) {
		$accountid = $_POST['accountid'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConf = $_POST['passwordConf'];
		$fName = $_POST['fName'];
		$mName = $_POST['mName'];
		$LName = $_POST['LName'];
		$pNumber = $_POST['pNumber'];
		$address = $_POST['address'];
	
	if(empty($accountid)) {
		 $errors['accountid'] = "Meter ID required";
	 }
	 if (!is_numeric($accountid)) {
		 $errors['accountid'] = "Meter ID must be numeric";
	 }
	 if (strlen($accountid) > 6 || strlen($accountid) < 6) {
		 $errors['accountid'] = "Meter ID must have 6 numbers";
	 }
	 if(empty($email)) {
		 $errors['email'] = "Email required";
	 }
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 $errors['email'] = "Email address is invalid";
	 }
	 if(empty($password)) {
		 $errors['password'] = "Password required";
	 }
	 if ($password !== $passwordConf) {
		 $errors['password'] = "Passwords do not match"; 
	 }
	 if (strlen($password) < 8) {
		 $errors['password'] = "Password must be 8 characters or more"; 
	 }
	 if (!preg_match("#[0-9]+#", $password)) {
        $errors[] = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $password)) {
        $errors[] = "Password must include at least one letter!";
    }     
	 if(empty($fName)) {
		 $errors['fName'] = "First name required";
	 }
	 if(empty($mName)) {
		 $errors['mName'] = "Middle name required";
	 }
	 if(empty($LName)) {
		 $errors['LName'] = "Last name required";
	 }
	 if(empty($pNumber)) {
		 $errors['pNumber'] = "Phone number required";
	 }
	 if(!is_numeric($pNumber)) {
		 $errors['pNumber'] = "Invalid Phone number";
	 }
	 if (strlen($pNumber) < 7) {
		 $errors['pNumber'] = "Invalid Phone number"; 
	 }
	if(empty($address)) {
		 $errors['address'] = "Address required";
	 }
	
	$emailQuery = "SELECT * FROM User WHERE email = ? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();
	
	if($userCount > 0) {
		$errors['email'] = "Email already exists";
	}
	
	if(count($errors) === 0){
		$password = SHA1($password);
		$token = bin2hex(random_bytes(50));
		$verified = false;
		
		$sql = "INSERT INTO User (accountid, firstname, middlename, lastname, email, phonenumber, address, password, verified, token, role)
					values(?, ?, ?, ?, ?, ?, ?, ?, ? ,? , '1')";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('ssssssssbs', $accountid, $fName, $mName, $LName, $email, $pNumber, $address, $password, $verified, $token);
		
	if($stmt->execute()) {
		
		$user_id = $conn->insert_id;
		$_SESSION['id'] = $user_id;
		$_SESSION['accountid'] = $accountid;
		$_SESSION['fName'] = $fName;
		$_SESSION['email'] = $email;
		$_SESSION['verified'] = $verified;
		
		sendVerificationEmail($email, $token);
		
		$_SESSION['message'] = "You are now logged in!";
		$_SESSION['alert-class'] = "alert-success";
		header('location: main.php');
		exit();
		
	} else {
		$errors['db_error'] = "Database error: failed to register";
		}
	}
}

// _______________________LOGIN____________________________
// _______________________LOGIN____________________________
// _______________________LOGIN____________________________


	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
	
	 if(empty($email)) {
		 $errors['email'] = "Email or accountid required";
	 }
	 if(empty($password)) {
		 $errors['password'] = "Password required";
	 }
	 
	 if (count($errors) === 0 ) {
		
	 //$sql = "SELECT * FROM User join Consumer ON User.accountid = Consumer.accountid WHERE User.accountid = ? OR Consumer.email = ? LIMIT 1";
	 $sql = "SELECT * FROM User WHERE accountid = ? OR email = ? LIMIT 1";
	 $stmt = $conn->prepare($sql);
	 $stmt->bind_param('ss', $email, $email);
	 $stmt->execute();
	 $result = $stmt->get_result();
	 $user = $result->fetch_assoc();
	 
	 if (SHA1($password) === $user['password']) {
		 
		$_SESSION['id'] = $user['id'];
		$_SESSION['fName'] = $user['firstname'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['role'] = $user['role'];
		$_SESSION['accountid'] = $user['accountid'];
		$_SESSION['verified'] = $user['verified'];
		
		$_SESSION['message'] = "You are now logged in!";
		$_SESSION['alert-class'] = "alert-success";
		
		if ($_SESSION['role'] == 1) {
			header('location: main.php');
			exit();
		} else if($_SESSION['role'] == 2) {
			header('location: admin/index.php');
			exit();
		}
		
	 } else {
	 $errors['login_fail'] = "Incorrect Email or Password";
		}
		 
	 }
	 
	}
	
// _______________________LOGOUT____________________________
// _______________________LOGOUT____________________________
// _______________________LOGOUT____________________________


	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['id']);	
		unset($_SESSION['email']);	
		unset($_SESSION['fName']);	
		unset($_SESSION['verified']);	
		header('location: login.php');
		exit();
	}

	
//_________________________VERIFY USER TOKEN_________________________
//_________________________VERIFY USER TOKEN_________________________
//_________________________VERIFY USER TOKEN_________________________

function verifyUser($token){
	global $conn;
	$sql = "SELECT * FROM User WHERE token = '$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);
		$update_query = "UPDATE User SET verified = 1 WHERE token = '$token'";
		
		if(mysqli_query($conn, $update_query)){
			 
		$_SESSION['id'] = $user['id'];
		$_SESSION['fName'] = $user['firstname'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['verified'] = 1;
		
		$_SESSION['message'] = "Your email address was successfully verified!";
		$_SESSION['alert-class'] = "alert-success";
		header('location: main.php');
		exit();
		
		}
	} else {
		echo 'User not found';
	}
}



?>