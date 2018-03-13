<!--<html>
<head>-->
<script type="text/javascript" src="/extra/coin-slider/jquery-1.4.2.js"></script>
<script type="text/javascript" src="/extra/coin-slider/coin-slider.js"></script>
<script type="text/javascript" src="/extra/coin-slider/coin-slider.min.js"></script>



<link rel="stylesheet" href="/extra/coin-slider/coin-slider-styles.css" type="text/css" />
<!--</head>

<body>-->

        <div id="coin-slider">
<?php 												
if(isset($picture)){foreach($picture as $row){ 
	
    echo '<a href="#" target="_blank">
        <img src="'.$row->p_link.'">
        <span>
            '.$row->name_pic.'
        </span>
    </a>';
	}}
	
	?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#coin-slider").coinslider({ width: 800, delay: 2000 });
    });
</script>
<!-- options
width: 565, // width of slider panel
height: 290, // height of slider panel
spw: 7, // squares per width
sph: 5, // squares per height
delay: 3000, // delay between images in ms
sDelay: 30, // delay beetwen squares in ms
opacity: 0.7, // opacity of title and navigation
titleSpeed: 500, // speed of title appereance in ms
effect: '', // random, swirl, rain, straight
navigation: true, // prev next and buttons
links : true, // show images as links
hoverPause: true // pause on hover



</body>
</html>
-->