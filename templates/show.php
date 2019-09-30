<!-- templates/show.php -->
<?php $title = $post['title'] ?>

<?php ob_start() ?>
    <h1><?= $post['title'] ?></h1>

    <div class="date"><?= $post['created'] ?></div>
    <div class="content">
        <?= $post['content'] ?>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
