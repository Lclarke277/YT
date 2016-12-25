<!DOCTYPE HTML>
<html>
<head>
<title>YouTube Playlist</title>
<link rel='stylesheet' href='stylesheet.css' type="text/css">
<script src="jquery-3.1.1.min.js"></script>
</head>
<body>
    
<div id='songs'>   
<?php 
require 'connect.php';
$sql = "SELECT * FROM songs";
$result = $con->query($sql);  
while($row = $result->fetch_assoc()){    
        // <a href='the embed code' target='name of iframe'>
        echo "<a href='" . $row['embed'] . "' target='myFrame'><button type='button' class='song_buttons' id='" . $row['song'] . "'>" . $row['song'] . "</button></a>";
        
    };
$con->close();
?>     
</div>

    <div id="player"></div>

    <script src="http://www.youtube.com/player_api"></script>

    <script>

        // create youtube player
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
              height: '100%',
              width: '100%',
              videoId: '0Bmhjf0rKe8',
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
        }

        // autoplay video
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // when video ends
        function onPlayerStateChange(event) {        
            if(event.data === 0) {          
                alert('done');
            }
        }

    </script>
   
</body
    
</html>