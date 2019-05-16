<?php
include "../core/GestionPanier/paniers.class.c.php";
include "../entities/commande/commande.class.php";
include "../core/GestionCommande/commande.class.c.php";

$panier= new panier();
 $totalPrix=$panier->recalculer($_POST["panier"]["qte"]);
if(isset($_SESSION['cin']))
{

$listeC1=array();
$listeC=array();
if (isset($_POST["panier"]["qte"])) {
//var_dump($_POST);


 $nbProduit=$panier->Total_nb($_POST["panier"]["qte"]);
 $totalQTE=(int)$panier->Total_QTE($_POST["panier"]["qte"]) ;
 $IDClient=(int)$_SESSION['cin'];

  $NomProduit= $panier->listeNom($_POST["panier"]["qte"]);
  $IdProduit= $panier->listeID($_POST["panier"]["qte"]);
  $PrixProduits= $panier->listePrix($_POST["panier"]["qte"]);

 $QTEProduits= $panier->listeQTE($_POST["panier"]["qte"]);



$commande1=new commande($nbProduit,$totalPrix,$IDClient);
$commande1C=new commandeC();
$commande1C->ajouterCommande($commande1);
$listeC=$commande1C->afficherCommandeEnCours($commande1);

//$listeC=$commande1C->afficherCommandeEnCours($commande1);
$i=0;
foreach ($listeC as $key => $value) {
  // code...

  if($i==0)
  $id_commande = (int)$value;

  if($i==4)
  $id_client =$value;

  if($i==1)
  $date_commande =$value;

  if($i==2)
  $totalPrix_commande =$value;

  if($i==3)
  $nbProduit_commande =$value;

  $i++;
}

$listeC1=array($id_commande,$date_commande,$nbProduit_commande,$id_client,$totalPrix_commande);

$commandeD1=new commandeDetails($id_commande,$NomProduit,$IdProduit,$PrixProduits,$QTEProduits);

$commande1C->ajouterDetailsCommande($commandeD1,(int)$nbProduit_commande);



$panier->addCommandeVirtuelle($listeC1);
var_dump($listeC1);
/*
?>
<?php
require_once "../Views/PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/ProduitIntC.php";
require_once "../Core/AdminsC.php";
$temp = new AdminsC();
$listeadmins = $temp->afficherAdmins();
$produit1C=new ProduitIntC();
$rupture=$produit1C->RuptureStock();
//var_dump($rupture);

        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;// TCP port to connect to
        //echo $row['email'];
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        //$mail->Username = 'elreb7chich';          // SMTP username
        //$mail->Password = 'plataoplomo1994';
        $mail->Username = 'hatem.temimi@esprit.tn';          // SMTP username
        $mail->Password = 'neverbackdownX512';// SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

    foreach($listeadmins as $row) {
        $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        //$mail->addAddress('nour.khedher@esprit.tn ');
        //$mail->addAddress('elreb7chich@gmail.com ');
        $mail->addAddress($row['email'],$row['login']);// Add a recipient
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML
        //$mail->addAttachment('img/img.png');
        $bodyContent = '<h1>Une Commande est envoyee</h1>';
        $bodyContent .= '<h2>Un client vous a envoye une commande</h2>';
        $bodyContent .= '<h3>Visitez Votre Dashboard Admin.</h3>';
        $mail->Subject = 'Une commande Envoyee';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo nl2br ('Message has been sent to : ' . $row['login'] ) ."<br>" ;
        }
      }

            $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
            $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
            //$mail->addAddress('nour.khedher@esprit.tn ');
            //$mail->addAddress('elreb7chich@gmail.com ');
            $mail->addAddress($_SESSION['email'],$_SESSION['mdp']);// Add a recipient
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML
            //$mail->addAttachment('img/img.png');
            $bodyContent = '<h1>Une Commande est envoyee</h1>';
            $bodyContent .= '<h2>GEOCONCEPT</h2>';
            $bodyContent .= '<h3>Merci pour votre confiance</h3>';
            $mail->Subject = 'Une commande est Envoyee';
            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo nl2br ('Message has been sent to : ' . $_SESSION['mdp'] ) ."<br>" ;

    }

?>
<?php

$key = "6c8f177f-8f0d-4ef1-9c4b-3f93dbf23e98";
$secret = "dijltWNmpUua9e/bZ+t07w==";
$phone_number = "+21695164507";

$user = "application\\" . $key . ":" . $secret;
$message = array("message"=>"Vous avez enoye une commande");
$data = json_encode($message);
$ch = curl_init('https://messagingapi.sinch.com/v1/sms/' . $phone_number);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERPWD,$user);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$result = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo $result;
}*/


header('location:commande.php');
}
}
else {
  $_SESSION["page"]=array();
  $_SESSION["page"]="addCommande.php";
  header('location:signin.php');
}
//header('location:commande.php');

 ?>
