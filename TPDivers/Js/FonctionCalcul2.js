// Fait une opération aves les variables a et b

function calcul(a, b) {

    if (!a || !b) {
        throw "Il manque un ou plusieurs paramètre"
    }

    if (typeof (a) != "number" || typeof (b) != "number") {
        throw "Un des paramètres n'est pas un nombre";
    }

    return a * b + a + b
}

// Passe en paramètre deux nombres à la fonction "calcul" et affiche le résultat

let nb1 = 3, nb2 = 5;

try {
    console.log(calcul(nb1, nb2));
}
catch (e) {
    console.log("Message d'erreur : " + e);
}