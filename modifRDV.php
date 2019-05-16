<?php
include_once "../config.php";
if(isset($_POST['date']) &&isset($_POST['subject'])  && isset($_POST['user']))
{
    $e=$_POST['user'];
    $a=$_POST['date'];
    $c=$_POST['subject'];
    $db=config::getConnexion();
    $req="UPDATE `rdv` SET `DATE_RDV`= ?,`OBJET_RDV`= ?  WHERE  `rdv`.`ID_RDV` = ?";
    $sql=$db->prepare($req);
    $sql->execute([$a,$c,$e]);
    header('Location: RDV.php');
}
?>
