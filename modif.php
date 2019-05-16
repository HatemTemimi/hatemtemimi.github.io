<?php
include "../config.php";

if(isset($_POST['lname']) && isset($_POST['num']) && isset($_POST['details']) && isset($_POST['user'])&&isset($_POST['subject']))
{
    $e=$_POST['user'];
    $a=$_POST['lname'];
    $b=$_POST['num'];
    $c=$_POST['details'];
    $d=$_POST['subject'];
    $db=config::getConnexion();
    $req="UPDATE `demande` SET `NOM_D` = ?, `NUM_D` = ?, `OBJET_D`= ?,`DETAILS_D` = ? WHERE `demande`.`ID_D` = ?";
    $sql=$db->prepare($req);
    $sql->execute([$a,$b,$d,$c,$e]);
    header('Location: demande.php');
}
?>
