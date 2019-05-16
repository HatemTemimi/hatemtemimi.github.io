<?php
    include "../config.php";
    $db = config::getConnexion();
    if (isset($_GET['id']))
    {
        $num=$_GET['id'];
        $sql = "SELECT * FROM  produits where num=".$num;
        $req = $db->prepare($sql);
        $req->execute();
        $liste = $req->fetchAll(PDO::FETCH_OBJ);

        // Convert Array to JSON Obj
        $someJSON = json_encode($liste);
        echo $someJSON;
    }

?>