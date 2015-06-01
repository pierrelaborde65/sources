<?php 
	try
	{
		// On se connecte à MySQL
			$bdd = new PDO('mysql:host=127.8.29.2;dbname=php;charset=utf8', 'admindCkYDZC', 'QwHKI9Z7QJ56', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	// On regarde si l'utilisateur est connecté, càd si son cookie identifiant est non nul
	if(!isset($_COOKIE['identifiant']))
		header("Refresh: 0; URL=http://php-meilleuretudiant.rhcloud.com/non_connecte_inscription_evenement.php" );
	else
	{
?>

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
	
	<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Inscription à un événement</strong>
                    </h2>
                    <hr>
					</br>
					
					<div class="into-text text-center policy2">
						Voici les événements proposés par le BDE de Polytech Montpellier, au quel souhaitez-vous participer ?
                    </div>
					</br>
					</br>
                    
					<div class="formulaire policy">
						<form action="verif_inscription_evenement.php" method="post">
							<select name="choix">
							<?php
							// On récupère tous les événements de ma bdd
							$req = $bdd->query('SELECT nom_evenement, date_evenement, nombre_points FROM evenement');
				
							while ($donnees = $req->fetch()) // Tant qu'il y a un événement
							{
								// On affiche tous les événements avec la date et le nombre de points
								echo ('<option value="'.$donnees['nom_evenement'].'">'.$donnees['nom_evenement'].' le '.$donnees['date_evenement'].' , '.$donnees['nombre_points'].' points</option>');
							}
							?>					
							</select>
							<input type="submit" value="Valider" />
						</form>
					</div>
					<img class="img-responsive img-right img-border" src="img/soiree.jpg" alt="image soiree">
					
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
	<?php
	}
	?>

</html>

