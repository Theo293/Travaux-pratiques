a) SELECT * FROM article ORDER BY Designation;

b) SELECT * FROM `article` ORDER BY PRIX DESC;

c) SELECT * FROM `article` WHERE DESIGNATION LIKE 'B%' ORDER BY PRIX;

d) SELECT * FROM `article` WHERE DESIGNATION LIKE '%sachet%' || '%sachet' || 'sachet%';

f) SELECT * FROM article, fournisseur WHERE fournisseur.ID=article.ID_FOU ORDER BY Nom, PRIX DESC;

g) SELECT * FROM article, fournisseur WHERE article.ID_FOU=fournisseur.ID && fournisseur.ID=3;

h) SELECT Nom, AVG(PRIX) FROM article, fournisseur WHERE fournisseur.ID=article.ID_FOU && fournisseur.ID=3 GROUP BY Nom;

i) SELECT Nom, AVG(PRIX) FROM article, fournisseur WHERE fournisseur.ID=article.ID_FOU GROUP BY Nom;

j) SELECT * FROM `bon` WHERE DATE_CMDE BETWEEN '2019-03-01' AND '2019-04-05 12:00:00';

k) SELECT * FROM article, compo, bon WHERE article.ID=compo.ID_ART && bon.ID=compo.ID_BON && DESIGNATION LIKE '%boulon%';

l) SELECT * FROM article, compo, bon, fournisseur WHERE article.ID=compo.ID_ART && bon.ID=compo.ID_BON && article.ID_FOU=fournisseur.ID && DESIGNATION LIKE '%boulon%';

m) SELECT Id_Bon, SUM(PRIX * QTE) FROM bon, compo, article WHERE bon.ID=compo.ID_BON && compo.ID_ART=article.ID GROUP BY ID_Bon;

n) SELECT Id_Bon, SUM(PRIX) FROM bon, compo, article WHERE bon.ID=compo.ID_BON && compo.ID_ART=article.ID GROUP BY ID_Bon;

o) SELECT Id_Bon, SUM(QTE) FROM bon, compo, article WHERE bon.ID=compo.ID_BON && compo.ID_ART=article.ID GROUP BY ID_Bon HAVING SUM(QTE)>=25;

p) SELECT Id_Bon, DATE_CMDE, SUM(PRIX) FROM bon, compo, article WHERE bon.ID=compo.ID_BON && compo.ID_ART=article.ID GROUP BY ID_Bon HAVING DATE_CMDE BETWEEN '2019-04-01' AND '2019-04-30';



