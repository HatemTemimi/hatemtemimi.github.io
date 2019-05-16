<?php
include "../config.php";
if(isset($_POST['subject']) &&isset($_POST['message']))
{
    $e=$_POST['user'];
    $a=$_POST['subject'];
    $c=$_POST['message'];
    $db=config::getConnexion();
    $req="UPDATE `reclamation` SET `OBJET_R`= ?,`DETAILS_R`= ?  WHERE  `reclamation`.`ID_R` = ?";
    $sql=$db->prepare($req);
    $sql->execute([$a,$c,$e]);
    header('Location: contact.php');
}
?>
