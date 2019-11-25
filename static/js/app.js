$(document).ready(function() {
  /**
   ** Lors du démarrage d'une partie, on initialise les variables playing et playing_count
   ** 1) Lorsqu'un joueur clique une carte, on incrément le playing_count et on stocker l'url de la première carte dans ref_card (carte de référence)
   ** 2) Au deuxième essai (clique), on repasse les valeurs à leur états initial et on valide ou non la paire.
   **/
  let
    playing_count = 1,
    ref_card = '',
    progress_percent = 0,
    score = 0,
    total_pairs_founded = 0,
    total_pairs = $('.memory-item').length / 2;

  let
    // Duree d'une partie, en secondes
    timeout = 300,
    // Heure de démarrage en timestamps
    timer_count = 0;

  let gameTimeout = setInterval(function() {
    // ProgressBar : toutes les secondes (1000)

    // Toutes les secondes, on incrémente la valeur du timer,
    // jusqu'à atteindre la valeur du timeout en secondes, le temps imparti
    timer_count += 1;

    if (timer_count >= timeout) {
      console.log('Fin du jeu');
      // Fin du jeu
      resetGame();

    } else {
      // Jeu en cours
      progress_percent = Math.ceil((timer_count * 100) / timeout);
    }

    // Maj de la progressbar
    $('.progress-bar').html(`${progress_percent} %`);
    $('.progress-bar').css('width', `${progress_percent}%`);
    $('.progress-bar').data('aria-valuenow', `${progress_percent}%`);

  }, 1000);

  $('#memory-board').on('click', '.memory-card', function(evt) {

    // On remplace l'image par défault par la véritable image
    let card_url = $(this).data('url');
    $(this).attr('src', card_url);

    // Ajout d'un tag pour dire que cette carte a été sélectionné
    $(this).addClass('card_clicked');

    console.log('playing_count', playing_count);

    if (playing_count == 2) {
      // Le joueur en est à son deuxième essai, On vérifie s'il a bon
      if (ref_card != card_url) {
        // Paire non valide : on remet l'image par défaut sur celles qui ont été sélectionnée
        setTimeout(function() {
          $(`img.card_clicked`).attr('src', '/static/img/card.jpg');
        }, 800);

      } else {
        // Pair valide : les photos réélles restes affichées. On retire également le
        // "tag" de sélection (card_clicked)
        console.log('Bravo');
        $(`img[src="${card_url}"]`).removeClass('card_clicked memory-card');

        // On incrémente les pairs trouvées
        total_pairs_founded += 1;
        if (total_pairs == total_pairs_founded) {
          setTimeout(function() {
            resetGame();
          }, 500);
        }
      }
      // On remet à zéro le statut du joueur
      playing_count = 1;
    } else {
      // Le joueur en est à son premier essai. On affiche l'image réelle
      ref_card = card_url;

      // incrémente le nombre d'essai
      playing_count += 1;
    }

    evt.preventDefault();

  });


  function resetGame() {
    // Décompte du nombre de pair : gagné ou perdu ?
    if (total_pairs == total_pairs_founded) {
      alert('Vous avez gagné-e ! ');
    } else {
      alert('Vous avez perdu-e');
    }
    // On remet les valeurs par défaut
    $(`img.memory-card`).attr('src', '/static/img/card.jpg');
    clearInterval(gameTimeout);
    progress_percent = 100;
    playing_count = 1;

    // Sauvegarde du score
    saveScore(timer_count)
  }

  function saveScore(score) {
    $.ajax({
      type: "POST",
      url: "/save_score",
      data: {
        'score': score
      },
      success: function(result) {
        timer_count = 0;
      },
      error: function(error) {
        timer_count = 0;
      },
    });
  }


});
