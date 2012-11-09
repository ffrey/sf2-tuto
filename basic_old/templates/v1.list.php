<!DOCTYPE html>
<html>
    <head>
        <title>List of Posts (sep)</title>
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
