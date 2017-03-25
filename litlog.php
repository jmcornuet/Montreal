<?php
	session_start();
	$prenom=$_SESSION['prenom'];
	$niveau=$_SESSION['niveau'];
	if (!$prenom) die();
	include("MGENconfig.php");
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
	?>
	<div class="titre1" style="text-align:center">Liste des interventions sur la base de données <span style="font-style: italic">clubmgen</span></div>

	<?php
		$M = new MConf;
		$tlog = $M->getlog();	
		$sql = "SELECT * FROM $tlog ORDER BY id DESC";
		$reponse = $M->querydb($sql);
		echo "<table  class='tablepart' width=80%><tr><th>ID</th><th>DATE</th><th>HEURE</th><th>&nbsp;&nbsp;UTILISATEUR&nbsp;&nbsp;</th><th>REQUETE</th></tr>";
		while ($donnees=$reponse->fetch()) {
			$mes ="<tr>";
			$mes .="<td>".$donnees['id']."</td><td>".$donnees['jour']."</td><td>".$donnees['heure']."</td>";
			$mes .= "<td>".$donnees['utilisateur']."</td><td>".$donnees['requete']."  ".$donnees['sessionid']."</td>";
			$mes .="</tr>";
			echo $mes;
		} 
		$M->close();
	?>
 </body>
 </html>