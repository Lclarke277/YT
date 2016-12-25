<!DOCTYPE HTML>
<html>
<head>
<title>YouTube Playlist</title>
<link rel='stylesheet' href='stylesheet.css' type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="playlist.js"></script>
<script>
    // create array of video ID's
    var playlist = ['-48Za7VZR_c', 'ZkOsccnyFWs', '0uMWbZj-gWg'];
    var playlist_position = 0;
    
    // go to the next song, if you reach the end, go to the start
    function next() {
        playlist_position++;
        
        if(playlist_position >= playlist.length) {
            playlist_position = 0;
        }
        
        player.loadVideoById(playlist[playlist_position]);
    }
    
    // go to the previous song, if you each the start, go to the end
    function previous() {
        playlist_position--;
        
        if(playlist_position < 0) {
            playlist_position = (playlist.length) - 1;
        }
        player.loadVideoById(playlist[playlist_position]);
    }
</script>
    
<?php 
    // Insert songs into Javascript playlist array
    require 'connect.php';
    $sql = "SELECT * FROM songs ORDER BY artist_first";
    $result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<script>playlist.push('" . $row['url'] . "')</script>";
    };
};
?>

</head>
<body>
 
<div id='nav'>
<button onclick='previous()' type="button" id='previous' class='nav_button'>Previous</button>
<button onclick="next()"  type="button" id='next' class='nav_button'>Next</button>
</div>

<iframe id="add_page" src="add.php" style="width:100%; height: 30px;" frameborder="0">
</iframe>

<!-- Song List -->
<div id='playlist'>
   
<script>
console.log(playlist);
</script>
    
    
</div>
    
<div id="player"></div>

    <script src="http://www.youtube.com/player_api"></script>
    
    <script>
        
        // genrerate a random index inside the playlist
        var random_song = playlist[Math.floor(Math.random() * (playlist.length - 1))]

        // create youtube player
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
              height: '100%',
              width: '100%',
              videoId: random_song,
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

        // when video ends, 0 in the API means video is 'done'
        function onPlayerStateChange(event) {        
            if(event.data === 0) {          
                // load the next song in the list
                player.loadVideoById(playlist[playlist_position]);
                playlist_position++;
                    // if playlist reaches the end, restart
                    if(playlist_position = playlist.length) {
                        playlist_position = 0;
                    };
            };
        }
    </script>
   
</body
    
</html>