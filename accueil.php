<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Projet PHP</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="wrapper">
    <div class="menu">
        <h2>Menu </h2>
        <ul class="menu">
            <li><a href='accueil.php'>Home</a></li>
            <li><a href='page1.php'>Clubs</a></li>
            <li><a href="page3.php">Joueurs</a></li>
            <li><a  href="page2.php">Carrière</a></li>

        </ul>

    </div>

    <div class="main_content">
        <div class="header">CARRIÈRE DES JOUEURS DE FOOTBALL</div>

    </div>
</div>

<div style="margin-left:15%;padding:1px 16px;height:100px;">
    <h2 class="head1">Présentation du projet</h2>
<div class="paragraphe">
    <p>Notre projet consiste à reprendre la base créée au premier semestre sur les Carrières des joueurs du football. Dans le menu, on a trois liens vers le contenu de nos tables. Dans chaque lien, on a la possiblité d'insérer, de modifier ou de supprimer des enregistrements suivant les conditions suivantes:</p>

    <h4>Ajouter et Modifier :</h4>
        <p>&ensp;&ensp;Pour toutes les variables de notre base de données on peut pas insérer des nombres à la place d'une chaîne de caractéres.</p>
        <p>&ensp;&ensp;On peut pas laisser la case vide sans remplir les informations nécessaires pour la modification et l'ajout d'un enregistrement.</p>
        <p>&ensp;&ensp;Il est impossible d'insérer une chaîne à la place d'un entier.</p>
        <p>&ensp;&ensp;Si on insére une date on vérifie à l'aide de la foncion "isValide()" définie dans class.php que l'information insérée est bien une date.</p>
    <h4>Supprimer :</h4>
        <p>&ensp;&ensp;Il est impossible de supprimer un enregistrement existant déjà dans notre base de données.</p>
    <p class="alerte"><b>Lorsqu'on est dans ces cas, une alerte est lancée</b></p>
    <h4>Remarque :</h4>
        <p>&ensp;&ensp;Avant de modifier ou d'insérer un enregistrement, les informations rentrées sont vérifiées c'est à dire si l'utilisateur entre un chiffre à la place d'une chaîne de caractères alors ce dernier doit rentrer l'information.</p>

</div>
  <div class="footer">
        Le projet est réalisé par :</br>
        Mansour Amine</br>
        Abaakil Abderrahman </br>
        Ouchen Ilyass</br>
</div>
</div>

</body>
</html>
