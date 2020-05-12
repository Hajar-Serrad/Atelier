<?php $titre = 'Gestion des élèves'; ?>
<?php ob_start(); ?>
<h1><u> Liste des élèves </u></h1>

<table>
            <tr>

                           <td>CNE</td>

                           <td>Nom</td>

                           <td>Prénom</td>

                           <td>Email</td>

                           <td>Photo</td> 

                           <td>Etat</td>

                           <td>Nombre d'Absences</td>
            </tr>

<?php

foreach ($eleves as $eleve) {

            $et="";

            $lien1="";

            $lien2='ajouterAbs.php?nbr='.$eleve["nbr_abs"].'&cne='.$eleve['cne'];

            if($eleve["etat"])

            {

                           $et="active";

                           $lien1="activer.php?cne=".$eleve["cne"]."&etat=1";

            }

            else

            {

                           $et="desactive";

                           $lien1="activer.php?cne=".$eleve["cne"]."&etat=0";

            }

            ?>

                           <tr>

                           <td><?php echo $eleve["cne"]; ?></td>

                           <td><?php echo $eleve["nom"]; ?></td>

                           <td><?php echo $eleve["prenom"]; ?></td>

                           <td><?php echo $eleve["Email"]; ?></td>

                           <td><img 
                                    <?php static $i=0; 
                                                 $i++; 
                                                echo 'src="./PHOTOS/image'.$i.'.png" '; 
                                    ?>
                                    width="100px" height="100px"/>
                           </td>

                           <td><a href="<?php echo $lien1; ?>"><?php echo $et; ?></a></td>

                           <td><?php echo '<B>'.$eleve["nbr_abs"]."<B/>          "; ?>
                               <a href="<?php echo $lien2; ?>">
                                <img src="./PHOTOS/1.png" alt="Ajouter une absence" title="Ajouter une absence" width="15px" height="15px">
                            </a>   
                           
                           </td>

            </tr>

            <?php

}
            ?>

</table>            

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>