<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once"pdoConnexion.php";
        try {
            $requet_nbc = "SELECT COUNT(`ID_N`) FROM `nounou` ,`compte` WHERE `nounou`.`Email`=`compte`.`login` AND `compte`.`status`=1;";
            $requet_nbi = "SELECT COUNT(`ID_N`) FROM `nounou` ,`compte` WHERE `nounou`.`Email`=`compte`.`login` AND `compte`.`status`=2;";
            $nb1 = $dbh->query($requet_nbc);
            $nb2 = $dbh->query($requet_nbi);
            $nb_c = $nb1->fetch();
            $nb_i = $nb2->fetch();
            echo "Le nombre de nounous en attene de validation: " . $nb_c[0] . "<br />";
            echo "Le nombre de nounous validées: " . $nb_i[0] . "<br /><br/>";
           
            $requet = "SELECT * FROM `nounou`,`compte` WHERE `nounou`.`Email`=`compte`.`login` AND `compte`.`status`=1;";
            $resultats = $dbh->query($requet); 
            } catch (PDOException $e) {
                die("Error!: " . $e->getMessage() . "<br/>");
            }
            ?>
        <h1>
            Vous êtes administrateur, vous avez 3 options：
        </h1>
        <a href="validerNounou.php">
            Valider des nounous
        </a>
        <a href="bloquerNounou.php">
            Bloquer des nounous
        </a>
        <a href="librerNounou.php">
            Librer des nounous
        </a>
    </body>
</html>
