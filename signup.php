<?php

session_start();

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
    <title>Inscription</title>



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
    

    
</head>

<body>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Créer un compte</h2>



                    <form method="POST" action="ajoutMembre.php">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NOM" name="nom" id="nom" onblur="CheckNom()">
                                    <label id="ip" style="color:#b7a868;" ></label>
                                </div>
                                

                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="PRENOM" name="prenom" id="prenom" onblur="CheckPrenom()">
                                    <label id="labelPren" style="color:#b7a868;"></label>
                            </div>
                            </div>

                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="DATE DE NAISSANCE" name="date_naissance" id="date_naissance">
                                     <label id="labelBd" style="color:#b7a868;"></label>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar" ></i>
                                </div>
                            </div>


                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="sexe">
                                            <option disabled="disabled" selected="selected">SEXE</option>
                                            <option>Homme</option>
                                            <option>Femme</option>
                                            <option>Autre</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                             <input class="input--style-1" type="text" placeholder="Numéro CIN" name="cin" id="cin" onblur="CheckCin()">
                              <label id="labelCin" style="color:#b7a868;"></label>
                        </div>

                        <div class="input-group">
                             <input class="input--style-1" type="text" placeholder="ADRESSE EMAIL" name="email" id="email" onblur="CheckMail()">
                             <label id="labelMail" style="color:#b7a868;"></label>
                        </div>

                        <div class="input-group">
                             <input class="input--style-1" type="password" placeholder="MOT DE PASSE" name="mdp" id="mdp" >
                        </div>


                        <div class="input-group">
                             <input class="input--style-1" type="password" placeholder="RESAISIR LE MOT DE PASSE" name="mdp2" id="mdp2" onblur="CheckPassword2()">
                             <label id="labelMdp" style="color:#b7a868;"></label>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="+216" name="num_tel" id="num_tel" onblur="CheckNum()" >
                                    <label id="labelNum" style="color:#b7a868;"></label>
                                </div>
                            </div>
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name ="signup" onclick="return Controle()">S'inscrire</button>
                        </div>

                        <div class="membre"><a href="signin.php" class="deja">Déjà inscrit?</a></div>

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
    <script src="js/scripts.js"></script>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
