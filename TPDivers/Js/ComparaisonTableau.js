let array1 = [1, 15, -3, 8, 7, 4, -2, 28, -1, 17, 2, 3, 0, 14, -4], 
array2 = [3, -8, 17, 5, -1, 4, 0, 6, 2, 11, -5, -4, 8];

for (let i = 0 ; i < array1.length ; i++)
{
    for (let u = 0 ; u < array2.length ; u++)
    {
        if (array1[i] == array2[u])
        {
            console.log("array1 et array2 ont le nombre " + array1[i] + " en commun.");
        }
    }
}