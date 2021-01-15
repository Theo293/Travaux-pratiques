let array = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4];

console.log("Affichage des nombres plus grand que 3 :");

for (let i = 0 ; i < array.length ; i++)
{
    if (array[i] > 3)
    {
        console.log("Le nombre " + array[i] + " à la position " + (i + 1) + " est plus grand que 3.");
    }
}

console.log("Affichage des nombres pairs :");

for (let i = 0 ; i < array.length ; i++)
{
    if ((array[i] % 2) == 0)
    {
        console.log("Le nombre " + array[i] + " à la position " + (i + 1) + " est pairs.");
    }
}

console.log("Affichage des valeurs ayant des index pairs :");

for (let i = 0 ; i < array.length ; i++)
{
    if ((i % 2) == 0)
    {
        console.log("L'indice " + i + " qui a pour valeur " + array[i] + " est pairs.");
    }
}

console.log("Affichage des nombres impairs");

for (let i = 0 ; i < array.length ; i++)
{
    if ((array[i] % 2) != 0)
    {
        console.log("Le nombre " + array[i] + " à la position " + (i + 1) + " est impairs.");
    }
}