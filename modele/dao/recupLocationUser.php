<?php

	require_once "./config/config.php";

//	header("Access-Control-Allow-Origin: *");

	try {
	    $chaine = "mysql:host=".HOST.";dbname=".BD.";charset=UTF8";
	    $db = new PDO($chaine,LOGIN,PASSWORD);
	    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    throw new PDOException("Erreur de connexion");
	}
	$ID = $_SESSION['id'];
	$sql_get_location = "SELECT location FROM Utilisateurs WHERE mail=:id";

	$sth = $db->prepare($sql_get_location);
	$sth->bindParam(":id", $ID);
	$sth->execute();
	$reponse = $sth->fetch(PDO::FETCH_ASSOC);

	foreach($reponse as $result) {
	    echo $result, '</br>';
	}
?>
