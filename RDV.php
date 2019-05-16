<?php
require_once 'header.php';
if (isset($_SESSION['cin'])){
include_once '../core/RdvC.php';
$rdvc= new RdvC();
$list=$rdvc->afficherRDV($_SESSION['cin']);
?>


	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/rdv.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1> Rendez-vous</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">

                    <fieldset style="margin-right:10px;width: 350px;border-style: dotted;border-width: 5px;">
                        <legend>&nbsp; <i class="fa fa-info-circle icon-wrap "></i>&nbsp; Nos Informations</legend>
					<div class="fh5co-contact-info">
						<ul>
							<li class="address">01 Rue de la chimie Z.I <br>Ben Arous</li>
							<li class="phone"><a href="tel://1234567920">+ 216 71 426 817</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">labiditammem@gmail.com</a></li>
							<li class="url"><a href="http://www.artisansdart.tn/1223__geoconcept">artisansdart.tn/1223__geoconcept</a></li>
						</ul>
					</div>
                    </fieldset>

				</div>
				<div class="col-md-6 animate-box">
                    <fieldset style="margin-right:10px;width: 450px;border-style: dotted;border-width: 5px;">
                        <legend>&nbsp; <i class="fa fa-calendar-check icon-wrap "></i>&nbsp; Prenez un Rendez-vous</legend>
					<form method="post" action="ajouterRDV.php">
					<input type="hidden" id="user" name="user" value="<?php echo$_SESSION['cin'];?>">
						<div class="row form-group">
							<div class="col-md-12">
								<!-- date -->
                                <label for="date">Date du Rendez-vous</label> <br>
								<input class="form-control" type="date" id="date" name="date" placeholder="YYYY-MM-DD" required min="<?php date_create()?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Enter a date in this formart YYYY-MM-DD" />
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
                                <label for="subject" >Sujet</label> <br>

										<SELECT class="form-control" name="subject" size="1" id="subject">
										<OPTION>Livraison non reçu
										<OPTION>Livraison non coforme
										<OPTION>Réparation et maintenance sous garantie
										<OPTION>Autre..
										</SELECT>

							</div>
						</div>

						<div class="form-group">
							<input type="submit" value="Envoyez" class="btn btn-primary">
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>

  <div class="animate-box" data-animate-effect="fadeIn">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.2799145891386!2d10.235151179498738!3d36.76385187754317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd360cb081667f%3A0xd4aa66b52e6f8a0b!2sRue+DE+LA+CHIMIE%2C+Megrine!5e0!3m2!1sfr!2stn!4v1549166133916" width="2000" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><br>
  </div>

   <div id="fh5co-started">
		 <div class="row animate-box" style="  margin: auto; padding: 10px;" >

		 <div class="row" >
		 <div class="span12">

		 <div class="well well-small" style="margin-left:10% ; width:1200px">
			 <h1>Liste de Vos Demandes Rendez-vous<small class="pull-right"></small></h1>
			 <h6> Vous ne pourrez plus modifier ou suprimer apres miniut.<small class="pull-right"></small></h6>
		 <hr class="soften"/>

		 <table class="table table-striped" >
                            <thead>
                            <th>Date depot rdv</th>
                            <th>Date du rdv</th>
                            <th>Objet du rdv</th>
                            <th>Etat du rdv</th>
                            <th>Supprimer </th>
                            <th>Modifier</th>
                            </thead>

                            <?php
                            foreach($list as $row)
                            {

                                echo "<tr><td>".$row['NOW_RDV'];"</td>";
                                echo "<td>".$row['DATE_RDV'];"</td>";
                                echo "<td>".$row['OBJET_RDV'];"</td>";
                                echo "<td>".$row['ETAT_RDV'];"</td></tr>";
                                ?>
                                <!-- <td><a href="../backOffice/nalika/deletedemande.php?sup=<?php// echo $row['ID_D'];?>">Supprimer</a></td>-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <td> <form method="post" action="supprimerRDV.php">
                                                <input type="submit" name="supprimer" class="btn-outline" value="  Supprimer">
                                                <input type="hidden" value="<?PHP echo $row['ID_RDV']; ?>" name="ID_RDV">
                                            </form>
                                        </td>
                                    </div>
                                </div>
                                <td>
																	<form method="GET" action="modifierRDV.php" >
																	<input type="submit" name="modifier" class="btn-outline" value="Modifier"/>

																				<input type="hidden" name="mod" value="<?php echo $row['ID_RDV'];?>"/>
																			</form>
                                </td>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
   </div>


        <footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>Geoconcept</h3>
					<p>Nous proposons un mobilier au design contomporain et moderne , Nous allions style et économie.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Rendez-vous</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
<?php }else {   header('Location: signin.php'); } ?>
