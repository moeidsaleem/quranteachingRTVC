<?php
    session_start();
        if(!($_SESSION["ADMIN_PANEL"] === "Admin")){
            echo "<script> window.location='index.php' </script>";
        }
?>

<?php include('header.php');?>
<?php include('nav.php');
      include("includes/DatabaseConfig.php");
?>
   <!-- <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">-->  
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Teacher Menu</h4>
                                    <p class="category"> welcome</p>
                                </div>
                                <div class="card-content">
                                
                                <table class="table">
                                		<tr>
                                        		<th>Teacher Id</th>
                                				<th>Teacher Name</th>
                                                <th>Gender</th>
                                                <th>Teacher Contact</th>
                                                <th>Skype ID</th>
                                                <th>Update Or Delete</th>        
                                        </tr>
                                
                                <?php 
											$select = mysqli_query($con,"select * from teacherrecord");
											while($fetch = mysqli_fetch_array($select))
											{	
												echo 
												"
													<tr>
														<td>$fetch[0]</td>
														<td>$fetch[1]</td>
														<td>$fetch[2]</td>
														<td>$fetch[3]</td>
                                                        <td>$fetch[4]</td>
														<td><a href='editpage.php?id=$fetch[0]'>  <i class='fa fa-pencil' style='font-size:20px;'></i></a>   /  <a href='delpage.php?id=$fetch[0]'><i class='fa fa-trash' style='font-size:20px; color:red;'></i></a></td>
											</tr>";}
								?>
                                
                                
   
                                
<tr>
	
	<td colspan="5" align="center">
    <input type="submit" name="docbtn" value="Add New Teacher" onClick="document.getElementById('docadd').click()" class="btn btn-success" style="float:left	"/></td>
</tr>



  </table>      
  <a href="TeacherAdd.php" hidden="" id="docadd">hh</a>                     
                             
<?php include('footer.php')?>   