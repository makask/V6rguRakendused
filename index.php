<?php

require_once 'baasfunktsionaalsus.php';

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

	<aside>
		<nav id="leftmenu">
			<h3>Lingid</h3>
			<ul>
				<li><a href="browse.html">SEO</a></li>
				<li><a href="browse.html">PHP</a></li>
				<li><a href="browse.html">Ajax</a></li>
				<li><a href="browse.html">jQuery</a></li>
				<li><a href="browse.html">Veebi Disain</a></li>
				<li><a href="browse.html">Veebi programmeerimine</a></li>
				<li><a href="browse.html">Sisu loomine</a></li>
				<li><a href="browse.html">Interneti kaubandus</a></li>
				<li><a href="browse.html">XHTML Põhjad</a></li>
			</ul>
		</nav>
	</aside>

	<section>
		<h2>Tere tulemast Eesti arendajate andmebaasi !</h2>
		<img class="float" src="images/web.jpg" alt="web developer directory">
		<h3>Kes me oleme?</h3>
		<p>Me oleme pseudo ettevõte ja interneti lehekülg, kes reklaamib Eesti parimaid veebiprogrammeerijaid. Leidke endale sobiv teenus või programmeerija täiesti TASUTA!!!</p>
		<h3>Millised meie arendajate oskused on ?</h3>
		<p>Meie arendajate oskused on erinevad ja laiapõhjalised, alustades graafilisest disainist(Photoshop, Illustrator, Fireworks), lõpetades märkimiskeeltega nagu HTML 5,
			XHTML ja XML ja programmeerimiskeeltega nagu Javascript, PHP, Python ja ASP. </p>
	</section>

	<section>
		<h2>Hiljutised veebiarendajad:</h2>
		<div class="developer">
			<h4>Kadri Karu</h4>
			<ul>
				<li><strong>Asukoht: </strong> Haapsalu, Läänemaa</li>
				<li><strong>Oskused: </strong> HTML/CSS, PHP, ROR</li>
				<li><strong>Töökoormus:</strong> Täiskohaga
			</ul>
			<a href="#">Vaata profiili</a>
		</div><!--developer end-->

		<div class="developer">
			<h4>Mart Mäger</h4>
			<ul>
				<li><strong>Asukoht: </strong> Tallinn, Harjumaa</li>
				<li><strong>Oskused: </strong> HTML/CSS, PHP, ROR</li>
				<li><strong>Töökoormus:</strong> Täiskohaga
			</ul>
			<a href="#">Vaata profiili</a>
		</div><!--developer end-->

		<div class="developer">
			<h4>Kalle Kukk</h4>
			<ul>
				<li><strong>Asukoht: </strong> Narva, Ida-Virumaa</li>
				<li><strong>Oskused: </strong> HTML/CSS, PHP, ROR</li>
				<li><strong>Töökoormus:</strong> Poole kohaga
			</ul>
			<a href="#">Vaata profiili</a>
		</div><!--developer end-->

		<div class="developer">
			<h4>Priit Põder</h4>
			<ul>
				<li><strong>Asukoht: </strong> Tartu, Lõuna-Eesti</li>
				<li><strong>Oskused: </strong> HTML/CSS, PHP, ROR</li>
				<li><strong>Töökoormus:</strong> Täiskohaga
			</ul>
			<a href="#">Vaata profiili</a>
		</div><!--developer end-->

	</section>
</div><!--container end-->
<div style="clear;both"></div>
<footer>
	Copyright &copy; 2016, Eesti Veebiarendajate Andmebaas
</footer>
</body>
</html>

