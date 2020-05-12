<?php 
 if (isset($_POST['oui'])) 
{
  require_once('Modele.php');
  try {
    $bdd = getBdd();
  }
  catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
  }
  
  $cne=$_POST['cne'];
  $nbr=(int)$_POST['nbr'] + 1;
  $bdd->query("UPDATE eleves SET nbr_abs='$nbr' WHERE cne='$cne'");
  if($nbr >= 3)
  {
    $bdd->query("UPDATE eleves SET etat='0' WHERE cne='$cne'");
  }
  
  header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
 <head>
	<title>Gérer les absences</title>
 </head>
 <body>
    
    <h3>Etes-vous sûrs de vouloir marquer l élève 
        <?php 
          echo $_GET['cne'];
        ?>
    comme absent  ?</h3>
   
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     <input type="hidden" name="cne" value="<?php echo  $_GET['cne'];?>">
     <input type="hidden" name="nbr" value="<?php echo  $_GET['nbr'];?>">

     <input type="submit" name="oui" value="OUI"> 
     <button> <a href="index.php"> NON  </a> </button>
   </form>
 </body>
</html>