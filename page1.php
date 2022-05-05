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
    <h2 class="head1">Clubs</h2>
    <form method="post" action="Clubsmodifier.php"  >

<?php
  echo"<table><th ></th><th ></th>";
  $requete = "select * from Clubs order by Clubs_id";
  $ptrQuery = pg_query($cnx,$requete);
  if ($ptrQuery) {

    
    while($ligne = pg_fetch_assoc($ptrQuery )) {
   

      $intg = $ligne['clubs_id'];  

        echo "<tr><td > <input type=radio name=id value= $intg> </td><td>".$ligne['clubs_id']." - ".$ligne['clubs_nom']."  [".$ligne['clubs_nomcourt']."] ".$ligne['clubs_pays']."</td><tr> ";
        
             
		  }
		echo "</table><input  type =submit name=AJOUTER value= AJOUTER> ";	
		echo "</table><input  type =submit name=modifier value= MODIFIER> ";
	

   }

?>
 		<input name="supprimer" type="submit" onclick="if(!confirm('Voulez-vous supprimer?')) return false;" value="SUPPRIMER" />
</form>





</div>
</body>
</html>

