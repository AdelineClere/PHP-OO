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
		<div class="row row-offcanvas row-offcanvas-right">
		  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			<div class="list-group">
			<p class="list-group-item active text-center">CATEGORIES</p>
	
			<?php  foreach($categories as $cat) :  ?>
				<a href="" class="list-group-item"><?=  $cat['categorie'] ?></a>
			<?php endforeach; ?>
			
			</div>
		  </div>
		  <!--/.sidebar-offcanvas-->
		  <div class="col-xs-12 col-sm-9">
			<p class="pull-right visible-xs">
			  <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
			</p>
			<div class="jumbotron">
			  <h1>Bienvenue sur notre boutique de OUF!!!!</h1>
			  <p>Que du lourd!!! viendez voir!!!</p>
			</div>
			
				
				
		<?php foreach($produits as $produit) : ?>
			<!-- afficher pour chaque produit : la photo, le prix et un lien permettant d'envoyer vers la fichie produit -->
			<!--<div class="row"> -->
			  <div class="col-xs-6 col-lg-4">
			  <div class="panel-default border">
				<div class="panel-heading text-center"><h2><?= $produit -> getTitre() ?></h2></div>
				
				<p><a href="">
				
				<img src="photo/<?= $produit -> getPhoto() ?>" alt="" class="img-responsive">
				
				</a></p>
				<p class="text-center"><?= $produit -> getPrix() ?>€</p>
				<p class="text-center"><a class="btn btn-primary" href="" role="button">Voir le détails &raquo;</a></p>
			  </div> 	
			  </div>
			  <!--/.col-xs-6.col-lg-4-->
			<!-- </div> -->
			<!--/row-->
		<?php endforeach; ?>
		
		
		
		
		
			
		  </div>
		  <!--/.col-xs-12.col-sm-9-->
		</div>
		<!--/row-->


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