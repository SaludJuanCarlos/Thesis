   <link rel="stylesheet" href="../styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      
 <?php chdir("..");
	require_once 'controllers/authController.php';
	
	?>
      <div id="formContent1">	 
	  <div class="container1">
		<h2> Manage Consumers</h2>
	</div>
		<div class="form1">
	  <table class="table1" border="solid">
	 
	 <form action="updateuser.php">
		<caption style="margin-bottom:10px;"><strong>Choose an Area:</strong>
			<select name="Area">
				<option value="Area1">Area 1</option>
				<option value="Area2">Area 2</option>
				<option value="Area3">Area 3</option>
			</select>
		</form>
		</caption>
		<?php 
		$result = $conn->query("SELECT accountid,email,firstname,middlename,lastname,phonenumber,address FROM User");
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '<pre>';
		}
		?>
		
		<colgroup>
					<col style="width: 10%;" />
					<col style="width: 20%;" />
					<col style="width: 10%;" />
					<col style="width: 10%;" />
					<col style="width: 10%;" />
					<col style="width: 10%;" />
					<col style="width: 10%;" />
			</colgroup>
	  <th class="th">Account ID </th>
	  <th class="th">Name </th>
	  <th class="th">Total Reading </th>
	  <th class="th">Monthly Consumption </th>
	  <th class="th">Monthly Balance</th>
	  <th class="th">Remarks </th>
	  <th class="th"></th>
	  <?php 
		while ($row = $result->fetch_assoc()):
		?>
	  
	  <tr id="delete<?php echo $row['accountid'] ?>">
			<td class="td"><?php echo $row['accountid']; ?>
			<td class="td"><?php echo $row['firstname']. " " . $row['middlename'] . " " . $row['lastname']; ?></td>
			<td class="td"><?php echo "Total Reading"; ?>
			<td class="td"><?php echo "Monthly Consumption"; ?></td>
			<td class="td"><?php echo "Monthly Balance"; ?></td>
			<td class="td"><?php echo "Remarks"; ?></td>
			<td class="td"> <input type="button" value="Edit" name="view" id="<?php echo $row['accountid']; ?>" class="btn btn-info view_data">&nbsp;<input type="button" Value="Delete" id="<?php echo $row['accountid']; ?>" class="btn btn-danger delete" name="Delete"></td>
			
			<script>
			

			</script>
			
			
	  <tr>
	  <td class="td">  </td>
	  </tr>
	  <?php endwhile; ?>
	  </table>
	  
	  </div>
		</div>
		
		<div id="dataModal" class="modal fade">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Edit Consumer </h4>
		</div>	
			<div class="modal-body" id="editCons">
			<div class="content1" id="content1">
			</div>
		</div>
		<div class="modal-footer modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</div>
		</div>

	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="../admin.js"></script>
		
		
<script>
 //____________________________________EDIT____________________________________
 //____________________________________EDIT____________________________________
 //____________________________________EDIT____________________________________

 
  $(document).ready(function(){  
      $('.view_data').click(function(){  
           var accountid = $(this).attr("id");  
           $.ajax({  
                url:"edit.php",  
                method:"post",  
                data:{accountid:accountid},  
                success:function(data){  
                     $('#editCons').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
	  
 
 
 //____________________________________DELETE____________________________________
 //____________________________________DELETE____________________________________
 //____________________________________DELETE____________________________________

 
 
	  $('.delete').click(function(){ 
	  
       if(confirm("Are you sure you want to delete?")){
           var delete_id = $(this).attr("id");
         $.ajax({
              url:"deleteuser.php",
              method:"post",
              data:{delete_id:delete_id},
              success:function(data){
                   $('#delete'+delete_id).hide("slow");
				    alert("Delete Successful");
              }
         });
       } else {
		     alert("Cancelled");
	   }
	 });
 });
 

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementsByClassName("view")[0];

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closed")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>