function majusculeL(ch) {
    let nb = 0, caractere;
    nb = ch.charCodeAt(0);
    nb -= 32;
    caractere = String.fromCharCode(nb);
    ch = ch.replace(ch[0], caractere);

    return ch;
}

function majusculePhrase(ch) {
    let mot = ch.split(' '), alphab = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"
        , "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"], Booleen = false;

    for (let i = 0; i < mot.length; i++) {
        for (let o = 0; o < alphab.length; o++) {
            if (mot[i][0] == alphab[o])
                Booleen = true;
        }

        if (!Booleen)
            mot[i] = majusculeL(mot[i]);

        Booleen = false;
    }

    ch = mot[0] + " ";
    for (let i = 1; i < mot.length; i++) {
        if (i + 1 != mot.length)
            ch += mot[i] + " ";
        else
            ch += mot[i];
    }

    return ch;
}

let chaine = "Bonjour tout le monde";

chaine = majusculePhrase(chaine);

console.log(chaine);