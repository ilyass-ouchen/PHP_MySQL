<?php
 include_once('cnx.php');
 include_once('class.php');
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
<form method="post"  action="JoueursAjouter.php">

<table>
 <tr><td> <H1> Ajouter Votre Joueur  </H1></td></tr>
 <tr><td> Nom de joueur * :</td><td><input type=text required="required"  name=nom  pattern= "[a-zA-ZÀ-ÿ]{4,}" ></td></tr> <br>
 <tr><td> prenom de joueur * :</td><td><input type=text required="required"  name=prenom  pattern= "[a-zA-ZÀ-ÿ]{4,}"></td></tr> <br>
 <tr><td> la date de naissance de joueur * :</td><td><input type=text required="required"  name=naissance></td></tr> <br>
 <tr><td> Post de joueur * :</td><td><input type=text required="required"  name=post></td></tr> <br>
 <tr><td> natoinalité de joueur * :</td><td><input type=text required="required"  name=nationalite  pattern= "[a-zA-ZÀ-ÿ]{4,}" ></td></tr> <br>
</table>		
 <input type="submit" value="AJOUTER" name="AJOUTER">
<?php
	 if ( isset($_POST["AJOUTER"])){
			 AJOUTERJoueurs($cnx,$_POST["nom"],$_POST["prenom"],$_POST["naissance"],$_POST["post"],$_POST["nationalite"]);
	}
?>
