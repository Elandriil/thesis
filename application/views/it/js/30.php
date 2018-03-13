

<!-- width 102px; and height 102 px -->

<style>

div.bound {display:block; border-style:solid;

width:502px;height:402px; border-width:1px}

div.move { position:absolute; }

</style>

<script language="javascript">

var x = 5; //Starting x coord.

var y = 5; //Starting y coord.

var max_x = 400; //maximum x coord.

var max_y = 300; //maximum y coord.

var xoffset = 10; //Move 10px every step

var yoffset = 10; //Move 10px every step

function go()

{

moveLogo()

}

function moveLogo() {

x = x + xoffset;

y = y + yoffset;

//Move the image to the new location

document.getElementById("msucs").style.top = y+'px';

document.getElementById("msucs").style.left = x+'px';

//if reach boundaries, reset offset vectors

if ((x+xoffset > max_x) || (x+xoffset < 0))

xoffset *=-1;

if ((y+yoffset > max_y) || (y+yoffset < 0))

yoffset *=-1;

window.setTimeout('moveLogo()',100);

//call moveLogo every 100 ms

}

</script>



<body>

<div class="bound">

<div id="msucs" class="move">

<img src="cs_logo2.png" alt="need image here" onMouseOver="moveLogo()" />

</div>

</div>

