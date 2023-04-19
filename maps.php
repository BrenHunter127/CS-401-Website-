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




    <h2> Escape from Tarkov Maps </h2>

    <div id="customs-p">
    <p>
        There are 12 different locations on the Escape from Tarkov map, of which 9 have been released publicly so far. Although eventually all maps will be connected, they are currently all apart from one another.
    </p>
	</div>

    <div id="customs">
    <h1> Customs </h1>
	</div>

	<div id="customs-p2">
	<p>
        A large area of industrial park land situated adjacent to the factory zone. The area houses a customs terminal, fuel storage facilities, offices, and dorms, as well as a variety of other infrastructure and buildings.
    </p>
	</div>
 
    <div id="map-boxes">
    <div class="map-box">
        <div class="img-wrapper">
            <img src="map_images/customs1.jpg">
        </div>
    </div>
    <div class="map-box">
        <div class="img-wrapper">
            <img src="map_images/customs2.jpg">
        </div>
    </div>
    <div class="map-box">
        <div class="img-wrapper">
            <img src="map_images/customs3.jpg">
        </div>
    </div>
</div>

    <div id="reserves">
    <h1> Reserve </h1>
	</div>
	
	<div id="reserve-p">
	<p>
        The secret Federal State Reserve Agency base that, according to urban legends, contains enough supplies to last for years: food, medications, and other resources, enough to survive an all-out nuclear war.
    </p>
	</div>

    <div id="map-boxes">
    <div class="rmap-box-small">
        <div class="img-wrapper">
            <img src="map_images/reserve1.jpg">
        </div>
    </div>
    <div class="lh-map-box">
        <div class="img-wrapper">
            <img src="map_images/reserve2.jpg">
        </div>
    </div>
    <div class="lh-map-box">
        <div class="img-wrapper">
            <img src="map_images/reserve3.jpg">
        </div>
    </div>
</div>

    <div class="footer-container">
        <div id="footer-line"></div>
        <div id="footer-trademark"><p>Game content and materials are trademarks and copyrights of HowManyRubels.com All rights reserved.</p></div>
        <div id="footer-copyright"><p>© 2023 HowManyRubels.com</p></div>
    </div>

    <script>
  const mapBoxes = document.querySelectorAll('.map-box, .lh-map-box, .rmap-box-small');

mapBoxes.forEach((mapBox, index) => {
  const imgWrapper = mapBox.querySelector('.img-wrapper');
  
  imgWrapper.addEventListener('mouseover', () => {
    const parentClassList = mapBox.classList;
    if (parentClassList.contains('rmap-box-small')) {
      imgWrapper.classList.add('hovered-image-right');
    } else if (parentClassList.contains('lh-map-box')) {
      imgWrapper.classList.add('hovered-image-left');
    } else {
      if (index % 3 === 0) {
        imgWrapper.classList.add('hovered-image-left');
      } else if (index % 3 === 1) {
        imgWrapper.classList.add('hovered-image-center');
      } else {
        imgWrapper.classList.add('hovered-image-right');
      }
    }
  });

  imgWrapper.addEventListener('mouseout', () => {
    imgWrapper.classList.remove('hovered-image-right', 'hovered-image-left', 'hovered-image-center');
  });
});



</script>

</body>
</html>
