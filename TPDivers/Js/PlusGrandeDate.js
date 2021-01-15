// Fait des calculs avec deux date pour afficher la date la plus récente

function dateLaPlusRecente(dt1, dt2) {

    let somDate1 = 0, somDate2 = 0;

    somDate1 += dt1.getFullYear() * 365;
    somDate1 += (dt1.getMonth() + 1) * 30;
    somDate1 += dt1.getDate();
    somDate2 += dt2.getFullYear() * 365;
    somDate2 += (dt2.getMonth() + 1) * 30;
    somDate2 += dt2.getDate();

    if (somDate1 > somDate2)
        console.log(dt1 + " est une date plus récente que " + dt2 + ".");
    else if (somDate1 < somDate2)
        console.log(dt2 + " est une date plus récente que " + dt1 + ".");
    else
        console.log("Ce sont les mêmes dates");
}

/*
    Appel de la fonction "dateLaPlusRecente" qui affichera la date la plus récente entre deux date préalablement
    entrées.
*/

let date1 = new Date(2019, 7, 11), date2 = new Date(2019, 9, 14);

dateLaPlusRecente(date1, date2);