<?php
	session_start();
	if(!$_SESSION["ADMIN_PANEL"]){
	    echo "<script> window.location='index.php' </script>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

<title>Student Menu</title>
</head>

<body>
<div class="jumbotron">
  <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                             <div class="card-header" data-background-color="purple">
                            <h4 class="title">Student Information</h4>
                            <p class="category">↓FILL UP THE FIELDS ↓
                               
                            </p>
                        </div>    <div class="card-content">
                                
                                <table class="table">

<?php //------------------------------GETTING ID FROM PATIENT--------------------------------//



$sname = "";
$contact = "";
$email = "";
$age = "";
$country = "";
$gender = "";
$status = "";


include("includes/DatabaseConfig.php");

if(isset($_GET['id']))


{
	$id =$_GET['id'];
	$query = mysqli_query($con,"select * from userlogin where Sno = $id");
	$res = mysqli_fetch_array($query);
	$id = $res[5];
	$sname = $res[1];
	$contact = $res[3];
	$email = $res[2];
	$age = $res[6];
	$country = $res[4];
	$gender = $res[7];
	$status = $res[11];
				
}
		
		
		
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>	



<form method="post">
<table class="table">
<tr>
	<td>Student Name</td>
	<td> <input type="text" name="txtStudent" class="form-control" value="<?php echo $sname; ?>"  /></td>
</tr>
<tr>
	<td>Student Contact</td>
	<td> <input type="text" name="txtContact" class="form-control" value="<?php echo $contact; ?>" /></td>
</tr>
<tr>
<td>Select Gender </td>
<td><input type="radio" name="txtGender" value="Male"  /> Male
	 <input type="radio" name="txtGender" value="Female"  /> Female
     </td>
</tr>
<tr>
	<td>Student Email</td>
	<td> <input type="text" name="txtEmail" class="form-control" value="<?php echo $email; ?>" /></td>
</tr>
<tr>
	<td>Country</td>
	<td> <input type="text" name="txtCountry" class="form-control" value="<?php echo $country; ?>" /></td>
</tr>
<tr>
	<td>Age</td>
	<td> <input type="text" name="txtAge" class="form-control" value="<?php echo $age ; ?>" /></td>
</tr>
<tr>
	<td>Status</td>
	<td>
		<select class="form-control" name="txtstatus">
	        <option value="Nill">Select Status</option> 
	        <option value="Y">Y</option>
	        <option value="N">N</option>
	    </select>
	</td>
</tr>
<tr>
<td></td>
	<td colspan="5"><input type="submit" name="StudentEDIT" class="btn btn-success" value="EDIT" /></td>
</tr>
</table>
</form>

<?php
//------------------------------PATIENT EDIT BUTTON-------------------//

include("includes/DatabaseConfig.php");

if(isset($_POST['StudentEDIT']))

{
	$StudentName = $_POST['txtStudent'];
	$Contact = $_POST['txtContact'];
	$Email = $_POST['txtEmail'];
	$Gender = $_POST['txtGender'];
	$Country = $_POST['txtCountry'];
	$Age = $_POST['txtAge'];
	$status = $_POST['txtstatus'];
	
	$id =$_GET['id'];
	
	$query = mysqli_query($con,"update userlogin set name = '$StudentName', phoneno = '$Contact', Gender = '$Gender', email = '$Email',country = '$Country', Age = '$Age', status = '$status' where Sno = '$id'");
	
	if($query > 0)
	{
		echo "<script> alert('Student EDITED') </script>";
		
		echo "<script> window.location='StudentRecord.php' </script>";
		}
		
		else
		{
			echo "<script> alert('Pateint NOT EDIT') </script>";
			
			echo "<script> window.location='StudentEdit.php' </script>";
			
			}
	
	}

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//

?>

            <br />
     </div></table></div></div></div>
                </div>
           

</body>
</center>
</html>