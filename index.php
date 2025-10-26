<!-- On utilise "include_once" au lieu de "include" pour eviter les doublons -->
<?php include_once 'inc/inc.functions.php'; ?> <!-- il manquait ici un 'e' a la fonction "include" -->
<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Story by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<?php include_once 'inc/inc.css.php'; ?>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper" class="divided">
		<?php
		getPageTemplate( // il y avait ici un s de trop au nom de la fonction
			array_key_exists('page', $_GET) ? $_GET['page'] : null // il manquait ici un 's' a la fonction "array_key_exists"
		);
		?>
		<?php include_once 'inc/tpl-footer.php'; ?> <!-- le fichier tpl-footer.php avait ici un s en trop -->
	</div>

	<?php include_once 'inc/inc.js.php'; ?> <!-- il y avait ici un 's' en plus dans la fonction -->

</body>

</html>