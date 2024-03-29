<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="home.php" class="simple-text">
                    Admin Panel
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="home.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="home.php">
                            <i class="material-icons" aria-hidden="true">person</i>
                            <p>Teacher Record</p>
                        </a>
                    </li>
                    <li>
                        <a href="StudentRecord.php">
                            <i class="material-icons" aria-hidden="true">person</i>
                            <p>Student Record</p>
                        </a>
                    </li>
                    <li>
                        <a href="student_rtvc.php">
                            <i class="material-icons" aria-hidden="true">person</i>
                            <p>Student RTVC</p>
                        </a>
                    </li>
                    <li>
                        <a href="teacher_rtvc.php">
                            <i class="material-icons" aria-hidden="true">person</i>
                            <p>Teacher RTVC</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?logmeout=true">
                            <i class="material-icons" aria-hidden="true">person</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
