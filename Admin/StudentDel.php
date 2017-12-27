<?php
	session_start();
	if(!$_SESSION["ADMIN_PANEL"]){
	    echo "<script> window.location='index.php' </script>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Student</title>
</head>

<body>

<?php

//-----------------------------PATIENT DELETE CODING------------------------//

include("includes/DatabaseConfig.php");

if(isset($_GET['id']))
{
	
	
	$id =$_GET['id'];
	$delete = mysqli_query($con,"delete from userrecord where UserSno = '$id'");			
	$delete = mysqli_query($con,"delete from userlogin where Sno = '$id'");
	
	
	if($delete > 0)
	{
		echo "<script> alert('DELETED') </script>";
		
		echo "<script> window.location='StudentRecord.php' </script>";
		
		}
		
		else
		
		{
		echo "<script> alert('NOT DELETED') </script>";
		
		echo "<script> window.location='StudentRecord.php' </script>";
		
		}
		
	
	}

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>

</body>
</html>