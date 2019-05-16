<?php require 'header.php';
$_SESSION["page"]=array();
$_SESSION["page"]="product2.php"; ?>

<?php
include "../entities/commande/commande.class.php";
include "../core/GestionCommande/commande.class.c.php";

$CommandeC1=new CommandeC();
?>
<script>
var bleep = new Audio();
bleep.src = 'BienAjouter.mp3';
var bleep2 = new Audio();
bleep2.src = 'HorsStock.mp3';

</script>


<style>
.comm {
  background-color: #b7a868;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
  border-radius: 8%;
  font-weight: bold;
}

.comm:hover {opacity: 2}

</style>

    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/Baniere3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Meubles</h1>
                            <h2>Extérieurs</h2>
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
                    <span>Meubles Extérieurs</span>
                    <h2>Produits</h2>
                    <p></p>
                </div>
            </div>
            <div class="row" id="row1">

            </div>
            <?php
            $sql="SELECT * FROM  produits WHERE cat='Exterieur'";
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
    															<a href="addpanier.php?id=<?php echo $product->num; ?>&name=<?php echo $product->nom; ?>&price=<?php echo $product->prix; ?>"  class="icon addpanier" ><i class="icon-shopping-cart"></i></a>
    <?php } ?>
    <?php
    if($product->qte==0){ ?>
    <a onmousedown="bleep2.play()" style="background-color:#A9A9A9;" href="Rupture de Stock"  onclick="alert('HORS STOCK');"  class="icon addpanier" ><i class="icon-shopping-cart"></i></a>
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
                          <?php }endforeach; ?>
                            <h3><a href="javascript:openModal(<?php echo $product->num; ?>)"><?php echo $product->nom; ?> </a></h3>
                            <span class="price"><?php echo number_format($product->prix,2,',',''); ?> TND</span>
                           <input type="hidden" name="desc" value="<?php echo $product->nom; ?>">
                                                <input type="hidden" class="price" name="price" value="<?php echo $product->prix; ?>">
                                                <p> <a style='font-size:20px;' class="icon" href="addfavoris.php?nom=<?php echo $product->nom; ?>&id=<?php echo $product->num;  ?>&price=<?php echo $product->prix; ?>"> &#9734;</a></p>

                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
 <div id="fh5co-started">
        <div class="container">

            <?php if(isset($_SESSION['cin'])){ ?>
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2" style="margin-left: 31.8%; margin-top: -70px;">
                    <form class="form-inline" action="AjouterCommentaire.php" >
                        <div class="col-md-6 col-sm-6" >
                            <div class="form-group"  >
                                <textarea name="commentaire" class="form-control" placeholder="Ajouter un commentaire ..." ></textarea></br></br>

                                <input type="submit" name="submit_commentaire" value="Poster" class="comm" style="margin-left: 113px;"></br></br></br>
                            </div>



                        </div>

                    </form>
                </div>
            </div>
        <?php } ?>



        </div>



        </div>

<?php require 'footer.php' ?>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <img id="modalImage" class="modalimg" src="FrontOffice/images/chaise2.jpg"/>
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
    <!--<script type="text/javascript">

        var arrayImage = ["images/ChaiseSkandinave.jpg", "images/Chaise2.jpg", "images/Chaise3.jpg","images/Table1.jpg","images/Table2.jpg","images/Table3.jpg","images/Fauteuil1.jpg","images/Fauteuil2.jpg","images/Fauteuil3.jpg"];
        var arrayPrix = ["1","2","3","4","5","6","7","8","9"];
        var arrayInfo = ["a","b","c","d","e","f","g","h","i"];

        var arrayLength = arrayImage.length;
        var temp;

        for (i = 0; i < arrayLength; i++) {
            temp = document.createElement('div');
            temp.className = 'col-md-4 text-center animate-box';
            temp2 = document.createElement('div');
            temp2.className = 'product';
            temp3 = document.createElement('div');
            temp3.className = 'product-grid';
            temp3.style = 'background-image:url('+arrayImage[i]+');';
            temp4 = document.createElement('div');
            temp4.className = "inner"
            temp4.innerHTML = '<p><a href="#" class="icon"><i class="icon-shopping-cart"></i></a><a onclick="openModal('+i+');" class="icon"><i class="icon-eye"></i></a></p>';

            temp5 = document.createElement('div');
            temp5.className = "desc";
            temp5.innerHTML = '<h3><a href="single.html">'+arrayInfo[i]+'</a></h3><span class="price">'+arrayPrix[i]+'</span>';
            temp3.appendChild(temp4);
            temp2.appendChild(temp3);
            temp2.appendChild(temp5);
            temp.appendChild(temp2);
            document.getElementById('row1').appendChild(temp);
        }
    </script>-->
    <script type="text/javascript">
        // Get the modal
        var arrayTitle = ["Chaise1", "Chaise2", "Chaise3","Table1","Table2","Table3","Fauteuil1","Fauteuil2","Fauteuil3"];
        var arrayImage = ["images/person2.jpg", "images/Chaise2.jpg", "images/Chaise3.jpg","images/Table1.jpg","images/Table2.jpg","images/Table3.jpg","images/Fauteuil1.jpg","images/Fauteuil2.jpg","images/Fauteuil3.jpg"];
        var arrayDesc = ["one", "two", "three","four","a","b","c","d","e"];
        var modal = document.getElementById('myModal');

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
                    //$('#info').html('<p>An error has occurred</p>');
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

        function closeModal() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
