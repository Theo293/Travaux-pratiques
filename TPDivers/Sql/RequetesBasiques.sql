SELECT * FROM article;

SELECT Designation, REF FROM `article` WHERE PRIX > 2;

SELECT * FROM `article` WHERE PRIX >= 2 && PRIX <= 6.25;

SELECT * FROM `article` WHERE Prix BETWEEN 2 AND 6.25;

SELECT * FROM `article` WHERE (NOT (PRIX >= 2 && PRIX <= 6.25)) && ID_FOU = 1;

SELECT * FROM `article` WHERE ID_FOU = 1 || ID_FOU = 3;

SELECT * FROM `article` WHERE ID_FOU IN (1, 3);

SELECT * FROM `article` WHERE NOT (ID_FOU IN (1, 3));

SELECT * FROM `bon` WHERE DATE_CMDE BETWEEN '2019-02-01' AND '2019-04-30'