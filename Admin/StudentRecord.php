<?php
    session_start();
    if(!$_SESSION["ADMIN_PANEL"]){
        echo "<script> window.location='index.php' </script>";
    }
?>
<?php include('header.php');?>
<?php include('nav.php');?>
<?php include("includes/DatabaseConfig.php");
?>

           <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Student Menu</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-content">
                                
                                <table class="table">
                                		<tr>
                                        		<th>Student Id</th>
                                				<th>Student Name</th>
                                                <th>Contact</th>
                                                <th>Country</th>
                                                <th>Gender</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Status</th>
                                                <th>Options</th>        
                                        </tr>
                                                                 
                                        
                                        
                                        
                                          <?php 
											$select = mysqli_query($con,"select * from userlogin");
											while($fetch = mysqli_fetch_array($select))
											{	
												echo 
												"
													<tr>
														<td>$fetch[5]</td>
														<td>$fetch[1]</td>
														<td>$fetch[3]</td>
                                                        <td>$fetch[4]</td>
														<td>$fetch[7]</td>
														<td>$fetch[2]</td>
														<td>$fetch[6]</td>
														<td>$fetch[11]</td>
														<td><a href='StudentEdit.php?id=$fetch[5]'>  <i class='fa fa-pencil' style='font-size:20px;'></i></a>/  <a href='StudentDel.php?id=$fetch[5]'><i class='fa fa-trash' style='font-size:20px; color:red;'></i></a></td>
											</tr>";}
								?>
                                        <tr>
</tr>

  </table>
                                        
<?php include('footer.php')?>

   </div>
                            </div>
            </div></div>            </div>