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


<style>
.mytext{
    border:0;padding:10px;background:whitesmoke;
}
.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:whitesmoke;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#e0e0de;
    height:400px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    overflow:hidden;
    padding:0;
}
.frame > div:last-of-type{
    position:absolute;bottom:5px;width:100%;display:flex;
}
ul {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:32px;
    display:flex;
    flex-direction: column;

}
.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}   
</style>


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
                                

  <section class="main-panel text-center">
            <div class="make-center">
                <h2>TEACHER </h2>
             <!-- <input  type="text" ng-model="rId"> -->
             <button class="btn btn-primary" id="open-room">Start Room</button>
             <button class="btn btn-danger" id="close-room">Close Room</button>
             <button class="btn btn-danger" id="screen">Enable Screen</button>
             <!-- <button class="btn btn-danger" id="record">REC</button>
             <button class="btn btn-danger" id="stop-record">STOP REC</button> -->
             <!-- <button class="btn btn-success" onclick="replaceScreen()">Screen</button> -->
         
        
         <div class="row">
                <div class="col-md-6">
                <h2>LOCAL</h2>
                        <div id="local-container"></div>
                </div>
                <div class="col-md-6">
                <h2>REMOTE</h2>
                        <div id="remote-container"></div>
                </div>
                <div class="col-md-12">
                <h2>Recording</h2>
                        <div id="recording-container"></div>
                </div>
     </div>
          
     </section>

 



     <br><br><br>

                             
<?php include('footer.php')?>   


        <script src="assets/js/socket.io.js"></script>

        <!-- capture screen from any HTTPs domain! -->
        <script src="https://cdn.webrtc-experiment.com:443/getScreenId.js"></script>

        <!-- custom layout for HTML5 audio/video elements -->
        <script src="https://cdn.webrtc-experiment.com/getMediaElement.js"></script>

        <script src="assets/js/RTCMultiConnection.js"></script>
        <!-- <script src="assets/js/firebase.config.js"></script> -->

        <script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>

        <!-- CDN -->
<script src="https://cdn.webrtc-experiment.com/MediaStreamRecorder.js"> </script>



        <script>
   //Atrix Core RTVC 
  

   //JavaScript Elements calling 

   let videosContainer = document.getElementById('videos-container');
   let localContainer = document.getElementById('local-container');
   let remoteContainer = document.getElementById('remote-container');
   let screen = document.getElementById('screen').onclick = function(){
       replaceScreen();
   }
   let rec = document.getElementById('recording-container');
   //buttons
   let open = document.getElementById('open-room');
   let close = document.getElementById('close-room');



   
   document.getElementById('open-room').onclick = function() {
               // disableInputButtons();
               close.style.display = 'inline';
               open.style.display = 'none';
               
                connection.open('abc', function() {
                    onStream();
                });
            };

      close.style.display = 'none';

      
      //closing room
      close.onclick = function() {
               // disableInputButtons();

               
               location.reload();

         connection.getAllParticipants().forEach(function(participant) {
         connection.disconnectWith( participant );
           });
        };


        function toggle(id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
    
   //making a connection 
   let connection = new RTCMultiConnection();
   let recorder = new MRecordRTC();

recorder.mediaType = {
   audio: true, // or StereoAudioRecorder
   video: true, // or WhammyRecorder
   gif: true    // or GifRecorder
};


   //socket.io connection
   connection.socketURL = 'https://ec2-18-216-253-29.us-east-2.compute.amazonaws.com:9001/'; 
   connection.socketMessageEvent = 'video-conference-demo';

   //session setting
   connection.session = {
                audio: true,
                video: true
            };

   //one-to-one and userid
    connection.maxParticipantsAllowed = 1;
    connection.session.userid = 'teacher';

   //required constrainst
   connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: true,
                OfferToReceiveVideo: true
            };
            
  //screen constrianst setting
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


            let streamID;
                    // on-stream function
connection.onstream = function(event) {
                streamID = event.streamid;
                console.log('stream ID is :'+streamID);
               
                var mediaConstraints = {
    audio: true,
    video: true
};

navigator.getUserMedia(mediaConstraints, onMediaSuccess, onMediaError);

function onMediaSuccess(stream) {
    // var mediaRecorder = new MediaStreamRecorder(event.stream);
    // mediaRecorder.mimeType = 'video/webm';
    // mediaRecorder.ondataavailable = function (blob) {
    //     // POST/PUT "Blob" using FormData/XHR2
    //     var blobURL = URL.createObjectURL(blob);
    //     document.write('<a href="' + blobURL + '">' + blobURL + '</a>');
    // };
    // mediaRecorder.start(12000);
}

function onMediaError(e) {
    console.error('media error', e);
}
               // var width = parseInt(connection.videosContainer.clientWidth / 2) - 20;
                var mediaElement = getMediaElement(event.mediaElement, {
                    title: event.userid,
                    buttons: ['full-screen'],
                    width: '320px',
                    showOnMouseEnter: false
                });

                if(event.type === 'remote'){
                  //  connection.videosContainer.appendChild(mediaElement);
                  console.error('remote event')
                  remoteContainer.insertBefore(mediaElement, remoteContainer.firstChild);
            	}
            	if(event.type === 'local'){
                  //  connection.videosContainer.appendChild(mediaElement);
                    localContainer.insertBefore(mediaElement, localContainer.firstChild);
            	}
               // connection.videosContainer.appendChild(mediaElement);
                setTimeout(function() {
                    mediaElement.media.play();
                }, 5000);
                mediaElement.id = event.streamid;
            };
              
  
        // let endStream = function(){
        //     //on-stream ended


        //     connection.onstreamended = function(event) {
        //         var mediaElement = document.getElementById(event.streamid);
        //         if(mediaElement) {
        //             mediaElement.parentNode.removeChild(mediaElement);
        //         }
        //     };
        // }

      let replaceScreen = function(){
        connection.addStream({ screen: true, oneway: true });
        
}



  

        </script>


  