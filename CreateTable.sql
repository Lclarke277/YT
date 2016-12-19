CREATE DATABASE IF NOT EXISTS YouTubePlaylist;
USE YouTubePlaylist;

DROP TABLE IF EXISTS songs;

CREATE TABLE IF NOT EXISTS songs (
	song_id int(4) ZEROFILL NOT NULL AUTO_INCREMENT,
    artist_first varchar(15) NOT NULL,
    artist_last varchar(15) NOT NULL,
    song varchar(30) NOT NULL,
    embed varchar(140) NOT NULL,
    primary key (song_id));