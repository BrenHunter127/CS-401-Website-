<?php
session_start();
?>

<html>
<head>
	<title>CS 401 Project</title>
	<link rel="stylesheet" type="text/css" href="maps.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body class="about">

	<?php include 'navigation.php'; ?>

	<div id="map-name-top">
		<h1>Customs</h1>
	</div>
	<div id="map-boxes">
		<div class="map-box">
		</div>
		<div class="map-box">
		</div>
		<div class="map-box">
		</div>
	</div>

	<div id="map-names">
		<h1>Factory</h1>
	</div>
	<div id="map-boxes">
		<div class="map-box">
		</div>
		<div class="map-box">
		</div>
		<div class="map-box">
		</div>
	</div>

	<div class="footer-container">
		<div id="footer-line"></div>
		<div id="footer-trademark"><p>Game content and materials are trademarks and copyrights of HowManyRubels.com All rights reserved.</p></div>
		<div id="footer-copyright"><p>© 2023 HowManyRubels.com</p></div>
	</div>

</body>
</html>
