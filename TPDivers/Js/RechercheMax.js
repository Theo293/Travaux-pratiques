let array = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], nbPlusGrand = 0;

for (let i = 0 ; i < array.length ; i++)
{
    if (nbPlusGrand < array[i])
    {
        nbPlusGrand = array[i];
    }
}

console.log("Le plus grand nombre du tableau est " + nbPlusGrand);