<?php
// index.php
 $dbh = new PDO('sqlite:C:\PROJETS_WEB\www\sf2\sf2-tuto\basic\data\sf12_basic.sqlite');
 $result = $dbh->query('SELECT id, title FROM post');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>List of Posts</title>
    </head>
    <body>
        <h1>List of Posts</h1>
        <ul>
            <?php foreach ($result AS $row) : ?>
            <li>
                <a href="/show.php?id=<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>

