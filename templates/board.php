<!-- templates/board.php -->
<?php $title = 'Nouvelle partie' ?>

<?php ob_start() ?>
    <h1 class="text-center">Plateau</h1>


    <div class="container">
      <div class="row">
        <?php foreach ($cards as $card): ?>
          <div class="col-4 col-sm-2 p-3">
            <img src="<?= $card ?>" class="img-thumbnail" data-url="<?= $card ?>" />
          </div>
        <?php endforeach ?>
      </div>
    </div>


    <!-- <table class="table">
    <?php for ($i = 0; $i <= $rows; $i++): ?>
      <tr>
        <?php for ($j = 0; $j <= $cols; $j++): ?>
          <?php $index = $i*$cols+$j; ?>
          <td>
            <img src="<?= $cards[$index] ?>" /> (<?= $cards[$index] ?>)
          </td>
        <?php endfor ?>
      </tr>
    <?php endfor ?>
    </table> -->

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
