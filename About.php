<?php
session_start();
?>

<html>

<head>
	<title>CS 401 Project</title>
	<link rel="stylesheet" type="text/css" href="about.css">

	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<?php include 'nav_about.php'; ?>
</head>

<body class="about">
	<div class="wrapper">
		<div id="body-paragraphs">
			<p>Howmanyrubles.com is an open source tool kit for Escape from Tarkov</p>
			<p>This website is designed and maintained to help the community. It can help you with flea market trades, quests, and improving your Tarkov experience.</p>
		</div>

		<div id="boxes">
			<div class="box">
				<h1>Market</h1>
				<h2>Monitor prices and profit</h2>
				<img src="other_images/shop.png">
			</div>
			<div class="box">
				<h1>Tools</h1>
				<h2>Calculate market profits</h2>
				<img src="other_images/tools.png">
			</div>
			<div class="box">
				<h1>Maps</h1>
				<h2>Browse map layouts</h2>
				<img src="other_images/map.png">
			</div>
		</div>

		<div id="footer-line">
		</div>

		<div class="footer-container">
			<div id="footer-line"></div>
			<div id="footer-trademark">
				<p>Game content and materials are trademarks and copyrights of HowManyRubels.com All rights reserved.</p>
			</div>
			<div id="footer-copyright">
				<p>© 2023 HowManyRubels.com</p>
			</div>
		</div>
	</div>
</body>

</html>