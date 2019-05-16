
<?php require 'header.php';
$_SESSION["page"]= array();
$_SESSION["page"]="Louer.php";
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
	<div id="fh5co-started">

			<div class="row animate-box" style="  margin: auto; padding: 10px;" >

			<div class="row" >
			<div class="span12">

			<div class="well well-small" style="margin-left:20% ; width:900px">
				<h1>Liste <small class="pull-right"></small></h1>
				<h6>  Vous recevrez votre contrat aprés avoir <strong>LOUER </strong>  votre article.</h6>
			<hr class="soften"/>
<form method="POST" action="ajouterLocation.php">
<form action="contrat.php"  method="GET">
  <table class="table table-striped" >
        <thead>
         <tr>
 <th>L'article	</th>
   <th>Nom </th>
   <th>Prix</th>
   <th>Quantite	</th>
   <th>Date debut	</th>
   <th>Date fin	</th>
         </tr>
       </thead>
<tbody class="cart-item">

       <?php
                 if(!empty($_GET['name']))
                 {  $id=$_GET['id'];
                   $name=$_GET['name'];
                   $price=(float)$_GET['price'];

                    $test=$panier->addlocation($id,$name,$price);
                    if(!empty($_SESSION["location"]))
                    {
                      $total = 0;
                      foreach($_SESSION["location"] as $keys => $values)
                    {
         ?>

<tr  class="cart-row" >
          <td><img width="100" src="images/<?php echo $values["item_id"]; ?>.jpg"></td>
           <td><?php echo $values["item_name"]; ?>
           </td>

 <td class="priceCart"><?php print_r($values["item_price"]); ?> TND

 </td>
 <td><input type="number" class="quantity" name="p[qte][<?php print_r($values["item_id"]); ?>]" style="max-width:55px" placeholder="100" size="16" id="qte" type="number" value="1"></td>
 <td><input  class="dateDebut" name="p[datedeb][<?php print_r($values["item_id"]); ?>]"  id="datedeb" style="max-width:2	00px" placeholder="1" size="16" type="date"value="1" ></td>
 <td><input class="dateFin" name="p[datefin][<?php print_r($values["item_id"]); ?>]"  id="datefin" style="max-width:200px" placeholder="1" size="16" type="date" value="1"></td>
	<td><a  href="deleteLocatiion.php?id=<?php echo $values["item_id"]; ?>" value="supprimer"  >X	</a></td>

</tr>
<?php

//$total = $total + $values["item_price"] ;

}
}
}
?>


						</tbody>
		            </table><br/>


								<?php
			echo "Date actuellle : ".date("d-m-Y - H:i:s");
			/*$date= date('d-m-Y - H:i:s');
			echo $date;*/
			?>

 	<a href="<?php echo $_SESSION["page"]; ?>" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continuer le Shopping </a>

      	<input type="submit" id="submit" class="shopBtn pull-right" name="ajouter" value="Louer">

		</div>

		</div>
	</div>


   </div>
	</div>
	</form>
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
