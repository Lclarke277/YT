<?php require 'connect.php';
if (isset($_POST['submit'])) {
    $artist_first = $_POST['artist_first'];
    $artist_last = $_POST['artist_last'];
    $song_title = $_POST['song_title'];
    
    // gets only the video ID from the URL 
    $url = substr(($_POST['url']), 32, 11);
    
    $stmt = $con->prepare("INSERT INTO songs (artist_first, artist_last, song_title, url)Values(?, ?, ?, ?)");
    $stmt->bind_param('ssss', $artist_first, $artist_last, $song_title, $url);
    echo "<script>playlist.push('" . $url . "');</script>";
    $stmt->execute();
}; 
?> 

<!DOCTYPE HTML>
<html>
<head>
<title>YouTube Playlist</title>
<link rel='stylesheet' href='stylesheet.css' type="text/css">
<script src="playlist.js"></script>
</head>
<body>
 
<form method="post">
    <input type='text' name='artist_first' placeholder='First'>
    <input type='text' name='artist_last' placeholder='Last'>
    <input type='text' name='song_title' placeholder='Song Title'>
    <input type='text' name='url' placeholder='Paste URL Here'>
    <input type='submit' id='add_submit' name="submit" value="Add Song">
</form>
    
<?php 

    // display songs currently in the data
    $sql = "SELECT artist_first, artist_last, song_title FROM songs ORDER BY artist_first";
    $result = $con->query($sql);
if ($result->num_rows > 0) {
      echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Song</th>
                </tr>";
    while($row = $result->fetch_assoc()){
        echo "<script>playlist.push('poop');</script>";
          echo "<tr>
                    <td>" . $row['artist_first'] . " " . $row['artist_last'] .  "</td>
                    <td>" . $row['song_title'] . "</td>
                </tr>";
    };
    echo "</table>";
};
    
?>

</body
    
</html>