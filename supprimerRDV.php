<?PHP
include "../core/RdvC.php";
$rdvC=new RdvC();
$date= date_create()->format('Y-m-d');
if (isset($_POST["ID_RDV"])){
    $id=$_POST["ID_RDV"];
    $d ="SELECT NOW_RDV FROM rdv WHERE ID_RDV = '$id' ";
    $bd = config::getConnexion();
    $liste=$bd->query($d);
    //var_dump($liste);
    foreach($liste as $row) {
        echo $row['NOW_RDV'];
        if($date <= $row['NOW_RDV']) {

            $rdvC->supprimerRDV($_POST["ID_RDV"]);
            //header('Location: RDV.php');
            echo "<script type=\"text/javascript\">window.alert('Rendez-vous supprimé.');
                window.location.href='RDV.php'</script>";
        }
        else {
            echo "<script type=\"text/javascript\">window.alert('Vous ne pouvez plus supprimer.');
                window.location.href='RDV.php'</script>";
        }
    }

}

?>