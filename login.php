<?php

require_once 'baasfunktsionaalsus.php';

if (isset($_POST['nimi']) && isset($_POST['parool'])) {
	logi_kasutaja_sisse($_POST['nimi'], $_POST['parool']);
}

?><!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Veebiarendajate Andmebaas</title>
</head>
</head>
<body>
<div id="container">
	<header>
		<meta charset="UTF-8">
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
		<?php if (kas_kasutaja_sisse_logitud()): ?>
			<h3>Sisse logitud</h3>
			<p>Tere tulemast, <?php print $_SESSION['kasutajanimi']; ?>!</p>

		<?php else: ?>
			<h3>Sisselogimine</h3>
			<form method="post" action="login.php">
				<p>
					<label for="name">Kasutaja:</label>
					<input type="text" name="nimi">
				</p>
				<p>
					<label for="email">Parool: </label>
					<input type="password" name="parool">
				</p>
				<p>
					<input type="submit" value="Sisene">
				</p>
			</form>
		<?php endif; ?>

	</section>

</div><!--container end-->
<div style="clear;both"></div>
<footer>
	Copyright &copy; 2016, Eesti Veebiarendajate Andmebaas
</footer>
</body>
</html>
