<!-- templates/board.php -->
<?php $title = 'Documenation' ?>

<?php ob_start() ?>
  <div class="container">
    <h4>
      Une documenation détaillée est disponible à l'adresse  :
      <a href="https://github.com/charlesen/php_memory" target="_blank">https://github.com/charlesen/php_memory</a>
    </h4>
    <img src="static/img/screen.png" class="img-fluid pb-3" />
  </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
