<?php
session_start();
?>

<html>
<head>
	<title>CS 401 Project</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>

	<?php include 'navigation.php'; ?>

	<div id="dropdown-search">
		<div class="dropdowns-wrapper">
			<div id="trader-menu" class="dropdown-menu">
				<select>
				  <option value="">Trader</option>
				  <option value="Prapor">Prapor</option>
				  <option value="Therapist">Therapist</option>
				  <option value="Fence">Fence</option>
				  <option value="Skier">Skier</option>
				  <option value="Peacekeeper">Peacekeeper</option>
				  <option value="Mechanic">Mechanic</option>
				  <option value="Ragman">Ragman</option>
				  <option value="Jaeger">Jaeger</option>
				  <option value="The Punisher">The Punisher</option>
				</select>
			</div>
			<div id="item-menu" class="dropdown-menu">
				<select>
					<option value="">Item</option>
					<option value="Headsets">Headsets</option>
					<option value="Helmets">Helmets</option>
					<option value="Glasses">Glasses</option>
					<option value="Armors">Armors</option>
					<option value="Rigs">Rigs</option>
					<option value="Backpacks">Backpacks</option>
					<option value="Guns">Guns</option>
					<option value="Mods">Mods</option>
					<option value="Pistol Grips">Pistol Grips</option>
					<option value="Suppressors">Suppressors</option>
					<option value="Grenades">Grenades</option>
					<option value="Containers">Containers</option>
					<option value="Barter Items">Barter Items</option>
					<option value="Keys">Keys</option>
					<option value="Provisions">Provisions</option>

				</select>
			</div>
		</div>
		<div id="search-box">
				<input type="text" placeholder="Search item..." />
		</div>
	</div>
	<div class="main-content">
		<div id="table-container">
			<table>
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Sell to Trader</th>
						<th>Sell to Flea</th>
						<th>Profit</th>
					</tr>
				</thead>
				<tbody>


				</tbody>
			</table>
				<div class="content">
			      <button id="load-more">Load More</button>
			    </div>
				<div class="footer-container">
					<div id="footer-line"></div>
					<div id="footer-trademark"><p>Game content and materials are trademarks and copyrights of HowManyRubels.com All rights reserved.</p></div>
					<div id="footer-copyright"><p>© 2023 HowManyRubels.com</p></div>
				</div>
		</div>

	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="tarkov-api.js"></script>
</body>
</html>



