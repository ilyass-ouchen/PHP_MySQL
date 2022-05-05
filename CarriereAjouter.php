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
<form method="post"  action="CarriereAjouter.php">
<table>
 <tr><td> <H1> Ajouter Votre Carriere  </H1></td></tr>
 <tr><td> CLUBS * :</td><td>
 <select id="Clubs" name="Clubs">
<?php
	$sql="SELECT * FROM Clubs  ";
	$result =pg_query($cnx,$sql);
        if ($result) {
		while($row = pg_fetch_assoc($result) ) {
                	echo "<option value=".$row["clubs_id"].">".$row["clubs_nom"]."</option>";
		}
	}
?>
</select>
 </td></tr> <br>
 <tr><td> Joueurs * :</td><td>    
 <select id="Joueurs" name="Joueurs">
<?php
	$sql="SELECT * FROM Joueurs  ";
	$result =pg_query($cnx,$sql);
	if ($result) {
      		while($row = pg_fetch_assoc($result) ) {
                echo "<option value=".$row["jr_id"].">".$row["jr_nom"]."</option>";
		}
      }
         ?>
 </select>
 </td></tr><br>
 <tr><td> début * :</td><td><input type=Text required="required"  name=début></td></tr> <br>
 <tr><td> fin * :</td><td><input type=Text required="required"  name=fin></td></tr> <br>

 </table>

 <input type="submit" value="AJOUTER" name="AJOUTER">
<?php
 /* vérification des champs obligatoires */
	 if (isset($_POST["AJOUTER"]) && (filter_var($_POST["début"], FILTER_VALIDATE_INT)) && $_POST["début"] > 1900 && (filter_var($_POST["fin"], FILTER_VALIDATE_INT)) && $_POST["fin"]<=2020) {
		 AJOUTERCarriere($cnx,$_POST["Joueurs"],$_POST["Clubs"],$_POST["début"],$_POST["fin"]);
	}
?>
