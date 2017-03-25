<?php
/*
  $lifetime=10;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
*/

	session_start();
	$prenom=$_SESSION['prenom'];
	$niveau=$_SESSION['niveau'];
	$nom=$_SESSION['nom'];
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
	<div id="log"></div>
 </body>
 </html>