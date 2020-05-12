<?php

       function getEleves() {
        $bdd = getBdd();
        $eleves = $bdd->query('select nom,prenom,cne,Email,etat,nbr_abs from eleves');
        return $eleves;
       }

       function getBdd() {
        $bdd = new PDO('mysql:host=localhost;dbname=ensa;charset=utf8', 'root',
                        '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd; }

?>     