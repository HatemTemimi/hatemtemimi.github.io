<?php

require_once "../entities/membre.php";
require_once "../core/membreC.php";

var_dump ($_GET["terme"]);
	$membreC=new MembreC();
	$list=$membreC->rechercheClient($_GET["terme"]);


}
?>



<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clients</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">


            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="#"><img src="img/logo/Lola.jpg" alt="" /></a>
					<h2> <span class="min-dtn">GEOCONCEPT.</span></h2>
				</div>

			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" >
								   <i class="icon nalika-bar-chart icon-wrap"></i>
								   <span class="mini-click-non">Ajouter un détail</span>
								</a>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">


        <!-- clieeeeeeeeeeeeeennnnnnnnnts-->
        <div class="product-status mg-b-30" style="margin-top:50px;">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                          <div>
                            <h4>Liste des Clients</h4>
                          </div>


    <form action = "rechercheClient.php" method = "get">
        <div class="input-group mb-3" >
          <input type="text" class="form-control"placeholder="Search..." aria-label="" aria-describedby="basic-addon1" style="color:white;" name="terme">
        </div>

        <div class=" mb-2" style="margin-left:6px; margin-top:5px;">
           <input type="submit" name="recherche" value="OK" style="
        background-color:#6090;
        border-style: outset;

        border-radius: 5px;
        border-color: black;

        padding: 6px;
        background-color: rgb(255, 255, 255); " >

        <?php var_dump($ListetooC) ?>

        </div>
    </form>


    <form action="Users.php" method="GET">
    <div style="display: flex;">
    </div>
    </form>


                            <div class="add-product">

                            </div>
                            <table style="background-color:#6090;">
                               <tr>

                                    <th>CIN</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Mdp</th>
                                    <th>Num tél</th>
                                    <th>Sexe</th>
                                    <th>Date_naissance</th>
                                    <th>Suppression</th>


                                </tr>
                                <tr>


                                <?php
                                     foreach ($list as $row)
                                    {


                                        echo '<tr>';
                                        echo '<td class="td2">'.$row['cin'].'</td>';
                                        echo '<td class="td2">'.$row['nom'].'</td>';
                                        echo '<td class="td2">'.$row['prenom'].'</td>';
                                        echo '<td class="td2">'.$row['email'].'</td>';
                                        echo '<td class="td2">'.$row['mdp'].'</td>';
                                        echo '<td class="td2">'.$row['num_tel'].'</td>';
                                        echo '<td class="td2">'.$row['sexe'].'</td>';
                                        echo '<td class="td2">'.$row['date_naissance'].'</td>';
                                       /*
                                        echo '<td class="td2">'?> <button class="btn btn--radius btn--green" type="submit" style="color:black" onclick="location.href='modifierUsers.php?cin=<?php echo $row['cin']; ?>'"> Modifier </button> <?php '</td>';
                                        */
                                        echo '<td class="td2">'?> <button class="btn btn--radius btn--red" type="submit" nom="supprimer" style="color:black" onclick="location.href='supprimerUsers.php?cin=<?php echo $row['cin']; ?>'"> Supprimer </button><?php '</td>';
                                        echo '</tr>';
                                    }
                                 ?>

                                </tr>
                            </table>


                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="index.php">Retour</a></li>

								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>


    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>

    <!-- Modernizr JS -->
    <script src="../views/js/modernizr-2.6.2.min.js"></script>
    <!-- jQuery -->
    <script src="../views/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="../views/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="../views/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="../views/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="../views/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="../views/js/jquery.countTo.js"></script>
    <!-- Flexslider -->
    <script src="../views/js/jquery.flexslider-min.js"></script>
    <!-- Main -->

    <script src="../views/js/main.js"></script>
    	<script type="text/javascript" src="../views/app.js" ></script>
</body>

</html>
