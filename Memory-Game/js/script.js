//fonction timer

var c = 0;
var t;
var timer_is_on = 0;
var minute = 0;

function reset() {
  this.c = 0;
}

function timedCount() {
  document.getElementById("txt").value = minute + ":" + c;
  c = c + 1;
  t = setTimeout(timedCount, 1000);
  if (c == 60) {// convertis  s en minute
    minute++;
    console.log(minute);
    reset();
  }
}

function startCount() {
  if (!timer_is_on) {
    timer_is_on = 1;
    timedCount();
  }
}

function stopCount() {
  clearTimeout(t);
  timer_is_on = 0;
}

// fonction compte clci
function incrementValue() {
  var value = parseInt(document.getElementById('number').value);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
  startCount();
}
// variable des cartes

var cartesHs = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10];
// Le codage utilisé pour l'état des cartes est le suivant :
//     0 : face cachée
//     1 : face visible
//     -1 : reste visible
// Au départ toutes les cartes sont présentées de dos.
var etatsCartes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

var cartesRetournees = [];

var nbPairesWin = 0;

// Le tableau imgCarte

var imgCartes = document.getElementById("memorygamehs").getElementsByTagName("img");

// On parcourt le tableau des objets des éléments img, chacun d'eux reçoit une fonction déclenchée par l'événement onclick.
// La fonction ainsi définie est exécutée à chaque fois que l'utilisateur clique sur l'image son rôle est d'appeller controleJeu avec le numéro de l'image cliquée.

for (var i = 0; i < imgCartes.length; i++) {
  imgCartes[i].noCarte = i; //propriété no cartes à img
  imgCartes[i].onclick = function() {
    controleJeu(this.noCarte);
  }
}

initialiseJeu();

function majAffichage(noCarte) {
  switch (etatsCartes[noCarte]) {
    case 0:
      imgCartes[noCarte].src = "pict/test_fond.gif";
      break;
    case 1:
      imgCartes[noCarte].src = "pict/carte" + cartesHs[noCarte] + ".png";
      break;
    case -1:
      imgCartes[noCarte].style.visibility = "visible";
      break;
  }
}

function initialiseJeu() {
  for (var position = cartesHs.length - 1; position >= 1; position--) {
      console.log(cartesHs.length);
     // var de depart cartesHs.length, position superieur ou egale a 1 , décrémentation sur position
    var hasard = Math.floor(Math.random() * (position + 1));
    //  mathrandom pour sortir un nombre aleatoire * position
    // mathfloor pour sortir le plus grand entier ( arrondir)

    //console.log(hasard);
    var sauve = cartesHs[position];
    cartesHs[position] = cartesHs[hasard];
    cartesHs[hasard] = sauve;
    //stoquer la variable
  }
}
// fonction pour controler les paires
function controleJeu(noCarte) {
  if (cartesRetournees.length < 2) {
    if (etatsCartes[noCarte] == 0) {
      etatsCartes[noCarte] = 1;// affiche carte
      cartesRetournees.push(noCarte);
      majAffichage(noCarte);
    }
// control paire gagnante
    if (cartesRetournees.length == 2) {
      var nouveauEtat = 0;
      if (cartesHs[cartesRetournees[0]] == cartesHs[cartesRetournees[1]]) {
        nouveauEtat = -1;
        nbPairesWin++;
      }

      etatsCartes[cartesRetournees[0]] = nouveauEtat;
      etatsCartes[cartesRetournees[1]] = nouveauEtat;

      setTimeout(function() {
        majAffichage(cartesRetournees[0]);
        majAffichage(cartesRetournees[1]);
        cartesRetournees = [];
        if (nbPairesWin == 10) {
          stopCount();

          var value = parseInt(document.getElementById('number').value);
          alert("nombre de clic:" + value + " " + minute + " :" + c);
          window.open("formulaire.html");

        }
      }, 750);
    }
  }
}
