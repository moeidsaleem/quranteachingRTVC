<?php 
    session_start();
    if(isset($_GET["logmeout"])){
        session_destroy();
        $_SESSION["ADMIN_PANEL"] = false;
        echo "<script>alert('LOG OUT SUCCESSFULLY');</script>";
        echo "<script> window.location='index.php' </script>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form method="post" class="form-login">
                    <h2>Admin Panel.</h2>
                    <input type="text" id="userName" name="txtUsername" class="form-control input-lg chat-input" placeholder="username" />
                    <br>
                    <input type="password" id="userPassword" name="txtPass" class="form-control input-lg chat-input" placeholder="password" />
                    <br>
                    <div class="wrapper">
                        <span class="group-btn">     
                            <button type="submit" name="btn" class="btn btn-primary btn-lg btn-width">login <i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <script src="assets/js/RTCMultiConnection.js"></script>
        <script src="assets/js/firebase.config.js"></script>

        <script>
         connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

            connection.socketMessageEvent = 'audio-plus-screen-sharing-demo';
            connection.session = {
                audio: 'two-way', // merely audio will be two-way, rest of the streams will be oneway
                video: true,
                oneway: true
                 };
            connection.sdpConstraints.mandotory = {
            	OfferToReceiveAudio:true,
            	OfferToReceiveVideo:true
            };
                 var local = document.getElementById('local-container');
                var remote = document.getElementById('remote-container');
                  
                    // Using getScreenId.js to capture screen from any domain
            // You do NOT need to deploy Chrome Extension YOUR-Self!!
            connection.getScreenConstraints = function(callback) {
                getScreenConstraints(function(error, screen_constraints) {
                    if (!error) {
                        screen_constraints = connection.modifyScreenConstraints(screen_constraints);
                        callback(error, screen_constraints);
                        return;
                    }
                    throw error;
                });
            };
            connection.onstream = function(event){
            	if(event.type === 'remote'){
            		remote.append(event.mediaElement);
            	}
            	if(event.type === 'local'){
            		local.append(event.mediaElement);
            	}
            
             
            }



let openRoom= function(){
    connection.open('abc');
    console.log('room started');
}

        </script>
        </body>
</html>

<?php

//----------------------------- ADMIN BUTTON-------------------------------//
if(isset($_POST['btn']))
{
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPass'];
    
    if($username == 'admin' && $password == 'admin')
    {
        $_SESSION["ADMIN_PANEL"] = "Admin";
        echo "<script> window.location='home.php' </script>";
    }   
    else
    {
        echo "<script> alert('INVALID') </script>";
        echo "<script> window.location='index.php' </script>";
    }
    
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX END XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
?>