/* 
    La fonction retourne "true" si toutes les valeurs du tableau passé en paramètre sont des nombres
    Elle retourne "false" si toutes les valeurs ne sont pas des nombres
    ou si le tableau ne contient aucune valeur
*/

function verifTableau (tb) {
    let Booleen = true;

    for(let i = 0 ; i < tb.length ; i++)
    {
        if(isNaN(tb[i]))
            Booleen = false;
    }

    if(tb.length < 1)
        Booleen = false;

    return Booleen;
}

// Appel de la fonction "verifTableau" avec plusieurs cas différents

let tableau1 = [3, 7, 1, 10, 12], tableau2 = ["Hello, Bye, Name"], tableau3 = [];

console.log(verifTableau(tableau1));
console.log(verifTableau(tableau2))
console.log(verifTableau(tableau3))