let array = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], arrayCopy = [];

for (let i = array.length - 1 ; i >= 0 ; i--)
{
    arrayCopy.push(array[i]);
}

console.log("Le tableau array à pour valeur : ");

for (let i = 0 ; i < array.length ; i++)
{
    console.log(array[i] + " à la position " + (i + 1));
}

console.log("Le tableau arrayCopy à pour valeur : ");

for (let i = 0 ; i < arrayCopy.length ; i++)
{
    console.log(arrayCopy[i] + " à la position " + (i + 1));
}