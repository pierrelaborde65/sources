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
		header("Refresh: 0; URL=http://php-meilleuretudiant.rhcloud.com/non_connecte_classement.php" );
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
                        <strong>Classement des étudiants</strong>
                    </h2>
                    <hr>
					</br>
					</br>
					<?php 
					// Je classe mes étudiants par leur nombre de points total puis leur moyenne puis leur numéro étudiant du plus élevé au plus petit.
					$req1 = $bdd->query('select num_etudiant, identifiant, nb_points_total, moyenne_etudiant from etudiant order by nb_points_total DESC, moyenne_etudiant DESC, num_etudiant DESC');
					$cpt1 = 1; 
						
					// Je calcule la position de l'étudiant connecté
					while ($donnees1 = $req1->fetch())
					{	
						if ($donnees1['num_etudiant']==$_COOKIE['num_etudiant'])
						{
							break;
						}
						else
						{
							$cpt1=$cpt1+1;
						}
					}
					
					if ($cpt1==1)
					{
						?>
						<div class="text-center policy2">
							Bonjour <?php echo $_COOKIE['identifiant'];?> , vous êtes actuellement <?php echo $cpt1;?> er avec un total de <?php echo ($donnees1['nb_points_total']); ?> points !
						</div>						
						<?php
					}
					else
					{	
						?>					
						<div class="text-center policy2">
							Bonjour <?php echo $_COOKIE['identifiant'];?> , vous êtes actuellement <?php echo $cpt1;?> ème avec un total de <?php echo ($donnees1['nb_points_total']); ?> points !
						</div>
						<?php
					}
						?>
					</br>
					</br>
					</br>
					
					<p class="policy2">Rechercher le classement d'un étudiant :</p>
					<form action="recherche_classement.php" method="post">
                        <div class="row policy">
                            <div class="form-group col-lg-4">
                                <label>Prénom</label>
                                <input type="text" name="prenom" />
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Nom</label>
                                <input type="text" name="nom" />
                            </div>
							<input type="submit" value="Rechercher" />
						</div>
					</form>
					
					</br>	
					<table id="tab" style ="text-align:center">
						<caption class="text-center policy2">Voici le classement actuel des étudiants :</caption>
						<!-- J'ai besoin de 4 colonnes -->
						<colgroup>
							<col span="1" width="150"/>
							<col span="1" width="150"/>
							<col span="1" width="150"/>
							<col span="1" width="150"/>
						</colgroup>
						
						<thead style ="text-align:center">
							<tr>								
								<th style ="text-align:center">Position</th>
								<th style ="text-align:center">Prénom</th>
								<th style ="text-align:center">Nom</th>
								<th style ="text-align:center">Nombre de points</th>
							</tr>
						</thead>

						<tbody>
							<?php 
							// Je classe mes étudiants comme précédemment
							$req2 = $bdd->query('select num_etudiant, prenom_etudiant, nom_etudiant, nb_points_total, moyenne_etudiant from etudiant order by nb_points_total DESC, moyenne_etudiant DESC, num_etudiant DESC');
							$cpt2 = 1;	
							
							// Je sélectionne les étudiants un à un
							while ($donnees = $req2->fetch())
							{	
								// Si c'est l'étudiant connecté alors je le mets sur fond rouge
								if ($donnees['num_etudiant']==$_COOKIE['num_etudiant'])
								{
									?>
									<tr style ="background-color: #FF6347;">
										<td><?php echo $cpt2; ?></td>
										<td><?php echo ($donnees['prenom_etudiant']); ?></td>
										<td><?php echo ($donnees['nom_etudiant']); ?></td>
										<td><?php echo ($donnees['nb_points_total']); ?></td>
									</tr>								
									<?php
								}
								else
								{
									?>
									<tr>
										<td><?php echo $cpt2; ?></td>
										<td><?php echo ($donnees['prenom_etudiant']); ?></td>
										<td><?php echo ($donnees['nom_etudiant']); ?></td>
										<td><?php echo ($donnees['nb_points_total']); ?></td>
									</tr>								
									<?php
								}							
								$cpt2 = $cpt2+1;
							}
							?>
							
						</tbody>
					</table>
                    	
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