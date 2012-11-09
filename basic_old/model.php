<?php
// model.php
function open_database_connection()
{
     $dbh = new PDO('sqlite:C:\PROJETS_WEB\www\sf2\sf2-tuto\basic\data\sf12_basic.sqlite');

    return $dbh;
}

function get_all_posts()
{
    $link = open_database_connection();

     $result = $link->query('SELECT id, title FROM post');

    return $result;
}

function get_post_by_id($id)
{
	$link = open_database_connection();

	$id = intval($id);
	$query = 'SELECT title, body FROM post WHERE id = '.$id;
	
	$result = $link->query($query);
	
	return $result->fetch();
}