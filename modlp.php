<?php
	session_start();
	$prenom=$_SESSION['prenom'];
	$niveau=$_SESSION['niveau'];
	if (!$prenom) die();
	include("MGENconfig.php");
    function crypte($s,$n) {
	    exec('./crypta "'.$s.'" '.$n,$resultat,$ret);
	    return $resultat[0];
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="bibglobal0.css" type="text/css" rel="stylesheet" media="screen"/>
    <script src="fonctions.js"></script>
</head>
<body onload="resizemenu0()" onresize="resizemenu()">

	<?php
		include("menu.php");
		$id = $_POST['id'];

		$login = $_POST['login'];
		$password = crypte($_POST['password'],30);
		$M = new MConf;
		$sql = "UPDATE $M->tablaut SET login='".$login."', password='".$password."' WHERE id=$id";
		$reponse = $M->querydb($sql);
		if ($reponse) echo "</br></br><div class='alerte'>Les identifiant/mot de passe de l'utilisateur ont bien été modifiés dans la base de données </div>";
	    else echo "</br></br><div class='alerte'>Les identifiant/mot de passe de l'utilisateur n'ont pas pu être modifiés dans la base de données !!!</div>";
	?>

</body>
</html>
