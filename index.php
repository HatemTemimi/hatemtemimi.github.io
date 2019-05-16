<?php require 'header.php';
$_SESSION["page"]=array();
$_SESSION["page"]="product.php"; ?>

<?php
include "../entities/commande/commande.class.php";
include "../core/GestionCommande/commande.class.c.php";


$CommandeC1=new CommandeC();
?>
<?PHP include "../Core/ProduitIntC.php";
//$produit=new ProduitInt('chaise',152,150,125,'chaise comfortable',1);
$produit1C=new ProduitIntC();
$req=$produit1C->MinStock();
$nbrprod=$produit1C->NbrProd();

$nbrclients=$produit1C->Nbrclients();

?>



<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(images/Baniere3.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">

                    </div>
                </div>
            </li>
            <li style="background-image: url(images/Baniere7.jpg)";>
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">

                    </div>
                </div>
            </li>
            <li style="background-image: url(images/Baniere1.jpg);">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">

                    </div>
                </div>
            </li>
            <li style="background-image: url(images/Slide3.jpg);">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">

                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="fh5co-services" class="fh5co-bg-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-credit-card fa-spin"></i>
						</span>
                    <h3>Carte de credit</h3>
                    <p>Possibilité de Payement avec votre carte de crédit.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-wallet fa-spin"></i>
						</span>
                    <h3>Economiser</h3>
                    <p>Une Qualité supérieure avec un prix réduit.</p>

                </div>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-paper-plane fa-spin"></i>
						</span>
                    <h3>Possibilité  de Livraison</h3>
                    <p>Livraison de  vos produits dans des délais optimales.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$sql="SELECT * FROM  produits";
$req=$db->prepare($sql);
$req->execute();
$liste=$req->fetchAll(PDO::FETCH_OBJ);
?>

<div id="fh5co-product">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Produits.</h2>
                <p>Nos produits sont a votre disposition.</p>
            </div>
        </div>
        <?php foreach ($liste as $product): ?>
            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url(images/<?php echo $product->num; ?>.jpg)">

                        <div class="inner">

                            <p>
                                <?php
                                if($product->qte!=0){ ?>

                                    <a href="addpanier.php?id=<?php echo $product->num; ?>&name=<?php echo $product->nom; ?>&price=<?php echo $product->prix; ?>"  class="icon addpanier" ><i class="icon-shopping-cart"></i></a>
                                <?php } ?>
                                <?php
                                if($product->qte==0){ ?>

                                    <a onmousedown="bleep2.play()" style="background-color:#A9A9A9;" href="Rupture de Stock" class="icon addpanier" onclick="alert('HORS STOCK');" ><i class="icon-shopping-cart"></i></a>



                                <?php } ?>
                                <a href="javascript:openModal(<?php echo $product->num; ?>)" class="icon"><i class="icon-eye"></i></a>

                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <?php $variable=$CommandeC1->ProduitBestSaler();
                        foreach ($variable as $row):
                            if($row["Nom_Produit"]==$product->nom){
                                ?>
                                <img src="images/bestSeller.png" style="margin-top:2px;">
                            <?php }endforeach; ?><h3><a href="javascript:openModal(<?php echo $product->num; ?>)"><?php echo $product->nom; ?> </a></h3>
                        <span class="price"><?php echo number_format($product->prix,2,',',''); ?> TND</span>
                        <input type="hidden" name="desc" value="<?php echo $product->nom; ?>">
                        <input type="hidden" class="price" name="price" value="<?php echo $product->prix; ?>">
                        <p>	<a style='font-size:20px;' class="icon" href="addfavoris.php?nom=<?php echo $product->nom; ?>&id=<?php echo $product->num; ?>&price=<?php echo $product->prix;?>"> &#9734;</a></p>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Témoignages</span>
                <h2>Clients Satisfaits :</h2>
            </div>
        </div>
        <?php
        $sql = "SElECT  * From commentaires";
        $db = config::getConnexion();
        $liste = $db->query($sql);
        //var_dump($liste);
        ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth">
                        <?php foreach ($liste as $commentaire) {?>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <figure>
                                    <img src="images/person1.jpg" alt="user">
                                </figure>
                                <span><?php echo $commentaire['pseudo'];?></span>
                                <blockquote>
                                    <p>&ldquo;<?php echo $commentaire['commentaire']; ?>.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
    <div class="container">
        <div class="row">
            <div class="display-t">
                <div class="display-tc">
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
								<span class="icon">
									<i class="icon-shopping-cart"></i>
								</span>

                            <span class="counter js-counter" data-from="0" data-to="<?php echo (int)$nbrclients[0]; ?>" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Nombres de Clients</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
								<span class="icon">
									<i class="icon-shop"></i>
								</span>
                            <span class="counter js-counter" data-from="0" data-to="<?php echo (int)$nbrprod[0]; ?>" data-speed="5000" data-refresh-interval="50">1</span>
                            <span class="counter-label">Nombres de Produits</span>
                        </div>
                    </div>
                    <!--//////////echo temchi l fou9 ama louta le/////////////
                    <div class="col-md-3 col-sm-6 animate-box">
                        <div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

                            <p><?php //echo ($req[0]->nom);?></p>
                            <span class="counter-label">Le plus vendu</span>

                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "footer.php" ?>

<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <img id="modalImage" class="modalimg"/>
            <h1 id="modalTitle" class="modal-header " style="text-align: center;"></h1>
            <h2  class="modal-footer" id="modalPrice" style="text-align: center;"></h2>
            <p class="modaldesc" id="modaldesc" style="text-align: center;"></p>
            <button class="close" onClick="closeModal()">Close</button>
        </div>
    </div>
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

<script type="text/javascript">
    // Get the modal
    var arrayTitle = ["Chaise3", "Fauteuil", "Fauteuil2Places","Table1","Table2","Table3","Fauteuil1","Fauteuil2","Fauteuil3"];
    var arrayImage = ["images/person1.jpg", "images/Chaise2.jpg", "images/Chaise3.jpg","images/Table1.jpg","images/Table2.jpg","images/Table3.jpg","images/Fauteuil1.jpg","images/Fauteuil2.jpg","images/Fauteuil3.jpg"];
    var arrayDesc = ["Chaise Interieur", "Fauteuil Interieur", "Fauteuil 2 Places Comfortable","d","e","f","g","h","i"];
    var modal = document.getElementById('myModal');
    var arraylength = arrayTitle.length;


    function openModal(i)
    {
        console.log(i);

        $.ajax({
            url: 'ajax.php?id='+i,
            type: 'GET',
            data: {
                format: 'json'
            },
            error: function() {
                $('#info').html('<p>An error has occurred</p>');
                console.log("error");
            },
            dataType: 'json',
            success: function(data) {
                console.log(data[0]);

                $("#modalTitle").html(data[0].nom);
                $("#modalPrice").html(data[0].prix+"TND");
                $("#modaldesc").html(data[0].descr);
                $("#modalImage").attr("src","images/"+data[0].num+".jpg");

                /*var $title = $('<h1>').text(data.talks[0].talk_title);
                var $description = $('<p>').text(data.talks[0].talk_description);
                $('#info')
                    .append($title)
                    .append($description);*/
            },
            type: 'GET'
        });
        modal.style.display = "block";
        /*$(document).ready(function()
        {
                document.getElementsByClassName("modalimg")[i].src = arrayImage[i];
                document.getElementsByClassName("modalimg")[i].src = "images/person1.jpg";
                document.getElementsByClassName("modaltitle")[i].innerHTML = arrayTitle[i];
                document.getElementsByClassName("modaldesc")[i].innerHTML = arrayDesc[i];

        });*/
    }

    function closeModal()
    {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event)
    {
        if (event.target == modal)
        {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html
