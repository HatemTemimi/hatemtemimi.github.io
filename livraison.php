<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GeoConcept &mdash; Livraisons</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

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
	<link rel="stylesheet" href="star.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<?php require 'header.php';
		 ?>
        <?PHP
        include "../core/employeC.php";
        $livreur1C=new LivreurC();
        $listeLivreurs=$livreur1C->afficherLivreurs();
        ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/livraison2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Livraison</h1>

						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-product">
		<div class="container">
            <fieldset style="margin-top:30px;border: #000;border-width: 5px;border-style: dashed;padding: 10px;">
                <legend style="text-align: center;"><h2><strong>Notre liste de Livreurs.</strong></h2></h2></legend>


<table class="table">
<tr style="background-color: #d1c286;">
    <th>Nom</th>
<th>Prenom</th>
<th>Telephonne</th>
<th>Email</th>
<th>Zone</th>
<th>Disponibilite</th>
    <th>Contacter</th>
<th>Notes</th>
</tr>

<?PHP
foreach($listeLivreurs as $row){
	?>
	<tr>

	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['telephonne']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
    <td><?PHP echo $row['zone']; ?></td>
    <td><?PHP if ($row['status']==0)
    { ?>
        <i class="icon-check2 icon" style="font-size: 30px;color: lightgreen" ></i>
        <?php
    }
    else
    { ?>
        <i class="icon-ban" style="font-size: 30px;color: lightcoral;" ></i>
        <?php
    }
    ?>
    </td>
        <td><a href="mailto:<?php echo $row['email'];?>">Contacter</a></td>
	   <td> <form method="POST" action="note.php" name="myForm">
                                                                         <input type="hidden" value="<?php echo $row['cin']; ?>" name="cin" id="cin">
    <span class="star-cb-group">
      <input type="radio" id="rating-5" name="rating" value="5" />
      <label for="rating-5">5</label>
      <input type="radio" id="rating-4" name="rating" value="4" checked="checked" />
      <label for="rating-4">4</label>
      <input type="radio" id="rating-3" name="rating" value="3" />
      <label for="rating-3">3</label>
      <input type="radio" id="rating-2" name="rating" value="2" />
      <label for="rating-2">2</label>
      <input type="radio" id="rating-1" name="rating" value="1" />
      <label for="rating-1">1</label>
      <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" />
      <label for="rating-0">0</label>
    </span>
                                                                         &nbsp;&nbsp;<button style="background: #bbd186;" type="submit" class="btn-sm" style="margin-bottom: 5px;margin-right: 5px;"><i class="icon-check"></i></button>

                                                                        <a href="note.php?cin=<?php echo $row['cin'] ?>&amp;rate="></a>



           </form>
        </td>
	</tr>
	<?PHP
}
?>
</table>
            </fieldset>
		</div>
	</div>

<?php require "footer.php" ?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
