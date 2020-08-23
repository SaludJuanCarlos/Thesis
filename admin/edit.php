<?php
	chdir("..");
	require_once 'controllers/authController.php';
	  
 if(isset($_POST["accountid"]))  {  

      $output = '';  
     
		$result = $conn->query("SELECT accountid,email,firstname,middlename,lastname,phonenumber,address FROM User WHERE accountid= '".$_POST["accountid"]."'");
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '<pre>';
		}

		$output .= ' <table class="table1" border="none"> 
	  <form method="post" class="form form1" action="updateuser.php" autocomplete="off">
			'; 
      $row = $result->fetch_assoc();
           $output .= '
		<tr>
			<div class="input-group2">
				<td class="td"><label>Account id:</label></td>
				<td class="td"><input type="text" value="'.$row["accountid"].'" width="50px" name="accountid" class="form-control form-control-lg height" value="<?php echo $accountid; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Email: </label></td>
				<td class="td"><input type="text" value="'.$row["email"].'" name="email" class="form-control form-control-lg height" value="<?php echo $email; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>First Name: </label></td>
				<td class="td"><input type="text" value="'.$row["firstname"].'" name="fName" size="100" class="form-control form-control-lg height" value="<?php echo $fName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Middle Name: </label></td>
				<td class="td"><input type="text" value="'.$row["middlename"].'" name="mName" size="100" class="form-control form-control-lg height" value="<?php echo $mName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Last Name: </label></td>
				<td class="td"><input type="text" value="'.$row["lastname"].'" name="LName" size="100" class="form-control form-control-lg height" value="<?php echo $LName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Phone Number: </label></td>
				<td class="td"><input type="text" value="'.$row["phonenumber"].'" name="pNumber" size="100" class="form-control form-control-lg height" value="<?php echo $pNumber; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Address: </label></td>
				<td class="td"><input type="text" value="'.$row["address"].'" name="address" size="100" class="form-control form-control-lg height" value="<?php echo $address; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td><button type="submit" name="register" class="btn btn-primary btn-block btn-lg margin">Update User</button></td>
			</div>
			</tr>
               </form></table> ';   
      echo $output;  
 }  
 