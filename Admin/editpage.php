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

<title>Admin Panel</title>
</head>

<body>
	<div class="jumbotron">
  <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                             <div class="card-header" data-background-color="purple">
                            <h4 class="title">Teacher Information</h4>
                            <p class="category">↓FILL UP THE FIELDS ↓
                               
                            </p>
                        </div>    <div class="card-content">
                                
                                <table class="table">



<?php //------------------------------ GETTING ID FROM DOCTOR--------------------------------//
$pname = "";
$contact = "";

include("includes/DatabaseConfig.php");

if(isset($_GET['id']))


{
	$id =$_GET['id'];
	$query = mysqli_query($con,"select * from teacherrecord where SerialNo = $id");
	$res = mysqli_fetch_array($query);
	$id = $res[0];
	$pname = $res[1];
	$contact = $res[3];
	$gender = $res[2];
	$skypeid = $res[4];
				
		}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>	


<form method="post" >
<table class="table">
<tr>
	<td>Teacher Name</td>
	<td> <input type="text" name="txtTeacherName" value="<?php  echo $pname ?>" class="form-control"  /></td>
</tr>


<tr>
	<td>Gender</td>
	<td> <input type="radio" name="txtGender" value="Male" />Male
    	 <input type="radio" name="txtGender" value="Female" />Female</td>
</tr>


<tr>
	<td>Contact</td>
	<td> <input type="text" name="txtContact" value="<?php echo $contact ?> " class="form-control"/></td>
</tr>
<tr>
	<td>Skype ID</td>
	<td> <input type="text" name="txtSkype" value="<?php echo $skypeid ?> " class="form-control"/></td>
</tr>
<tr>
	<td colspan="5" align="center"> <input type="submit" name="btnedit" value="Edit Details" class="btn btn-success" /></td>
</tr>
</form>


</form>
</table>

<?php

if(isset($_POST['btnedit']))

{
	$name = $_POST['txtTeacherName'];
	$Gender = $_POST['txtGender'];
	$Contact = $_POST['txtContact'];
	$skype = $_POST['txtSkype'];
	
	
	$id =$_GET['id'];
	
	$query = mysqli_query($con,"update teacherrecord set TeacherName = '$name', Gender = '$Gender', ContactNo = '$Contact', SkypeID = '$skype' where SerialNo = '$id'");
	if($query > 0)
	{
		echo "<script> alert('Edited') </script>";
		
		echo "<script> window.location='home.php' </script>";
		
		}
		
		else
		
		{
		echo "<script> alert('NOT Edited') </script>";
		
		echo "<script> window.location='editpage.php' </script>";
		
		}
	
	}

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>

     </div>
                </div>
           

</body>
</center>
</html>
