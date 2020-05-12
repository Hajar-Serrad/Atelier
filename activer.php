<?php 
  if (isset($_POST['oui'])) {
    require_once('Modele.php');
    try {
      $bdd = getBdd();
    }
    catch (Exception $e) {
      $msgErreur = $e->getMessage();
      require 'vueErreur.php';
    }
 
  $cne=$_POST['cne'];
  $etat=!$_POST['etat'];
  $bdd->query("UPDATE eleves SET etat='$etat' WHERE cne='$cne'"); 
  header('location:index.php');
 }
?>

<!DOCTYPE html>
<html>
 <head>
	<title><?php echo ($_GET['etat']?'ACTIVER':'DESACTIVER'); ?></title>
 </head>
 <body>
  <h2>Etes-vous sûrs de vouloir <?php echo ($_GET['etat']?'Desactiver':'activer').' eleve '.$_GET['cne'];  ?>? </h2>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <input type="hidden" name="cne" value="<?php echo  $_GET['cne'];?>">
     <input type="hidden" name="etat" value="<?php echo  $_GET['etat'];?>">
     <input type="submit" name="oui" value="OUI">
     <button> <a href="index.php"> NON </a> </button>
   </form>
 </body>
</html>
