<?php
include '../entities/membre.php';
include '../core/membreC.php';

$test = $_GET['cin'];
$m=new membreC;
$membre = $m->afficherMembre($test);
?>



<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
   

    <!-- Title Page-->
    <title>Profile</title>

    

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">




    <script>
        

function CheckPassword() {


var password = document.getElementById("mdp").value;

var password2 = document.getElementById("mdp2").value;

var error= document.getElementById("labelMdp");


if (password.length != 0 && password2.length != 0){

    if (password.length < 8) {
        error.innerHTML="Mot de passe trop court: entrez > 8 caratère svp.";
        return false; 
    }

    else if (password2 != password ) {
        error.innerHTML="Mot de passe differents.!";
        return false;
    }
    else
    {
         error.innerHTML="";
    }
}

}



function CheckNum() {

var num = document.getElementById("num_tel");

ch = num.value.substr(0, 1);
alert(ch);
var error= document.getElementById("labelNum");


if (num.length ==8 ) {
    for (i=0;i<num.length;i++) {
           
            if ( num.charAt(i)>"0" || num.charAt(i)<"9" )  {
                error.innerHTML="";
                return true;
            }
            else if ( (ch == "2") || (ch == "5") || (ch == "9") )  {
               error.innerHTML="";
                return true;
            }
            else {
                 error.innerHTML="Numéro de tél en tunisie svp.";
                return false;
            }
        }
}

else {
    error.innerHTML="Numéro de tél > 8 ou pas en Tunisie.";
    return false;
}

}


    </script>

</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Votre compte</h2>



                    <form method="POST" action="modifierCompte.php">


<!--
                        <div>
                            <img src="images\profileicon2.jpg"></br></br>
                        </div>
-->
                        
                            <center><div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="password" placeholder="ANCIEN MOT DE PASSE" name="amdp" id="amdp" style="text-align:center;">
                                </div>
                            </div></center>
                            
                       <div class="row row-space">

                        
                               
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="password" placeholder="NOUVEAU MOT DE PASSE" name="mdp" id="mdp" onblur="CheckPassword()">
                                     <label id="labelMdp" style="color:#b7a868;"></label>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="password" placeholder="RESAISIR MOT DE PASSE" name="mdp2" id="mdp2" onblur="CheckPassword()">
                                     <label id="labelMdp" style="color:#b7a868;"></label>
                                </div>
                            </div>
                        </div></br></br></br>


                        <!--
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NOUVEAU NUMERO DE TEL" name="tel" id="tel" value="<?php/* echo $membre['num_tel'];*/ ?>" >
                                </div>
                            </div>
                        -->

                        <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NOUVEAU NUMERO DE TEL" name="num_tel" id="num_tel " onblur="CheckNum()">
                                    <label id="labelNum" style="color:#b7a868;"></label>
                                </div>
                            </div>

                       
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" href="recuperation.php" onclick="return CheckPassword()">Confirmer</button>                           
                        </div>

                        

                        <!--<div class="desactiver">
                           <input class="boutdesac" type="submit" href="profile.php" >
                        </div>-->

                        <div class="desactivericon">
                            <div class="forgot" style="padding-top: 50%; padding-left: 50%;">
                                <!--<img src="images\desac.png"><a class="boutdesac" href="profile.php" >Retour.</a>-->
                                <a href="profile.php" class="boutdesac" ><img src="images\retour.png"></a> 
                            </div></br>
                        
                        </div>

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
    <!--<script src="js/scripts.js"></script>-->



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
