<!-- templates/show.php -->
<?php $title = $note['title'] ?>

<?php ob_start() ?>
    <h1><?= $note['title'] ?></h1>

    <div class="date"><?= $note['created'] ?></div>
    <div class="content" id="content-editor">
        <?= $note['content'] ?>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
