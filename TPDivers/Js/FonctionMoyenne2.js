// Reçoit un tableau en paramètre et retourne la moyenne des ses valeurs

function calculMoyenne(tb) {
    let som = 0;

    if(!Array.isArray(tb))
        throw "Le paramètre n'est pas un tableau"

    for (let i = 0 ; i < tb.length ; i++)
        if(typeof(tb[i]) != "number")
            throw "Un des éléments du tableau n'est pas un nombre"

    if (tb.length > 0) {

        for (let i = 0; i < tb.length; i++) {
            som += tb[i];
        }
    }
    else
    {
        return 0;
    }

    return som / tb.length;
}

// Passe un tableau en paramètre à la fonction "calculMoyenne" et affiche sa valeur de retour

let tableau = [3, 5, 9, 6];

try {
    console.log(calculMoyenne(tableau));
}
catch(e) {
    console.log("Message d'erreur : " + e);
}