<?php
	try
	{
		// On se connecte à MySQL
			$bdd = new PDO();
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>