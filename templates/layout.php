<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?> - Memory en PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="static/css/app.css">
    </head>
    <body class="container pt-3">
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal site_title">
          <a href="/">Jeu Memory</a>
        </h5>
        <a class="btn btn-outline-primary" href="/">Nouvelle partie</a>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="/">Documentation</a>
          <a class="p-2 text-dark" href="https://charlesen.fr/contact" target="_blank">Contacter l'auteur</a>
        </nav>
      </div><!-- Entete de menu -->
      <div class="jumbotron mx-auto text-center">
        <h1 class="display-4">Memory</h1>
        <div class="lead">
        <p class="text-center font-weight-bold">
          Le principe du jeu est relativement simple :
          <span class="">Cliquer sur une carte et trouver son double.</span>
        </p>
        <p>
        Si double trouvé, on a une paire valide. Sinon, vous n'avez plus qu'à recommencer. <br />
        Si vous réussisez à valider toutes les paires dans le temps imparti, vous avez remporté la partie.
        </p>
        </div>
      </div>
      <div class="container">
        <?= $content ?>
      </div>
      <footer class="footer mt-auto py-3">
        <div class="container">
          <span class="text-muted"><?= date('Y') ?> License MIT &copy; Jeu de Memory, par Charles EDOU NZE</span>
        </div>
      </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="static/js/app.js"></script>
</html>
