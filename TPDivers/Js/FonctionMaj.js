function majusculeL (ch) {
    let nb = 0, caractere;
    nb = ch.charCodeAt(0);
    nb -= 32;
    caractere = String.fromCharCode(nb);
    ch = ch.replace(ch[0], caractere);

    return ch;
}

let chaine = "hello";

chaine = majusculeL(chaine);

console.log(chaine);