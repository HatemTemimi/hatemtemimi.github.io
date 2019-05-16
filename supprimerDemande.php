<?PHP
include "../core/DemandeC.php";
$demandeC=new DemandeC();
$date= date_create()->format('Y-m-d');
//var_dump($date);
if (isset($_POST["ID_D"])){
    $id=$_POST["ID_D"];
    $d ="SELECT DATE_DEMANDE FROM demande WHERE ID_D = '$id' ";
    $bd = config::getConnexion();
    $liste=$bd->query($d);
    //var_dump($liste);
    foreach($liste as $row) {
        echo $row['DATE_DEMANDE'];
        if ($date <= $row['DATE_DEMANDE']) {
            $demandeC->supprimerDemande($_POST["ID_D"]);
             //header('Location: demande.php');
            echo "<script type=\"text/javascript\">window.alert('Demande Supprimée.');
                window.location.href='demande.php'</script>";
        } else
            echo "<script type=\"text/javascript\">window.alert('Vous ne pouvez plus supprimer.');
                window.location.href='demande.php'</script>";
    }
}

?>