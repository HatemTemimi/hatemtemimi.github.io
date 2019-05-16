<?php require 'header.php';
$_SESSION["page"]=array();
$_SESSION["page"]="product.php"; ?>

<?php
/*$sql="SELECT * FROM  produits";
$db = config::getConnexion();
$liste=$db->query($sql);
var_dump($liste->fetchAll(PDO::FETCH_OBJ));*/
?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/Baniere1.jpg);">

		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Meubles</h1>
							<h2>Louer</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Louer</span>
					<h2>Produits</h2>
					<p></p>
				</div>
			</div>
            <div class="row" id="row1">
            </div>
            <?php
            $sql="SELECT * FROM  produits WHERE cat='louer'";
            $req=$db->prepare($sql);
            $req->execute();
            $liste=$req->fetchAll(PDO::FETCH_OBJ);
            ?>
            <?php foreach ($liste as $product): ?>

                <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url(images/<?php echo $product->num; ?>.jpg)">

                        <div class="inner">

                            <p>
															<?php
															if($product->qte!=0){ ?>
                                <a href="panierLouer.php?id=<?php echo $product->num; ?>&name=<?php echo $product->nom; ?>&price=<?php echo $product->prix; ?>"   class="btn btn-primary btn-outline btn-lg" style="background-color:#A9A9A9;" >Louer</i></a>
<?php } ?>
<?php
if($product->qte==0){ ?>
  <a href="panierLouer.php?id=<?php echo $product->num; ?>&name=<?php echo $product->nom; ?>&price=<?php echo $product->prix; ?>"   class="btn btn-primary btn-outline btn-lg" style="background-color:#A9A9A9;" >Louer</i></a>
<?php } ?>

                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a><?php echo $product->nom; ?> </a></h3>
                        <span class="price"><?php echo number_format($product->prix,2,',',''); ?> TND</span>
												<input type="hidden" name="desc" value="<?php echo $product->nom; ?>">
												<input type="hidden" class="price" name="price" value="<?php echo $product->prix; ?>">
                    </div>
                </div>
                </div>

            <?php endforeach ?>
        </div>
	</div>




	<?php require 'footer.php'; ?>




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
</html>
