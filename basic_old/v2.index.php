<?php
// index.php
 $dbh = new PDO('sqlite:C:\PROJETS_WEB\www\sf2\sf2-tuto\basic\data\sf12_basic.sqlite');
 $result = $dbh->query('SELECT id, title FROM post');


// include the HTML presentation code
require 'templates/list.php';