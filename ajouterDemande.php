<?PHP
include "../entities/Demande.php";
include "../core/DemandeC.php";
require_once "../Views/PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/ProduitIntC.php";
require_once "../Core/AdminsC.php";
include "../core/GestionPanier/paniers.class.c.php";

$panier= new panier();

if (isset($_POST['lname']) and isset($_POST['num']) and isset($_POST['subject']) and isset ($_POST['message'])){
    $date= date_create()->format('Y-m-d');
    $a=$_POST['user'];
$demande1=new Demande($date,$_POST['lname'],$_POST['num'],$_POST['subject'],$_POST['message'],"en attente",$a);
$demande1C=new DemandeC();
$demande1C->ajouterDemande($demande1);


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
            $bodyContent = '<h1>Demande bien recu</h1>';
            $bodyContent .= '<h2>Ce mail represente votre ticket de demande</h2>';
            $bodyContent .= '<h3>Do noot Delete.</h3>';
            $mail->Subject = 'Demande Recu';
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
                $bodyContent = '<h1>Demande bien recu</h1>';
                $bodyContent .= '<h2>GEOCONCEPT</h2>';
                $bodyContent .= '<h3>ce mail represente votre ticket de demande do not delete</h3>';
                $mail->Subject = 'Demande bien recu';
                $mail->Body = $bodyContent;

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo nl2br ('Message has been sent to : ' . $_SESSION['mdp'] ) ."<br>" ;

        }
 //header('Location:demande.php');
    echo "<script type=\"text/javascript\">window.alert('demande ajoutée avec succes. Vous ne pourrez plus modifier ou supprimer apre miniut.');
                window.location.href='demande.php'</script>";

}else{
    echo "<script type=\"text/javascript\">window.alert('champs invalides.');
                window.location.href='demande.php'</script>";
}
//*/

?>
