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
    height:0px;
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
                                    <h4 class="title">student Menu</h4>
                                    <p class="category"> welcome</p>
                                </div>
                                <div class="card-content">
                                

  <section class="main-panel text-center">
            <div class="make-center">
                <h2>student </h2>
             <!-- <input  type="text" ng-model="rId"> -->
             <button class="btn btn-primary" id="join-room">join Room</button>
             <button class="btn btn-danger" id="close-room">Close Room</button>
         
        
         <div class="row">
                <!-- <div class="col-md-6">
                <h2>LOCAL</h2>
                        <div id="local-container"></div>
                </div> -->
                <div class="col-md-12">
                <h2>REMOTE</h2>
                        <div id="remote-container"></div>
                </div>
               
     </div>
          
     </section>

 
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<hr>
<?php 
include('footer.php')
?>   



        <script src="assets/js/socket.io.js"></script>

        <!-- capture screen from any HTTPs domain! -->
        <script src="https://cdn.webrtc-experiment.com:443/getScreenId.js"></script>

        <!-- custom layout for HTML5 audio/video elements -->
        <script src="https://cdn.webrtc-experiment.com/getMediaElement.js"></script>

        <script src="assets/js/RTCMultiConnection.js"></script>
        <!-- <script src="assets/js/firebase.config.js"></script> -->

        <script>
   //Atrix Core RTVC 
  

   //JavaScript Elements calling 

   let videosContainer = document.getElementById('videos-container');
   let localContainer = document.getElementById('local-container');
   let remoteContainer = document.getElementById('remote-container');
   
//    document.getElementById('open-room').onclick = function() {
//                // disableInputButtons();
//                 connection.open('abc', function() {
//                     onStream();
//                    // showRoomURL(connection.sessionid);
//                 });
//             };

       
   //buttons
   let open = document.getElementById('join-room');
   let close = document.getElementById('close-room');

   close.style.display = 'none';

   document.getElementById('join-room').onclick = function() {
               // disableInputButtons();
               close.style.display = 'inline';
               open.style.display = 'none';
               connection.session.userid = 'student';
                connection.join('abc', function() {
            
                    onStream();
                   // showRoomURL(connection.sessionid);
                });
            };
    


          close.onclick = function() {
               // disableInputButtons();
         connection.getAllParticipants().forEach(function(participant) {
         connection.disconnectWith( participant );
         location.reload();

                      });
            };
    
   //making a connection 
   let connection = new RTCMultiConnection();

   //socket.io connection
   connection.socketURL = 'https://ec2-13-229-128-0.ap-southeast-1.compute.amazonaws.com:9001/'; 
   connection.socketMessageEvent = 'video-conference-demo';

   //session setting
   connection.session = {
                audio: true,
                // screen: true,
                video:true,
                //oneway:true
            };

   //one-to-one and userid
    connection.maxParticipantsAllowed = 1;

   //required constrainst
   connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: true,
                OfferToReceiveVideo: true
            };
            
  
                    // on-stream function
            connection.onstream = function(event) {

               // var width = parseInt(connection.videosContainer.clientWidth / 2) - 20;
                var mediaElement = getMediaElement(event.mediaElement, {
                  //  width: (remoteContainer.clientWidth / 2) - 50,
                    buttons: ['mute-audio', 'mute-video', 'record-audio', 'record-video', 'full-screen', 'volume-slider', 'stop', 'take-snapshot'],
                    toggle: event.type == 'local' ? ['mute-audio'] : [],
                    onMuted: function(type) {
                        // www.RTCMultiConnection.org/docs/mute/
                        console.log('mute me');
                        connection.streams[event.streamid].mute({
                            audio: type == 'audio', 
                           // video: type == 'video'
                        });
                    },
                    onUnMuted: function(type) {
                        // www.RTCMultiConnection.org/docs/unmute/
                        connection.streams[event.streamid].unmute({
                            audio: type == 'audio',
                            video: type == 'video'
                        });
                    },
                    onRecordingStarted: function(type) {
                        // www.RTCMultiConnection.org/docs/startRecording/
                        connection.streams[event.streamid].startRecording({
                            audio: type == 'audio',
                            video: type == 'video'
                        });
                    },
                    onRecordingStopped: function(type) {
                        // www.RTCMultiConnection.org/docs/stopRecording/
                        connection.streams[event.streamid].stopRecording(function(blob) {
                            if (blob.audio) connection.saveToDisk(blob.audio);
                            else if (blob.video) connection.saveToDisk(blob.audio);
                            else connection.saveToDisk(blob);
                        }, type);
                    },
                    onStopped: function() {
                        rtcMultiConnection.peers[event.userid].drop();
                    },
                    onTakeSnapshot: function() {
                        if (!event.stream.getVideoTracks().length) return;
            
                        // www.RTCMultiConnection.org/docs/takeSnapshot/
                        rtcMultiConnection.takeSnapshot(event.userid, function(snapshot) {
                            // on taking snapshot!
                        });
                    }
                });

                if(event.type === 'remote'){
                    remoteContainer.insertBefore(mediaElement, remoteContainer.firstChild);

                  //  connection.videosContainer.appendChild(mediaElement);
                  //  remoteContainer.append(event.mediaElement);
                       // connection.videosContainer.appendChild(mediaElement);
                setTimeout(function() {
                    mediaElement.media.play();
                }, 500);
                mediaElement.id = event.streamid;
                 
            	}
            	if(event.type === 'local'){
                    //connection.videosContainer.appendChild(mediaElement);
            		//localContainer.append(event.mediaElement);
            	}
            
            };
              
  
        // let endStream = function(){
        //     //on-stream ended
        //     connection.onstreamended = function(event) {
        //         location.reload();
        //         var mediaElement = document.getElementById(event.streamid);
        //         if(mediaElement) {
        //             mediaElement.parentNode.removeChild(mediaElement);

        //         }
        //     };
        // }

        let replaceScreen = function(){
            connection.addStream({ screen: true, oneway: true })
            
    }
    


  

        </script>


  