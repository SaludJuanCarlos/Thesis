<?php include 'assets/header.php' ?>
<div  class="container-fluid text-center">
<H4> Base Charge is php130 Consumption 1 to 10 are automatically equal to the base charge. </H2>


<div class="col-md-4">
<form  method="POST">
  <label for="quantity">Consumption:</label>
  <input type="number" id="consumption" name="consumption" min="1" max="99999">
  <input type="submit" value="submit" name="submit">
</form>

</div>
<div class="col-md-4">

<?php
if(isset($_POST['submit'])) {
switch($_POST['consumption']){
	case $_POST['consumption'] < 10:
	$CTotal = $_POST['consumption'] = 130;
	echo "Base Charge: " . "130";
	echo "<br>";
	echo "Total Price " . $CTotal;	
	break;
	case $_POST['consumption'] > 10 && $_POST['consumption'] < 21:
	$CThresh = $_POST['consumption'] - 10;
	$CAuto = 130;	
	$CTotal = ($CThresh * 14) + $CAuto;
	echo "Consumption: " . $_POST['consumption'];
	echo "<br>";
	echo "Total Price " . $CTotal;		
	break;
	case $_POST['consumption'] > 20 &&  $_POST['consumption'] < 31:
	$CThresh = $_POST['consumption'] - 20;
	$CAuto = 130;	
	$CAuto2 = 140;	
	$CTotal = ($CThresh * 16) + $CAuto + $CAuto2;
	echo "Consumption: " . $_POST['consumption'];
	echo "<br>";
	echo "Total Price " . $CTotal;	
	break;
	case $_POST['consumption'] > 30:
	$CThresh = $_POST['consumption'] - 30;
	$CAuto = 130;	
	$CAuto2 = 140;
	$CAuto3 = 160;	
	$CTotal = ($CThresh * 17) + $CAuto + $CAuto2 + $CAuto3;
	echo "Consumption: " . $_POST['consumption'];
	echo "<br>";
	echo "Total Price " . $CTotal;		
	break;
	 default:
    echo "Maximum Limit Achieved";
}
}
?>
</div>
</div>
<?php include('assets/footer.php');?>