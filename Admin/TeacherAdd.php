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
<script>
var regName = /^[a-z A-Z]+$/;
var regCell = /^[0-9]{4}-[0-9]{7}$/;

var counter = 0;

function check()
{
	counter=0;
	var name = document.getElementById('txtDoctorName').value;
	var cell = document.getElementById('txtContact').value;
	validation(name,regName,"Enter Name","Invlaid Name","Valid Name");
	validation(cell,regCell,"Enter Cell","Invalid Cell","Valid Cell");
	
	if(counter<2)
	{
		return false;
	}
	else
	{
		return true;
	}
}



function validation(tocheck,reg,emp,error,correct)
{
			
	if(tocheck == "")
	{
		alert(emp);
	}
	else
	{
		if(!tocheck.match(reg))
		{
			alert(error);
		}
		else
		{
			alert(correct);
			counter++;
		}
	}
}
</script>

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


<form id="prospects_form" onsubmit="return check()" method="post"> <!-- action="#"  -->
<table class="table">
<tr>
	<td>Teacher Name</td>
	<td> <input type="text" name="txtTeacherName" class="form-control"/></td>
</tr>
<tr>
	<td>Gender</td>
	<td> <input type="radio" name="txtGender" value="Male" />Male
    	 <input type="radio" name="txtGender" value="Female" />Female</td>
</tr>

<tr>
	<td>Contact</td>
	<td> <input type="text" name="txtContact" class="form-control"/></td>
</tr>

<tr>
	<td>Skype ID</td>
	<td> <input type="text" name="Skypeid" class="form-control"/></td>
</tr>

<tr>
	<td colspan="5" align="center"> <input type="submit" name="TecADD" value="Teacher Add" class="btn btn-success"/></td>
</tr>




</table>
</form>

<?php

//------------------------------NEW DOCTOR ADDING-------------------//

include("includes/DatabaseConfig.php");

if(isset($_POST['TecADD']))

{
	$TeacherName = $_POST['txtTeacherName'];
	$Gender = $_POST['txtGender'];
	$Contact = $_POST['txtContact'];
	$SkypeID = $_POST['Skypeid'];
        echo $TeacherName.$Gender.$Contact.$SkypeID;

	
	$query = mysqli_query($con,"insert into teacherrecord(TeacherName, Gender, ContactNo, SkypeID) values('$TeacherName','$Gender','$Contact','$SkypeID')");
	
	if($query > 0)
	{
		echo "<script> alert('Teacher ADDED') </script>";
		
		echo "<script> window.location='home.php' </script>";
		}
		
		else
		{
			echo "<script> alert('Teacher NOT ADD') </script>";
			
			echo "<script> window.location='TeacherAdd.php' </script>";
			
			}
	
	}

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>

              <br />
<br />
<br /></table></div>
     </div>
                </div>
            </div>
           	