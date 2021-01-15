let Tableau1 = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], 
Tableau2 = [-1, 12, 17, 14, 5, -9, 0, 18],
TableauSom = [];

for (let i = 0 ; i < Tableau1.length ; i++)
{
    if (i < Tableau2.length)
    {
        TableauSom.push(Tableau1[i] + Tableau2[i]);
    }
    else
    {
        TableauSom.push(Tableau1[i]);
    }

    console.log(TableauSom[i]);
}