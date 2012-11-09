<?php $title = 'List of Posts (with layout)' ?>

<?php ob_start() ?>

        <h1>List of Posts</h1>
        <ul>
            <?php foreach ($result AS $row) : ?>
            <li>
                <a href="/index.php/show?id=<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

<?php $content = ob_get_clean(); ?>
<?php require 'layout.php' ?>