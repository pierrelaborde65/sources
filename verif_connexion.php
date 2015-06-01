<html>
	<meta charset="utf-8" />
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
	// On vérifie que l'utilisateur a bien rempli le formulaire
	if(!(isset($_POST['identifiant']) AND isset($_POST['mot_de_passe'])))
		{
			header("Refresh: 0; URL=http://localhost/projet_web/echec_connexion.php" );
		}
	else
{	
		// On récupère l'identifiant et le mot de passe
		$identifiant=$_POST['identifiant'];
		$mot_de_passe=sha1($_POST['mot_de_passe']);

		// Vérification des identifiants
		$req = $bdd->prepare('SELECT num_etudiant FROM etudiant WHERE identifiant = :identifiant AND mot_de_passe = :mot_de_passe');
		$req->execute(array(
			'identifiant' => $identifiant,
			'mot_de_passe' => $mot_de_passe));
		
		$resultat = $req->fetch();

		if (!$resultat)
			{
				header("Refresh: 0; URL=http://php-meilleuretudiant.rhcloud.com/echec_connexion.php" );
			}
		else
			// On initialise les cookies
			{
				setcookie('identifiant',$identifiant, time()+365*24*3600);
				setcookie('num_etudiant',$resultat['num_etudiant'], time()+365*24*3600);
				setcookie('mot_de_passe',$mot_de_passe, time()+365*24*3600);
				
				header("Refresh: 0; URL=http://php-meilleuretudiant.rhcloud.com/valid_connexion.php" );				
			}

}
    ?>
    
</html>


