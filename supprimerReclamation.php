<?PHP
include "../core/ReclamationC.php";
$reclamationC=new ReclamationC();
$date= date_create()->format('Y-m-d');
if (isset($_POST["ID_R"])){
    $id=$_POST["ID_R"];
    $d ="SELECT NOW_R FROM reclamation WHERE ID_R = '$id' ";
    $bd = config::getConnexion();
    $liste=$bd->query($d);
    foreach($liste as $row) {
        echo $row['NOW_R'];
        if ($date <= $row['NOW_R']) {
            $reclamationC->supprimerReclamation($_POST["ID_R"]);

            //header('Location: contact.php');
            echo "<script type=\"text/javascript\">window.alert('Reclamation supprimée.');
                window.location.href='contact.php'</script>";

        }
        else
        {
            echo "<script type=\"text/javascript\">window.alert('Vous ne pouvez plus supprimer.');
                window.location.href='contact.php'</script>";
        }
    }
}

?>