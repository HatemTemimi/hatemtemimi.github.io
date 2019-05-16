<?PHP
include "../entities/Rdv.php";
include "../core/RdvC.php";
require_once "../Views/PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/ProduitIntC.php";
require_once "../Core/AdminsC.php";
include "../core/GestionPanier/paniers.class.c.php";

$panier= new panier();

if (isset($_POST['date']) and isset($_POST['subject']) and ( strtotime ($_POST['date']) > strtotime('now') ) ){
    $date= date_create()->format('Y-m-d');
    $a=$_POST['user'];
    $rdv1=new Rdv($date,$_POST['date'],$_POST['subject'],"en attente",$a);
    $rdv1C=new RdvC();
    $rdv1C->ajouterRDV($rdv1);

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
            $bodyContent = '<h1>Une Rendez-vous Recu</h1>';
            $bodyContent .= '<h2>Ce mail represente votre ticket de rendez-vous</h2>';
            $bodyContent .= '<h3>Do noot Delete.</h3>';
            $mail->Subject = 'Rendez-vous Recu';
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
                $bodyContent = '<h1>Rendez-vous bien recu</h1>';
                $bodyContent .= '<h2>GEOCONCEPT</h2>';
                $bodyContent .= '<h3>ce mail represente votre ticket de reclamation.</h3>';
                $mail->Subject = 'Rendez-vous bien recu';
                $mail->Body = $bodyContent;

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo nl2br ('Message has been sent to : ' . $_SESSION['mdp'] ) ."<br>" ;

        }
    //header('Location:RDV.php');
    echo "<script type=\"text/javascript\">window.alert('Rendez-vous ajoutée avec succés. Vous ne pourez plus modifier ou supprimer apres miniut.');
                window.location.href='RDV.php'</script>";
}else{
    echo "<script type=\"text/javascript\">window.alert('Verifiez votre date.');
                window.location.href='RDV.php'</script>";

}


?>
