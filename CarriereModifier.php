<?php
 include_once('cnx.php');
 include_once('class.php');
 session_start();

        if(!empty($_POST["id"]) && isset($_POST["modifier"]))
		{
			$_SESSION["idf"]=$_POST["id"];
			header("location: CarriereModifier.php");
		}
	$id=$_SESSION["idf"];
	$sql = "SELECT  jr_id , clubs_id , jr_nom, clubs_nom  ,début , fin  FROM Clubs NATURAL join Carriere NATURAL join Joueurs WHERE Ca_id ='$id' ";
	$result =pg_query($cnx,$sql);
        if ($result) {
		while($row = pg_fetch_array($result) ) {
				$_SESSION["jr_id"]=$row[0];
				$_SESSION["clubs_id"]=$row[1];
				$_SESSION["jr_nom"]=$row[2];
				$_SESSION["clubs_nom"]=$row[3];
				$_SESSION["debut"]=$row[4];
                                $_SESSION["fin"]=$row[5];
		}
	}



  if ( isset($_POST["AJOUTER"]))
		{
			header("location:CarriereAjouter.php");
		}

 if(isset($_POST["supprimer"])&&!empty($_POST["id"]))
		{
			$id=$_POST["id"];
			SUPRIMERECarriere($cnx,$id);
		
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
<form method="post"  action="CarriereModifier.php">

 <table>
 <tr><th> <H1> Modifier la carriere de joueur </H1></th></tr>
<?php
  echo"	<tr><td> NOM DE joueur :</td><td>".$_SESSION["jr_nom"]." </td></tr>";
  echo"	<tr><td> club de joueur:</td><td>".$_SESSION["clubs_nom"]." </td></tr>";
  echo"	<tr><td> id de clubs* :</td></tr><tr><td><input type=text required='required' name=clubs_id value=".$_SESSION["clubs_id"]."  ></td></tr>";
  echo"	<tr><td> debut * :</td></tr><tr><td><input type=text required='required' name=debut value=".$_SESSION["debut"]."  ></td></tr>";
  echo"	<tr><td> fin * :</td></tr><tr><td><input type=text required='required' name=fin value=".$_SESSION["fin"]."  ></td></tr>";
?>
 </table>
 <input type="submit" value="MODIFIER" name="MODIFIER"> 
 <input type="submit" value="ANNULER" name="ANNULER">
</form>
<?php
	 $i=$_SESSION["idf"];

   /* vérification des champs obligatoires */

	 if ( isset($_POST["MODIFIER"]) && (filter_var($_POST["clubs_id"], FILTER_VALIDATE_INT)) && (filter_var($_POST["debut"], FILTER_VALIDATE_INT)) && $_POST["debut"] > 1900 && (filter_var($_POST["fin"], FILTER_VALIDATE_INT)) && $_POST["fin"] <= 2020){
		MODIFIERCarriere($cnx,$i,$_POST["clubs_id"],$_POST["debut"],$_POST["fin"]);
	 }
	 if( isset($_POST["ANNULER"])) header("location:page2.php"); 
?>
</div>

</body>
</html>
