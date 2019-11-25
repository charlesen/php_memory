<!-- templates/board.php -->
<?php $title = 'Nouvelle partie' ?>

<?php ob_start() ?>
    <div class="text-center">
      <h3>Scores (Top 5):
      <?php foreach ($scores as $score): ?>
        <span class="badge badge-success">
          <?= $score['score'] ?> s
        </span>
      <?php endforeach ?>
      </h3>
    </div>
    <div class="container" id="memory-board">
      <div class="row">
        <?php foreach ($cards as $card): ?>
          <div class="col-4 col-sm-2 p-3 memory-item">
            <a href="#">
              <img src="/static/img/card.jpg" class="img-thumbnail memory-card" data-url="<?= $card ?>" />
            </a>
          </div>
        <?php endforeach ?>
        <div class="col-12">
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>


<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
