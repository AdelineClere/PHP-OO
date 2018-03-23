<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Ma Boutique</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse ma-nav">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ma Boutique!</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
         
			<li><a href="">Profil</a></li>
			<li><a href="">Connexion</a></li>
			<li><a href="">Inscription</a></li>
			<li><a href="">Boutique</a></li>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container mon-conteneur">





<div class="col-md-6 col-md-offset-3">
	<div class="panel-default border">
		<div class="panel-heading text-center"><h2><?= $produit -> getTitre() ?></h2></div>
		<div class="panel-body">
			<img src="photo/<?= $produit -> getPhoto() ?>" alt="" class="img-responsive"><hr>
			<p class="text-center">Catégorie : <?= $produit -> getCategorie() ?></p>
			<p class="text-center">Couleur : <?= $produit -> getCouleur() ?></p>
			<p class="text-center">Taille : <?= $produit -> getTaille() ?></p>
			<p class="text-center">Description :<?= $produit -> getDescription() ?></p>
			<p class="text-center">Prix : <?= $produit -> getPrix() ?> €</p><hr>
			
		<?php if($produit -> getStock() > 0): ?>
		
		<em>Nombre de produit(s) disponible : <?= $produit -> getStock() ?></em><hr>
		<form method="post" action="panier.php">
			<input type="hidden" name="id_produit" value="<?= $produit -> getId_produit() ?>">
			<label for="quantite">Quantité</label>
			<select class="form-control" id="quantite" name="quantite">
				<?php for($i = 1; $i <= $produit -> getStock() && $i <= 5; $i++) : ?> 
					<option><?= $i ?></option>
				<?php endfor; ?>				
			</select><br>
			<input type="submit" name="ajout_panier" class="btn btn-primary col-md-12" value="ajout au panier">
		</form>
		
		<?php else: ?>	
		<div class="alert alert-danger text-center">Rupture de stock !!!</div>	
		<?php endif; ?>
		</div>
	</div>
</div>


</div><!-- /.container -->
	<footer>
		GL. - Plan du site (c) 2018
	</footer>
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?= URL ?>inc/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>








