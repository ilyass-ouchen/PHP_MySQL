<?php
 
 include_once('cnx.php');
 include_once('class.php');

        session_start();
 /* on récupère id a l'aide d'une session et apres on fait le meme travail 
qu'on a fait pour les pages précédentes  
  */
        if(!empty($_POST["id"]) && isset($_POST["modifier"]))
		{
			$_SESSION["idy"]=$_POST["id"];
			header("location: JoueursModifier.php");
		}

	$id=$_SESSION["idy"];
	$sql="SELECT * FROM Joueurs WHERE jr_id='$id'";
	$result =pg_query($cnx,$sql);
        if ($result) {
		while($row = pg_fetch_array($result) ) {
			$_SESSION["jr_nom"]=$row[1];
                        $_SESSION["jr_prenom"]=$row[2];
                        $_SESSION["jr_naissance"]=$row[3];
                        $_SESSION["jr_post"]=$row[4];
                        $_SESSION["jr_nationalite"]=$row[5];
		}
	}

 
if ( isset($_POST["AJOUTER"]))
		{
			header("location:JoueursAjouter.php");
		}

if(isset($_POST["supprimer"])&&!empty($_POST["id"]))
		{
			$id=$_POST["id"];
			SUPRIMERJoueurs($cnx,$id);
		
		}
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
<form method="post"  action="JoueursModifier.php">

<table>
 <tr><td> <H1> Modifier votre Joueur </H1></td></tr>
<?php
 echo"	<tr><td> Nom de joueur* :</td></tr><tr><td><input type=text required='required' name=jr_nom value=".$_SESSION["jr_nom"]."  pattern= '[a-zA-ZÀ-ÿ]{4,}' ></td></tr>";

 echo"	<tr><td> prénom de joueur* :</td></tr><tr><td><input type=text  required='required' name=jr_prenom value=".$_SESSION["jr_prenom"]." pattern= '[a-zA-ZÀ-ÿ]{4,}' ></td></tr>";
 echo"	<tr><td> la date de naissance* :</td></tr><tr><td><input type=text required='required' name=jr_naissance value=".$_SESSION["jr_naissance"]." ></td></tr>";
 echo"	<tr><td> post de joueur* :</td></tr><tr><td><input type=text  required='required' name=jr_post value=".$_SESSION["jr_post"]." pattern='[A-Za-z]{2}'  ></td></tr>";
 echo"	<tr><td> la nationalité de joueur* :</td></tr><tr><td><input type=text required='required' name=jr_nationalite value=".$_SESSION["jr_nationalite"]." pattern='[a-zA-ZÀ-ÿ]{4,}' ></td></tr>";

?>
</table>	
<input type="submit" value="MODIFIER" name="MODIFIER"> 
 <input type="submit" value="ANNULER" name="ANNULER"> 
</form>
<?php
	

	$i=$_SESSION["idy"];

/* vérification des champs obligatoires */

	 if (isset($_POST["MODIFIER"])){
		MODIFIERJoueurs($cnx,$i,$_POST["jr_nom"],$_POST["jr_prenom"],$_POST["jr_naissance"] , $_POST["jr_post"] , $_POST["jr_nationalite"] );
	 }
	 if( isset($_POST["ANNULER"])) header("location:page3.php"); 
?>
</div>

</body>
</html>
