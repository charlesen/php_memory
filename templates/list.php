<!-- templates/list.php -->
<?php $title = 'Dernière notes' ?>

<?php ob_start() ?>
    <h1>Dernière notes</h1>
    <ul>
        <?php foreach ($notes as $post): ?>
        <li>
            <a href="/show.php?id=<?= $post['id'] ?>">
                <?= $post['title'] ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
