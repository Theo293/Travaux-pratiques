let Tableau1 = [1, 15, -3, 0, 8, 7, 4, -2, 28, 7, -1, 17, 2, 3, 0, 14, -4], 
Tableau2 = [-1, 12, 17, 14, 5, -9, 0, 18, -6, 0, 4, -13, 5, 7, -2, 8, -1],
TableauSom = [];

console.log("Affichage de la somme des deux tableaux :");

for (let i = 0 ; i < Tableau1.length ; i++)
{
    TableauSom.push(Tableau1[i] + Tableau2[i]);
    console.log(TableauSom[i]);
}