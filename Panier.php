
<?php require 'header.php';
 ?>

<!-- DeBut CONSULTER PANIER ---------------------------------------------------------------------------------->
<style>
input[type=submit] {
    padding:5px 15px;
    color:#808080;
		background: none;
    border:none;
    cursor:pointer;

}
input[type=submit]:hover {
	color:#D2B48C;
}
input[type=submit]:focus {
    color:#D2B48C;
}
</style>



<form method="POST" action="addCommande.php">
	<div id="fh5co-started">

			<div class="row animate-box" style="  margin: auto; padding: 10px;" >

			<div class="row" >
			<div class="span12">

			<div class="well well-small" style="margin-left:20% ; width:900px">
				<h1>Check-Out <small class="pull-right"></small></h1>
			<hr class="soften"/>


			<table class="table table-striped" >
		              <thead>
		                <tr >
		                  <th>Produit</th>
                            <th>Nom</th>
		                  <th>Prix</th>
                            <th>Quantite</th>
                        </tr>
		              </thead>
<tbody class="cart-item">
									<?php
														if(!empty($_SESSION["panier"]))
														{
															$total = 0;
															foreach($_SESSION["panier"] as $keys => $values)
													 	{
										?>

				  <tr  class="cart-row" >
		                 <td><img width="100" src="images/<?php echo $values["item_id"]; ?>.jpg">
                     </td>

		                  <td><?php echo $values["item_name"]; ?>
                        <?php $item_id=(int)$values["item_id"];
                         $sql="SELECT qte FROM produits WHERE num='$item_id'";
                                    $req=$db->prepare($sql);
                                    $req->execute();
                                    $liste=$req->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($liste as $product){ ?>
                      </br><span><small>(Seulement <?php echo $product->qte; ?> reste en stock)</small></span></td>

											<td class="priceCart"><?php print_r($values["item_price"]); ?> TND</td>

                      <td>
                        <input type="hidden" class="quantityVrif" value="<?php echo $product->qte; ?>">
    <?php                     }
                                  ?>
                        <input type="number" class="quantity" name="panier[qte][<?php print_r($values["item_id"]); ?>]" style="max-width:100px" placeholder="1" size="16" type="number" value="<?php print_r($values["item_quantity"]); ?>"></td>

											<td><a class="remove deletepanier" href="deletePanier.php?id=<?php echo $values["item_id"]; ?>" value="supprimer"  >
                     X
											</a>
										</td>



					 </tr>

					 <?php
					 $total = $total + $values["item_price"];
}


					 ?>

		               <tr>

										 <td></td>
										 <td></td>

		                  <td style="color:#000000;">Total :	</td>
		                  <td class="total" style="color:#000000;"><?php print_r($total); ?> TND</td>
                      <td></td>
											<input type="hidden" name="prix" value="<?php print_r($total); ?>">
											<input type="hidden" name="qtte" value="<?php print_r(count($_SESSION["panier"])); ?>">
                  </tr>
									<?php
									}
									?>
						</tbody>
		            </table><br/>



			<a href="<?php echo $_SESSION["page"]; ?>" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>

      	<input type="submit" id="submit" class="btn btn-primary shopBtn pull-right" name="ajouter" value="Acheter" style="position: absolute;margin-left: 39%;bottom: 50px;">
		</div>

		</div>
	</div>


   </div>
	</div>

</form>
<!-- FIN CONSULTER PANIER ----------------------------------------------------------------------------------------->




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
	<script type="text/javascript" src="app.js" ></script>

	</body>
