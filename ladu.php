<?php

require_once 'baasfunktsionaalsus.php';

// kui kasutaja pole sisse logitud, siis sunni brauser avahele
if (!kas_kasutaja_sisse_logitud()) {
	header("Location: /");
	die();
}

// salvesta kogused andmebaasi kui vajutati "Muuda vanust" nuppu
if (isset($_POST['nupp_eseme_kogus'])) {
	$eseme_id = key($_POST['nupp_eseme_kogus']);
	muuda_eseme_kogust($eseme_id, $_POST['eseme_kogus'][$eseme_id]);
}

if (isset($_POST['lisa_uus_ese'])) {
	lisa_uus_ese($_POST['ese'], $_POST['kogus']);
}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Ladu</title>
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
		<h2>Inimesed</h2>

	<?php
		$esemed = lao_nimekiri();
	?>
		<form method="post" action="ladu.php">
			<?php if(count($esemed)): ?>
				<table class="dev-table">
					<thead>
						<tr>
						<th>Nimi</th>
						<th>Vanus</th>
						<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($esemed as $key => $var): ?>
						<tr>
							<td><?php print $var['eseme_nimi']; ?></td>
							<td><?php print $var['kogus']; ?></td>
							<td><input type="text" name="eseme_kogus[<?php print $var['eseme_id']; ?>]" value="<?php print $var['kogus']; ?>"><input type="submit" name=nupp_eseme_kogus[<?php print $var['eseme_id']; ?>]" value="Muuda vanust"></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>

			<h3>Uue inimese lisamise vorm</h3>
				<p>
					<label for="ese">Nimi:</label>
					<input type="text" name="ese">
				</p>
				<p>
					<label for="kogus">Vanus: </label>
					<input type="text" name="kogus">
				</p>
				<p>
					<input type="submit" value="Lisa uus inimene" name="lisa_uus_ese">
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
