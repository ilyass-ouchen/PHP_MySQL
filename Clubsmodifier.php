<?php
 
 include_once('cnx.php');
 include_once('class.php');
  
session_start();

  /* si l'utilisateur clique sur "modifier" alors on récupère "id = Clubs_id" apres on enregistre id dans une session pour qu'on puisse le récupèrer 
   dans les autres pages */

	if(!empty($_POST["id"]) && isset($_POST["modifier"]))
		{
		      $_SESSION["idet"]=$_POST["id"];	
			header("location:Clubsmodifier.php");
                }

/* si l'utilisateur sur "supprimer " alors on supprime tout les informatios à l'aide de la fonction "SUPRIMERClubs" */

       if(isset($_POST["supprimer"])&&!empty($_POST["id"]))
		{
			$id=$_POST["id"];
			SUPRIMERClubs($cnx,$id);
		
		}

 /* une fois cliquer sur "ajouter" cela amène à une autres page "ClubsAjouter" pour ajouter des enregistrements*/
      if ( isset($_POST["AJOUTER"]))
		{
			header("location:ClubsAjouter.php");
		}
	

     /* on récupère clubs_id déjà enregistrer dans une session
*/
	$id=$_SESSION["idet"];
	$sql="SELECT * FROM CLUBS WHERE Clubs_id ='$id'";
	$result =pg_query($cnx,$sql);
       if ($result) {
      		while($row = pg_fetch_array($result) ) {
 /* on enreistre les informations du tableau dans des sessions et pour ça on a utilisé la fonction "pg_fetch_array" 
pour récupèrer chaque ligne du tableau */
			$_SESSION["clubs_nom"]=$row[1];
                        $_SESSION["clubs_nomcourt "] = $row[2];
                        $_SESSION["clubs_pays"] = $row[3];
                    
                       
		}
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

<form method="post" action="Clubsmodifier.php"  >
<table>
 <tr><td><H1> Modifier les Clubs </H1></td></tr>
<?php
          echo"	<tr><td> Nom de club* :</td></tr><tr><td><input type=text required='required' name=clubs_nom value=".$_SESSION["clubs_nom"]."  pattern= '[a-zA-ZÀ-ÿ]{4,}'  ></td></tr>";
          echo"	<tr><td> Nom Court de club* :</td></tr><tr><td><input type=text required='required' name=clubs_nomcourt value=". $_SESSION["clubs_nomcourt "]." pattern= '[a-zA-ZÀ-ÿ]{3}'  ></td></tr>";
          echo"	<tr><td> pays de club* :</td></tr><tr><td><input type=text  required='required' name=clubs_pays value=". $_SESSION["clubs_pays"]." pattern= '[a-zA-ZÀ-ÿ]{4,}' ></td></tr>";
?>
</table>
 <input type="submit" value="MODIFIER" name="MODIFIER"> 
 <input type="submit" value="ANNULER" name="ANNULER">
</form>
<?php

	$i=$_SESSION["idet"];

/*avant de modifier on fait une vérification que "clubs_nom" et "clubs_nomcourt" et  "clubs_pays" sont bien des chaîne des caractères
a l-aide de la fonction ctype_alpha*/


	 if(isset($_POST["MODIFIER"])){
		MODIFIERClubs($cnx,$i,$_POST["clubs_nom"],$_POST["clubs_nomcourt"],$_POST["clubs_pays"]);
	 }
                     
	 if( isset($_POST["ANNULER"])) header("location:page1.php"); 
?>
</div>

</body>
</html>
