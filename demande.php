<?php
require_once 'header.php';
if (isset($_SESSION['cin'])){
include_once '../core/DemandeC.php';
$demandec= new DemandeC();
$list=$demandec->afficherDemande($_SESSION['cin']);
?>


	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/demande.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1> Demandes</h1>
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
							<li class="email"><a href="mailto:info@yoursite.com">Geoconcept@gmail.com</a></li>
							<li class="url"><a href="http://www.artisansdart.tn/1223__geoconcept">artisansdart.tn/1223__geoconcept</a></li>
						</ul>
					</div>
                    </fieldset>
				</div>
				<div class="col-md-6 animate-box">
                    <fieldset  style="border-width: 5px;border-style: dotted;padding: 50px;">
                        <legend>&nbsp; <i class="fa fa-envelope icon-wrap "></i>&nbsp; Déposez vos demandes :</legend>
					<form method="post" name="formular" action="ajouterDemande.php">
                        <input type="hidden" id="user" name="user" value="<?php echo$_SESSION['cin'];?>">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="lname">Nomde de votre groupe:</label>
								<input type="text" id="lname" name="lname" class="form-control" required placeholder="Nom du groupe">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="num">Numero:</label>
                                <input type="number" id="num" name="num" class="form-control"  min="10000000" max="99999999" required  placeholder="Votre numéro: +216">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								 <label for="subject">Sujet:</label>
								<!--<input type="text" id="subject" class="form-control" placeholder="Sujet">-->
									<SELECT name="subject" size="1" id="subject" class="form-control" >
										<OPTION value="partenariat">Partenariat</OPTION>
										<OPTION value="sponsoring">Sponsoring</OPTION>
									</SELECT>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								 <label for="message">Details:</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" required placeholder="Developpez votre demande"></textarea>
							</div>
						</div>

						<input type="submit" id ="envoyer" name="envoyer" class="btn btn-primary" value="envoyer" />


					</form>
                    </fieldset>
				</div>
			</div>

		</div>
	</div>



	<div id="fh5co-started">

					<div class="row animate-box" style=" margin:auto ; padding: 10px; " >

					<div class="row" >
					<div class="span12">

					<div class="well well-small" style="margin-left:5%  ; width:1200px; margin-bottom: 5%;">
						<h1>Liste de Vos Demandes<small class="pull-right"></small></h1>
						<h6> Vous ne pourrez plus modifier ou suprimer apres minuit.<small class="pull-right"></small></h6>
					<hr class="soften"/>

					<table class="table table-striped" >
                        <thead>
                        <th>Date de la demande</th>
                        <th>Nom de la societe</th>
                        <th>Numero telephone</th>
                        <th>Objet de la demande</th>
                        <th>Détails de la demande</th>
                        <th>Etat de la demande</th>
                        <th> Supprimer </th>
                        <th> Modifier</th>
                        </thead>

                        <?php
                            foreach($list as $row)
                            {

                                echo "<tr><td>".$row['DATE_DEMANDE'];"</td>";
                                echo "<td>".$row['NOM_D'];"</td>";
                                echo "<td>".$row['NUM_D'];"</td>";
                                echo "<td>".$row['OBJET_D'];"</td>";
                                echo "<td>".$row['DETAILS_D'];"</td>";
                                echo "<td>".$row['ETAT_D'];"</td></tr>";
                                ?>
                                  <!-- <td><a href="../backOffice/nalika/deletedemande.php?sup=<?php// echo $row['ID_D'];?>">Supprimer</a></td>-->
                        <div class="row">
                            <div class="col-md-12">
                                <td> <form method="post" action="supprimerDemande.php">
                                        <input type="submit" name="supprimer" class="btn-outline" value="  Supprimer">
                                        <input type="hidden" value="<?PHP echo $row['ID_D']; ?>" name="ID_D">
                                    </form>
                                </td>
                            </div>
                        </div>
                                <td>

																		<form method="GET" action="modifierdemande.php" >
																				<input type="submit" name="modifier" class="btn-outline" value="Modifier"/>

																							<input type="hidden" name="mod" value="<?php echo $row['ID_D'];?>"/>
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
<!-- Google Map -->


<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>
<?php }else {   header('Location: signin.php'); } ?>
