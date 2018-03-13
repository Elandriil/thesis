
<script type="text/javascript">
function moveleft()
{
var pp=document.getElementById("x");
var lefta=parseInt(pp.style.left);
if(lefta>0)
{
var tt=setTimeout("moveleft()",100);
lefta=lefta-10;
pp.style.left=lefta+"px"; 
}
}
function moveright(){
	var pp=document.getElementById("x");
var lefta=parseInt(pp.style.left);
if(lefta>0)
{
var tt=setTimeout("moveright()",100);
lefta=lefta+10;
pp.style.left=lefta+"px"; 
}
	}
	function moveleft1()
{
var pp=document.getElementById("y");
var lefta=parseInt(pp.style.left);
if(lefta>0)
{
var tt=setTimeout("moveleft1()",100);
lefta=lefta-10;
pp.style.left=lefta+"px"; 
}
}
function moveright1(){
	var pp=document.getElementById("y");
var lefta=parseInt(pp.style.left);
if(lefta>0)
{
var tt=setTimeout("moveright1()",100);
lefta=lefta+10;
pp.style.left=lefta+"px"; 
}
	}
</script>
<img src="550540_456251934401387_100000497520728_1738747_1090022039_n.jpeg" id="x" style="position:relative;top:10px;left:125px;"><br><br><br>
<input type="button" value="Move left" onClick="moveleft()">picture
<input type="button" value="Move right" onClick="moveright()"><br>
<input type="button" value="Move left" onClick="moveleft1()">text
<input type="button" value="Move right" onClick="moveright1()">
<h2 id="y" style="position:relative;top:10px;left:125px;">They see me rollin...</h2>
