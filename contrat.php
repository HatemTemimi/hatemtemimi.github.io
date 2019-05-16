


<?php
include_once "../config.php";
require "fpdf.php";

include_once "../core/locationC.php";


//$db=new PDO('mysql:host=localhost;dbname=pac', 'root', '');

class myPDF extends FPDF{
        function header(){
            $this->Image('mer.jpg',10,6);
            $this->SetFont('Arial','B',30);
            $this->SetTextColor(88, 41, 0);
            $this->Cell(276,5,'DEMANDE DE LA LOCATION',0,0,'C');
            $this->Ln();
           // $this->SetFont('Times','',12);
         //   $this->Cell(276,10,'AAASSSLEMAAAA',0,0,'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
           
            $this->Cell(0,5,'Page  '.$this->PageNo().'/{nb}',0,0,'C');
         
  }
        function HeaderTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(50,15,'ID DE LOCATION  ',1,0,'C');
            $this->Cell(20,15,'ID  ',1,0,'C');
            $this->Cell(40,15,'NAME  ',1,0,'C');
            $this->Cell(20,15,'PRIX  ',1,0,'C');
            $this->Cell(20,15,'QTE  ',1,0,'C');
        
            $this->Cell(50,15,'DATE DEBUT  ',1,0,'C');
            $this->Cell(50,15,'DATE FIN  ',1,0,'C');
            $this->Cell(50,15,'VOTRE ID  ',1,0,'C');
           
            $this->Ln();

          
        }
       /* function viewtable($db){
            $this->SetFont('Times','',12);
            $stmt = $db->query('select * from loc ');
            while($data = $stmt->fetch(PDO::FETCH_OBJ)){
                $this->Cell(20,10,$data->idloc,1,0,'C');
                $this->Cell(40,10,$data->nom,1,0,'L');
                $this->Cell(20,10,$data->qte,1,0,'L');
                $this->Cell(20,10,$data->prix,1,0,'L');
                $this->Cell(50,10,$data->dateLoc,1,0,'L');
                $this->Cell(50,10,$data->datedeb,1,0,'L');
                $this->Cell(50,10,$data->datefin,1,0,'L');
                $this->Ln();
            }
        }*/
     /*   function viewtable(){
            $location1C= new locationC();
            $liste=$location1C->Afficher();
            foreach($liste as $row){ 

              $this->Cell(20,10,$row['idloc'],1,0,'C');
                $this->Cell(40,10,$row['nom'],1,0,'L');
                $this->Cell(20,10,$row['prix'],1,0,'L');
                $this->Cell(20,10,$row['dateLoc'],1,0,'L');
                $this->Cell(50,10,$row['datedeb'],1,0,'L');
                $this->Cell(50,10,$row['id_client'],1,0,'L');
                $this->Cell(50,10,$row['idLocc'],1,0,'L');
                $this->Ln(); 




                }
        }*/

        function viewtable(){
        
          $location1C= new locationC();
          $liste=$location1C->Afficher();
         
          foreach($liste as $row){ 
            $this->Cell(50,10,$row['idLocc'],1,0,'L');
              $this->Cell(20,10,$row['idloc'],1,0,'C');
             $this->Cell(40,10,$row['nom'],1,0,'C');
              $this->Cell(20,10,$row['prix'],1,0,'L');
              $this->Cell(20,10,$row['qte'],1,0,'L');
              $this->Cell(50,10,$row['datedeb'],1,0,'L');
              $this->Cell(50,10,$row['datefin'],1,0,'L');
              $this->Cell(50,10,$row['id_client'],1,0,'L');
             
              $this->Ln(); 


              }
            
            }
      

        function paragraphe(){
            $this->SetFont('Times','B',20);
            $this->SetTextColor(88, 41, 0);
            $this->Text(60,140,'Votre demande de location a ete envoyee avec succees  ');
            $this->SetFont('Arial','B',12);
            $this->SetTextColor(0,0,0);
            $this->Text(110,150,'Merci Pour Votre Confiance ');
            $this->SetTextColor(0,0,0);
            $this->SetFont('Helvetica','I',12);
            $this->Text(10,170,'o  Afin de valider votre location, s"il vous plait imprimer ce contrat et soignez-le chez la mairie.  ');
            $this->Text(10,175,'o     Vous aurez une autre copie lors de la prise de vos produits.');
            $this->SetTextColor(0,0,0);
            $this->SetFont('Helvetica','U',16);
            $this->Text(10,190,'IMPORTANT ');
            $this->SetFont('Helvetica','I',14);
            $this->Text(10,200,'Prenez soins des Equipements sinon vous payerez les degats. ');
            $this->SetTextColor(164,74,19);
            $this->Image('signe.png',230,176);
            $this->Text(230,185,'GEOCONCEPT. ');
            $this->SetTextColor(0,0,0);
        }


}
  $pdf=new myPDF ();    
  $pdf->AliasNbPages();

  $pdf->AddPage('L','A4',0);
 
  $pdf->HeaderTable();
  $pdf->viewtable();
  $pdf->paragraphe();
  

  $pdf->Output();
?>