<!DOCTYPE HTML>
<html>
<head>
<title>YouTube Playlist</title>
<link rel='stylesheet' href='stylesheet.css' type="text/css">
</head>
<body>

<?php 
require 'connect.php';
if (isset($_POST['submit'])) {
    $artist_first = $_POST['artist_first'];
    $artist_last = $_POST['artist_last'];
    $song = $_POST['song'];
    
    /* breaks down the embed iframe to just the needed URL, 38 chars from front,
    -43 chars from the back, then appends '?autoplay=1' in order to start the 
    videos automatically */
    $embed = (substr(($_POST['embed']), 38, -43)) . '?autoplay=1';
    
    $stmt = $con->prepare("INSERT INTO songs (artist_first, artist_last, song, embed)Values(?, ?, ?, ?)");
    $stmt->bind_param('ssss', $artist_first, $artist_last, $song, $embed);
    $stmt->execute();
}    
?>    
    
<form method="post">
    <input type='text' name='artist_first' placeholder="First" required>
    <input type='text' name='artist_last' placeholder="Last" required>
    <input type='text' name='song' placeholder="Song" required>
    <input type='text' name='embed' placeholder="Embed" required>
    <input type='submit' name='submit'>
</form>
    
    <a  href='index.html'><button type="button">Home</button></a>
    
</body>

</html>