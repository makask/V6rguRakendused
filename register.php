<?php

require_once 'baasfunktsionaalsus.php';

// kui kasutaja on sisse logitud, siis sunni brauser avahele
if (kas_kasutaja_sisse_logitud()) {
	header("Location: /");
	die();
}

if (isset($_POST['nimi']) && isset($_POST['parool'])) {
	if (loo_konto($_POST['nimi'], $_POST['parool'])) {
		header("Location: /login.php");
	}
}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Veebiarendajate Andmebaas</title>
</head>
<body>
<div id="container">
	<header>
		<h1><span class="blue-text">Eesti</span> Veebiarendajate Andmebaas</h1>
		<?php if (kas_kasutaja_sisse_logitud()): ?>
			<h2><a href="?logivalja=1">logi välja</a></h2>
		<?php else: ?>
			<h2><a href="/login.php">logi sisse</a> / <a href="/register.php">registreeri</a></h2>
		<?php endif; ?>
	</header>

	<nav id="menu">
		<ul>
			<li class="menuitem"><a href="index.php">Avaleht</a></li>
			<?php if (kas_kasutaja_sisse_logitud()): ?>
				<li class="menuitem"><a href="ladu.php">Inimesed</a></li>
			<?php endif; ?>
		</ul>
	</nav>

	<section style="width: 900px">
		<h3>Registreerimine</h3>
		<form method="post" action="register.php">
			<p>
				<label for="nimi">Kasutaja:</label>
				<input type="text" name="nimi">
			</p>
			<p>
				<label for="parool">Parool: </label>
				<input type="text" name="parool">
			</p>
			<p>
				<input type="submit" value="Registreeri">
			</p>
		</form>
	</section>

</div><!--container end-->
<div style="clear;both"></div>
<footer>
	Copyright &copy; 2016, Eesti Veebiarendajate Andmebaas
</footer>
</body>
</html>
