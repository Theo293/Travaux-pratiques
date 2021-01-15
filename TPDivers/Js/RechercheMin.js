let array = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], nbPlusPetit = 100;

for (let i = 0 ; i < array.length ; i++)
{
    if (nbPlusPetit > array[i])
    {
        nbPlusPetit = array[i];
    }
}

console.log("Le plus petit nombre du tableau est " + nbPlusPetit);