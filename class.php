<?php

/* la fonction AjouterClubs permet d'ajouter des nouveaux Cluns dans notre base de données*/

function AJOUTERClubs($cnx,$n1,$n2,$n3){
    $count=1;
    $sql = "SELECT * FROM Clubs";
    $result = pg_query($cnx,$sql);
    if ($result) {
        while($row = pg_fetch_assoc($result) ) {
            if(strcasecmp($row['clubs_nom'], $n1 ) == 0 && strcasecmp($row['clubs_nomcourt'],$n2)==0 && strcasecmp($row['clubs_pays'], $n3 ) == 0) {
                $count=-1;
                break;
                /* vérification que les information insérer n'exsite pas déjà dans notre base de données */
            }
        }
        if($count!=-1){

            /* on ajoute les informations insérer dans la table Clubs de notre base de données */

            $sql1 = "INSERT INTO Clubs(clubs_nom , clubs_nomcourt, clubs_pays) VALUES('$n1','$n2','$n3')";
            $exec=pg_query($cnx,$sql1);
            header("location:page1.php");
        }
        else{
            echo "<script>alert(\"Ce Clubs existe deja\")</script>";
        }
    }

}


/* la fonction MODIFIERClubs permet des modifier les informations déjà exister dans notre base de données*/

function MODIFIERClubs($cnx,$i,$n1,$n2,$n3){
    $count=0;
    $sql="SELECT * FROM Clubs where clubs_id !='$i' ";
    $result =pg_query($cnx,$sql);
    if ($result) {

        while($row = pg_fetch_array($result) ) {
            if(strcasecmp($row[1], $n1) == 0 && strcasecmp($row[2], $n2)==0 && strcasecmp($row[3], $n2)==0 ){
                $count=-1;
                break;
                /* vérification que les information modifier n'exsite pas déjà dans notre base de données */
            }
        }


        if($count!=-1){
            $sql1="UPDATE Clubs SET Clubs_nom='$n1' , clubs_nomcourt='$n2' , clubs_pays='$n3' WHERE clubs_id ='$i'";
            $exec=pg_query($cnx,$sql1);
            header("location:page1.php");
        }
        else{
            echo "<script>alert(\"Ce Clubs existe deja\")</script>";
        }



    }

}

/* cette fonction permet de supprimer les enregistrements Ajouter dans notre base de données on peut supprimer
les enregistrements qui existe déjà dans notre base de données avant d'ajout */

function SUPRIMERClubs($cnx,$i){
    $sql="SELECT * FROM Carriere where clubs_id='$i' ";
    $result =pg_query($cnx,$sql);
    if(pg_num_rows($result)==0){
        $sql1="DELETE FROM  Clubs WHERE clubs_id='$i'";
        $exec=pg_query($cnx,$sql1);
        header("location:page1.php");
    }
    else{
        echo "<script>alert(\"SUPPRESSION IMPOSSIBLE LES STATISTIQUES DE CE Clubs EXISTE!!!\")</script>";
    }
}



/* les trois fonctions pour ajouter modifier et supprimer les enregistrements pour la table Joueurs de notre base de données */

function MODIFIERJoueurs($cnx,$i,$n1,$n2,$n3,$n4,$n5){
    $count=1;
    $sql="SELECT * FROM Joueurs where jr_id !='$i' ";
    $result =pg_query($cnx,$sql);
    if ($result) {
        while($row = pg_fetch_array($result) ) {
            if(strcasecmp($row[1], $n1) == 0 && strcasecmp($row[2], $n2) == 0 && strcasecmp($row[3], $n3) == 0 && strcasecmp($row[4], $n4) == 0 &&   strcasecmp($row[5], $n5) == 0 ){
                $count=-1;
                break;
            }

        }
        if($count!=-1){
            $sql1="UPDATE Joueurs SET jr_nom ='$n1',jr_prenom ='$n2',jr_naissance='$n3',jr_post='$n4',jr_nationalité='$n5' WHERE jr_id='$i'";
            $exec=pg_query($cnx,$sql1);
            header("location:page3.php");
        }
        else{
            echo "<script>alert(\"Ce Joueur existe deja\")</script>";
        }
    }
}




function AJOUTERJoueurs($cnx,$n1,$n2,$n3,$n4,$n5){
    $count=1;
    $sql="SELECT * FROM Joueurs";
    $result =pg_query($cnx,$sql);
    if ($result) {
        while($row = pg_fetch_array($result) ) {
            if(strcasecmp($row[1], $n1) == 0 && strcasecmp($row[2], $n2) == 0 && strcasecmp($row[3], $n3) == 0 && strcasecmp($row[4], $n4) == 0 && strcasecmp($row[5], $n5) == 0 ){
                $count=-1;
                break;
            }

        }
        if($count!=-1){
            $sql1 = "INSERT INTO Joueurs(jr_nom, jr_prenom, jr_naissance, jr_post,jr_nationalité) VALUES('$n1','$n2','$n3','$n4','$n5')";
            $exec=pg_query($cnx,$sql1);
            header("location:page3.php");
        }
        else{
            echo "<script>alert(\"Ce Joueur existe deja\")</script>";
        }
    }
}

function SUPRIMERJoueurs($cnx,$i){
    $sql="SELECT * FROM Carriere where jr_id='$i' ";
    $result =pg_query($cnx,$sql);
    if(pg_num_rows($result)==0){
        $sql1="DELETE FROM  Joueurs WHERE jr_id='$i'";
        $exec=pg_query($cnx,$sql1);
        header("location:page3.php");
    }
    else{
        echo "<script>alert(\"SUPPRESSION IMPOSSIBLE LES STATISTIQUES DE CE Joueur EXISTE!!!\")</script>";
    }
}



/* les trois fonctions pour ajouter modifier et supprimer les enregistrements pour la table Carriere de notre base de données */


function MODIFIERCarriere($cnx,$i,$clubs_id,$debut , $fin){
    $sql1="UPDATE Carriere SET  clubs_id = '$clubs_id',début ='$debut', fin ='$fin' WHERE Ca_id='$i'";
    $exec=pg_query($cnx,$sql1);
    header("location:page2.php");
}


function AJOUTERCarriere($cnx,$a,$s,$n,$nb){
    $sql="SELECT jr_id  FROM Carriere WHERE jr_id='$a' AND clubs_id='$s'";
    $result =pg_query($cnx,$sql);
    if(pg_num_rows($result)==0){
        $sql1 ="INSERT INTO Carriere(jr_id, clubs_id, début, fin) VALUES ('$a','$s','$n','$nb')";
        $exec=pg_query($cnx,$sql1);
        header("location:page2.php");
    }
    else{
        echo "<script>confirm('Cette Carriere existent déja ') </script>";
    }
}

function SUPRIMERECarriere($cnx,$i){
    $sql1="DELETE FROM  Carriere WHERE Ca_id='$i'";
    $exec=pg_query($cnx,$sql1);
    header("location:page2.php");
}


/* cette fonction vérifie que l'information insérer est une date */
function isValid($date, $format = 'Y-m-d'){
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
}
?>

