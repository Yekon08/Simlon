var prix = Number (prompt("Quel est le prix HT ?"));

var tva = 20 / 100;

var prixTtc = prix * (1 + tva);


alert("Le prix TTC est de " + prixTtc + " euros");