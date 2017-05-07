<?php
	session_start();
    require_once("session.php");
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
        function putSelected2($opt,$sel) {
        	if ($sel=='0') return $opt;
            $f=strpos($opt,$sel)+strlen($sel);
            $s1=substr($opt,0,$f);
            $s2=substr($opt,$f,strlen($opt));
            return $s1." selected".$s2;
        }
		$id = $_POST['id'];
		$M = new MConf;
		$sql = "SELECT * FROM $M->tablaut WHERE id=$id";
		$reponse = $M->querydb($sql);
		$donnees = $reponse->fetch();
		$nom = $donnees['nom'];
		$prenom = $donnees['prenom'];
		$niveau = $donnees['niveau'];
		$optionsdroit = "";
		for ($i=0;$i<6;$i++) $optionsdroit = $optionsdroit."<option value=$i>$i</option>";
		$optionsdroit = putSelected2($optionsdroit,$niveau);
	?>
	<div class="champ">
		<fieldset class="champemprunteurs">
			<form name="nouvelAd" action="modifniveau.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<table  class="saisie">
					<tr><th>Utilisateur</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Niveau de droits</th></tr>
					<tr>
						<td><?php echo $prenom." ".$nom ?>   </td> 
						<td></td>
						<td style="text-align:center"><select name="niveau"> <?php echo $optionsdroit ?></select></td>
					</tr>
				</table>
				<input type="submit" value="VALIDER">
			</form>
		</fieldset>
	</div>
</body>
</html>
