<?PHP
session_start();
include '../core/membreC.php';



if(isset($_POST['SignIn'])){
    $membre = new MembreC;

    $email='';
    $motdepasse='';


    if((isset($_POST['email']))&&(isset($_POST['password']))){   
        $email_membre= $_POST['email'];
        $motdepasse_membre=$_POST['password'];
        $motdepassecrypte=md5($motdepasse_membre);

        $tab = $membre->connexion($email_membre,$motdepassecrypte);
                if (is_array($tab) || is_object($tab))
                {
                    foreach($tab as $row)
                    {
                        $_SESSION['email']=$email=$row['email'];
                        $_SESSION['mdp']=$motdepasse=$row['mdp'];
                        $mdp=md5($motdepasse);
                        $_SESSION['prenom']=$prenom=$row['prenom'];
                        $_SESSION['nom']=$nom=$row['nom'];
                        $_SESSION['cin']=$cin=$row['cin'];
                        $_SESSION['sexe']=$sexe=$row['sexe'];
                        $_SESSION['num_tel']=$telephone=$row['num_tel']; 
                        $_SESSION['date_naissance']=$datedenaissance=$row['date_naissance'];                       
                    } 
                }
            if(($email_membre==$email)&&($motdepassecrypte==$motdepasse))
            {
                header('Location: product.php');
            }
            else{
                echo "ERREUR: Vérifier votre email et mot de passe!!"; 
            }
        }
}

if(!empty($_SESSION['cin'])) {
header('Location: product.php');
}
?>


<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <script src="scripts.js"></script>

    <!-- Title Page-->
    <title>Connexion</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <link href="https://fontawesome.com/icons?d=gallery" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>

function myFunction() {
  var x = document.getElementById("myInput");
  var eye = document.getElementById("eye");
  if (x.type === "password") {
    x.type = "text";
    eye.toggleClass("fa fa-eye");
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("myInput");

  
    x.type = "password";
 
  
}

    </script>

    <style>
   .fa{
    position: absolute;
    left:230px;
    top:10px;
    font-size: 18px;
    cursor: pointer;
    color: #999;
   }
   .fa.active{
    color: dodgerblue;
   }


    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Connexion Info</h2>



                    <form method="POST" action="">
                    
                        <div class="input-group">
                             <input class="input--style-1" type="email" placeholder="ADRESSE EMAIL" name="email" required>
                        </div>

                        <div class="input-group">
                             <input class="input--style-1" type="password" placeholder="MOT DE PASSE" name="password" id="myInput" required>
                             <input class="fa fa-eye-slash" type="checkbox" onmousedown="myFunction()" onmouseup="myFunction2()" style="margin-left: 48%; margin-top: -5px;" id="eye">
                             
                        </div>

                         
                        <div class="forgot"><a href="recuperation.php">Mot de passe oublié?</a></div></br>


                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="SignIn">Connexion</button>
                        </div>

                        <div class="membre"><a href="signup.php" class="deja2">Inscrivez-vous?</a></div>  

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->