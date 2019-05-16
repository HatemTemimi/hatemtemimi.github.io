<?PHP
include_once "../config.php";
require_once '../core/GestionPanier/paniers.class.c.php';
$db = config::getConnexion();
$panier= new panier();


if (isset($_SESSION['cin']) and $_SESSION['cin'] > 0 )
{
    $getcin=$_SESSION['cin'];
    $bdd = config::getConnexion();
    $requser=$bdd->prepare('SELECT * FROM membres WHERE cin = ?');
    $requser->execute(array($getcin));
    $userinfo = $requser->fetch();
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <title>Geoconcept &mdash; Vente et Location Meubles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="gettemplates.co" />


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/modal.css">
    <!--<link rel="stylesheet" href="../Views/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    <!--fontawesome -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>


    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="store.js" async></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->


    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-2">
                    <div id="fh5co-logo"><a href="index.php"><!--img src="images/logosn.png" alt="" width="35" style="margin: -4px 5px 0px 10px;" /-->GeoConcept.</a></div>
                </div>
                <div class="col-md-6 col-xs-6 text-center menu-1" data-animate-effect="fadeIn">
                    <div class=" btn btn-group">
                        <ul style="margin: auto">
                            <li class="has-dropdown">
                                <a href="product.php" class="" style="font-size: x-large;"><i class="fa fa-couch"></i></a>
                                <ul class="dropdown">
                                    <li><a href="product.php">Produit Intérieur</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="product2.php" class="" style="font-size: x-large;margin-left: 10px;"><i class="fa fa-umbrella-beach"></i></a>
                                <ul class="dropdown">
                                    <li><a href="product2.php">Produit Extérieur</a></li>
                                </ul>
                            </li>

                            <li class="has-dropdown">
                                <a href="Louer.php" class="" style="font-size: x-large;margin-left: 10px;"><i class="fa fa-truck-loading"></i></a>
                                <ul class="dropdown">
                                    <li><a href="Louer.php">Location</a></li>

                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="FAQ.php" class="" style="font-size: x-large;margin-left: 10px;"><i class="fa fa-question-circle fa-spin"></i></a>
                                <ul class="dropdown">
                                    <li><a href="FAQ.php">Questions</a></li>

                                </ul>
                            </li>
                            <?php if(isset($_SESSION['cin'])){ ?>
                                <li class="has-dropdown">
                                    <a href="contact.php" style="font-size: x-large;"><i class="fa fa-address-book"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="RDV.php">Rendez-vous</a></li>
                                        <li><a href="demande.php">Demandes</a></li>
                                        <li><a href="contact.php">Reclamer</a></li>

                                    </ul>

                                </li>
                                <li class="has-dropdown">
                                    <a href="addfavoris.php" style="font-size: x-large;"><i class="fa fa-star fa-spin"></i></a>

                                </li>
                                <li class="has-dropdown">
                                    <a href="afficherCommentaires.php" style="font-size: x-large;"><i class="fa fa-comment"></i></a>

                                </li>

                            <?php } ?>

                            <?php if(!isset($_SESSION['cin'])){ ?>
                                <li><a href="signin.php" class="" style="font-size: x-large;margin-left: 10px"><i class="fa fa-sign-in-alt"></i></a></li>
                            <?php } ?>

                        </ul>
                    </div>

                    <script src="../Views/js/vendor/jquery-1.12.4.min.js"></script>
                </div>
                <script>
                    $('.spinner').hover(function() {
                        $(this).addClass('fa-spin');
                    });
                    $('.pulseer').hover(function() {
                        $(this).addClass('fa-pulse');
                    });
                </script>
                <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                    <ul>
                        <li class="search">
                            <div class="input-group">
                                <form role="search" method="POST" action="rechercher_produits.php">
                                    <input type="text" name="search" placeholder="..">
                                    <span class="input-group-btn">
						        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
						      </span>
                                </form>

                            </div>
                        </li>
                        <div style="display: flex;">
                            <li class="shopping-cart">

                                <div class="input-group mb-3" style="margin-top:10px; ">
                                    <a href="Panier.php" name="TotalProduits" style="font-size: 18px;color: #d1c286;"><span><small class="countcart"><?php echo $panier->count(); ?></small><i class="icon-shopping-cart"></i></span></a>
                                </div>
                            </li>
                            <?php if(isset($_SESSION['cin'])){ ?>
                                <li class="has-dropdown">
                                    <div style="margin-left:80px; ">
                                        <?php


                                        if (!empty($userinfo['avatar'])) {
                                            ?>
                                            <a href="profile.php"><img src="membres/avatars/<?php echo $userinfo['avatar'];?>" style=" border-radius: 50%;  width: 40px; height: 40px;"/></a>

                                            <ul class="dropdown" style="margin-left:80px; width:80px;">
                                                <li><a href="profile.php" class="deja2">Profile</a></li>
                                                <li><a href="livraison.php" class="deja2">livreur</a></li>
                                                <li><a href="logout.php" class="deja2">logout</a></li>
                                            </ul>
                                            <?php
                                        }
                                        else {
                                            ?>

                                            <a href="profile.php"><img src="images\profileicon3.jpg" style=" border-radius: 50%;  width: 40px; height: 40px;"/></a>

                                            <ul class="dropdown" style="margin-left:80px; width:80px">
                                                <li><a href="profile.php" class="deja2">Profile</a></li>
                                                <li><a href="logout.php" class="deja2">logout</a></li>
                                            </ul>
                                            <?php
                                        }
                                        ?>




                                </li>
                            <?php } ?>
                        </div>      	</ul>
                </div>

            </div>

        </div>
    </nav>
