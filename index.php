<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

		<title>Le meilleur étudiant</title>

		<img class="img-logo-polytech img-border img-left" src="img/logo_polytech.jpg" alt="logo Polytech">
		<img class="img-logo-universite img-border " src="img/logo_universite.png" alt="logo universite">
		<img class="img-logo-IG img-border " src="img/logo_ig.jpg" alt="logo IG">		
		
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/business-casual.css" rel="stylesheet">

		<!-- On inclut la police spéciale -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
		
	</head>
 
    <body>
	
	<div class="brand">Qui sera le meilleur étudiant de Polytech Montpellier ?</div>
    <div class="address-bar">31 Place Eugène Bataillon 34090 Montpellier</div>
	
	<!-- On regarde si l'utilisateur est connecté, càd si son cookie identifiant est non nul -->
	<?php if(!isset($_COOKIE['identifiant'])) // S'il est non connecté alors...
	{
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Le meilleur étudiant</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="connexion.php">Connexion</a>
                    </li>
					<li>
                        <a href="classement.php">Classement</a>
                    </li>
                    <li>
                        <a href="inscription_evenement.php">Inscription événement</a>
                    </li>
					<li>
                        <a href="desinscription_evenement.php">Désinscription événement</a>
                    </li>
                </ul>							
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<?php
	}
	else // S'il est connecté
	{
	?>
		<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">Le meilleur étudiant</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="deconnexion.php">Déconnexion</a>
                    </li>
					<li>
                        <a href="classement.php">Classement</a>
                    </li>
                    <li>
                        <a href="inscription_evenement.php">Inscription événement</a>
                    </li>
					<li>
                        <a href="desinscription_evenement.php">Désinscription événement</a>
                    </li>
                </ul>							
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<?php 
	}
	?>
	<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div class="item">
                                <img class="img-responsive img-center" src="img/1.jpg" alt="image accueil">
                    </div>
                    <h2 class="brand-before">
                        <small>Bienvenue sur</small>
                    </h2>
                    <h1 class="brand-name">Le meilleur étudiant</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Par
                            <strong>Pierre Laborde</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Objectifs</strong>
                    </h2>
                    <hr>
                    <img class="img-logo img-border img-left" src="img/logo.jpg" alt="logo BDE">
                    <hr class="visible-xs">
                    <div class="policy">
						<p>Ce site va vous permettre de réaliser 2 actions :<br />
						<br />
						- vous allez pouvoir vous inscrire aux différents événements proposés par le BDE de Polytech Montpellier.<br />
						<br />
						- vous allez pouvoir découvrir le classement des élèves et découvrir qui est le meilleur étudiant.<br /></p>
					</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Principe</strong>
                    </h2>
                    <hr>
					<div class="policy">
						<p>Le principe est simple : chaque événement rapporte un certain nombre de points à l'étudiant qui y participe.<br />  
						Le but étant d'avoir le maximum de points à la fin de l'année. Mais attention ! Un autre critère rentre en compte : la moyenne scolaire.<br />
						Tout étudiant n'ayant pas la moyenne ne peut pas gagner le trophée. Pour ceux qui ont la moyenne, plus cette dernière est élevée, plus ils gagnent des points bonus.<br />
						</p>		
						<p>Vous connaissez les règles, maintenant c'est à vous de jouer ! Et que le meilleur gagne !!!</p>
                    </div>
				</div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center policy">
                    <p>Copyright &copy; Pierre Laborde 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>  
</html>