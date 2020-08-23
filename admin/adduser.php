    <link rel="stylesheet" href="../styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      
 <?php chdir("..");
	require_once 'controllers/authController.php';?>
   
   <link rel="stylesheet" href="../styles.css">

	<div id="formContent1">
	<div class="container1">
		<h2> Add Consumer</h2>
	</div>
	<div class="form1">
	<table class="table1" border="none">
			<form method="post" class="form form1" action="adduser.php" autocomplete="off">
			
			 <colgroup>
					<col style="width: 20%;" />
					<col style="width: 80%;" />
			</colgroup>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Account id: </label></td>
				<td class="td"><input type="text" width="50px" name="accountid" class="form-control form-control-lg height" value="<?php echo $accountid; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Email: </label></td>
				<td class="td"><input type="text" name="email" class="form-control form-control-lg height" value="<?php echo $email; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Placeholder: </label></td>
				<td class="td"><input type="password" name="password" size="100" class="form-control form-control-lg height"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Placeholder: </label></td>
				<td class="td"><input type="password" name="passwordConf" size="100" class="form-control form-control-lg height"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>First Name: </label></td>
				<td class="td"><input type="text" name="fName" size="100" class="form-control form-control-lg height" value="<?php echo $fName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Middle Name: </label></td>
				<td class="td"><input type="text" name="mName" size="100" class="form-control form-control-lg height" value="<?php echo $mName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Last Name: </label></td>
				<td class="td"><input type="text" name="LName" size="100" class="form-control form-control-lg height" value="<?php echo $LName; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Phone Number: </label></td>
				<td class="td"><input type="text" name="pNumber" size="100" class="form-control form-control-lg height" value="<?php echo $pNumber; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td class="td"><label>Address: </label></td>
				<td class="td"><input type="text" name="address" size="100" class="form-control form-control-lg height" value="<?php echo $address; ?>"></td>
			</div>
			</tr>
			<tr>
			<div class="input-group2">
				<td><button type="submit" name="register" class="btn btn-primary btn-block btn-lg margin">Add User</button></td>
			</div>
			</tr>
			</form>
			</table>
			</div>
			</div>
