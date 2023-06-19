<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        td{text-align: center;}
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkBoxAll').click(function() {
                if ($(this).is(":checked"))
                    $('.chkCheckBoxId').prop('checked', true);
                else
                    $('.chkCheckBoxId').prop('checked', false);
            });
        });
    </script>

</head>

<?php 
$conn = new mysqli("localhost","root","","checkbox_delete");

$success_msg=null;

?>
<?php

if(isset($_POST['buttonDelete'])) {

        	// delete records
        if(isset($_POST['chk_id']))
        {
            $arr = $_POST['chk_id'];
            
                // if($_POST['option']=='trash')
                // {
                   
                //     foreach ($arr as $id) {
                //         @mysqli_query($conn,"UPDATE tl_enquiry SET published='0' WHERE id = " . $id);
                //     }
                    
                //     $success_msg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button> Product Move to Trash Successfully!</div>";                             					                             					    echo "<script> setTimeout(function () { window.location.href = 'product-list.php'; }, 2500); </script>";
                // }
                // else
                // {
                    
                    foreach ($arr as $id) {
                        @mysqli_query($conn,"DELETE FROM tl_enquiry WHERE id = " . $id);
                    }
                    $success_msg = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>×</button> Record Deleted Successfully.</div>";
                            					
                            					    echo "<script> setTimeout(function () { window.location.href = 'index.php'; }, 2500); </script>";
                //}
            
            
        }

}


?>
    <body>

		
								    	
								    <?php echo @$success_msg;?><br>
									<div class="table-responsive">
									   
									    <form method="post">
									        <div style="margin-bottom: 20px;">
                                            	<select name="option" required="" style="border-radius: 6px;background: #ddd;border: 2px solid #ddd;font-size: 15px;padding: 8px;">
                                            	    <option value="">Bulk Option</option>
                                            	    
                                            	    
                                            	    <option value="delete">Delete</option>
                                            	    
                                            	    
                                            	</select>
                                            	<input type="submit" name="buttonDelete" value="Apply" class="" style="border-radius: 5px;background: #ddd;border: 2px solid #ddd;font-size: 17px;padding: 8px;">
                                        	</div>
                                        	
										    <table id="responsive-data-table" class="table" border="1" style="width:100%">
											<thead>
												<tr>
												    <th><input type="checkbox" id="checkBoxAll" /></th>
												    <th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Mobile</th>
												</tr>
											</thead>

											<tbody>
                                                    <?php 
                                                            $i=0;
                                                            $category = $conn->query("SELECT * FROM tl_enquiry ORDER BY id DESC");
                                                                while($row = $category->fetch_assoc()){
                                                                    
                                                                    $i++;					    
                                                                
                                
                                                    ?> 
                                                        <tr>
                                                            
                                                            <td><input type="checkbox" class="chkCheckBoxId" value="<?= $row['id']?>" name="chk_id[]" /></td>
                                                            <td><?= $i; ?></td>
                                                        
                                                            <td><?= $row['name'];?></td>
                                                            <td><?= $row['email'];?></td>
                                                            <td><?= $row['mobile'];?></td>
                                                                                                                    
                                                        </tr>
				                                    <?php } ?>


											</tbody>
										</table>
										</form>
									</div>
								

      </body>
  </html>
