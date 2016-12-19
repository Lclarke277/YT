<!DOCTYPE HTML>
<html>
<head>
<title>YouTube Playlist</title>
<link rel='stylesheet' href='stylesheet.css' type="text/css">
<script src="jquery-3.1.1.min.js"></script>
</head>
<body>

<!-- Navigation Buttons -->
<!--<div id='controls'>
    <button type='button' class='control_buttons'>Next</button>
    <button type='button' class='control_buttons'>Previous</button>
</div>   -->  
<div id='song_button'>
    <button id='press' type='button'>Hide</button>
</div>
<!-- Songs In Database -->
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
    
<iframe name='myFrame' id='player' width="100%" height="100%" src="https://www.youtube.com/embed/T1pMmg4_FWU?autoplay=1" frameborder="0" allowfullscreen scrolling='no' autoplay='yes'></iframe>
 
<script type='text/javascript'>
$(document).ready(function() {
    $('button').click(function() {
        alert('pressed');
        $('#songs').hide();
    });
});
</script>    
</body
    
</html>