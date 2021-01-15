let array = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], Som = 0, Moy = 0, i;

for (i = 0 ; i < array.length ; i++)
{
    Som = Som + array[i];
}

console.log("La moyenne de toutes les valeurs est : " + (Som / i));