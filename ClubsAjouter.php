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

<form method="post"  action="ClubsAjouter.php">
<table>
 <tr><td> <H1> Ajouter un Club </H1></td></tr>
 <tr><td> Club_nom  * :</td><td><input type=text required="required"  name=clubs_nom  pattern= '[a-zA-ZÀ-ÿ]{4,}' ></td></tr> <br>
 <tr><td> Club_nomcourt  * :</td><td><input type=text required="required"  name=clubs_nomcourt  pattern= '[a-zA-ZÀ-ÿ]{3}' ></td></tr> <br>
 <tr><td> Club_pays  * :</td><td><input type=text required="required"  name=clubs_pays  pattern= '[a-zA-ZÀ-ÿ]{4,}' ></td></tr> <br>
</table>
  <input type="submit" value="AJOUTER" name="AJOUTER">
<?php
if (isset($_POST["AJOUTER"])){
			 AJOUTERClubs($cnx,$_POST["clubs_nom"],$_POST["clubs_nomcourt"],$_POST["clubs_pays"]);
	}
?>
