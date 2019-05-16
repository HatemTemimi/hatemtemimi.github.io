<?php require 'header.php';
 include "../Core/ProduitIntC.php";
?>

<?php

/*$nom = $_POST['search'];
$sql=$sql = "SELECT * FROM produits WHERE nom LIKE '%$nom%' OR prix LIKE '%$nom%' OR qte LIKE '%$nom%' OR descr LIKE '%$nom%' OR cat LIKE '%$nom%'";
$db = config::getConnexion();
$liste1=$db->query($sql);
$liste=($liste1->fetchAll(PDO::FETCH_OBJ));
var_dump($liste);*/
$prod = new ProduitIntC();
$liste = $prod->recherche_frontobj($_POST['search']);
//var_dump($liste);

?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/Baniere1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Meubles</h1>
                        <h2>Interieurs</h2>
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
                <span>Meubles Interieurs</span>
                <h2>Produits</h2>
                <p></p>
            </div>
        </div>
        <div class="row" id="row1">
        </div>
        <?php

        ?>
        <?php foreach ($liste as $product): ?>

            <div class="col-md-4 text-center animate-box">
                <div class="product">
                    <div class="product-grid" style="background-image:url(images/<?php echo $product->num; ?>.jpg)">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                               <a href="javascript:openModal(<?php echo $product->num; ?>)" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html"><?php echo $product->nom; ?> </a></h3>
                        <span class="price"><?php echo number_format($product->prix,2,',',''); ?> TND</span>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>


<div id="fh5co-started">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <h2>Besoin d'aide ? </h2>
                <p>Inscrivez vous pour suivre nos produits et nouveautés</p>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-inline">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-default btn-block">Inscrivez-Vous</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>



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
</html>
