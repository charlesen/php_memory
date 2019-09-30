<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?> - Les notes de Charly</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="static/css/app.css">
    </head>
    <body>
      <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal site_title">
          <a href="/">Les notes de Charly</a>
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="#">Liste</a>
          <a class="p-2 text-dark" href="#">Tendances</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Se connecter</a>
      </div><!-- Entete de menu -->
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Bloc-notes perso</h1>
        <p class="lead">
          Grâce à ce génialissime bloc-note en ligne,
          <br /> je peux sauvegarder le contenu de mes pensées tout au long de la journée.
          <br /> <strong>Je sais, c'est génial !😀</strong>
        </p>
      </div>
      <div id="editorjs"></div>
      <div class="container">
        <?= $content ?>
        <button id="saveButton" class="btn">Enregistrer</button>
      </div>
      <footer class="footer mt-auto py-3">
        <div class="container">
          <span class="text-muted"><?= date('Y') ?> &copy; Les notes de Charly</span>
        </div>
      </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="static/js/editor.js"></script>
    <script src="static/js/app.js"></script>
</html>
