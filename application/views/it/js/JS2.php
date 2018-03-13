
<script type="text/javascript">
var x;
var y;
var z;
function third1()
{
x=12;
y=32;
alert(x*y);
}
function third2(){
x=12;
y=5
alert(x+y);
}
function third3(){
x=34;
y=12;
z=5;
alert(x+y+z);
}


function third4(){
var xx=prompt("Enter x","");
var yy=prompt("Enter y","");
var zz=prompt("Enter z","");
if(xx!=null && yy!=null && zz!=null)
{
alert(yy*zz/xx);
}
else{alert("u made a mistake");}
}
function second(){
	var secc=new Date();
	alert(secc.getHours()+":"+secc.getMinutes()+"\ndrink\ntea");
	}
</script>
<script>
function first(){
var ln=prompt("Enter ur last name","");
var n=prompt("Enter ur name","");
var fn=prompt("Enter ur first name","");
var w=prompt("Enter ur work","");
var p=prompt("Enter ur position","");
var add=prompt("Enter ur work address","");
if(ln!=null && n!=null && fn!=null && w!=null && p!=null && add!=null)
{
document.getElementById("first").innerHTML="Info<br>"+ln+"<br>"+n+"<br>"+fn+"<br>"+w+"<br>"+p+"<br>"+add;
//alert();
}
else{alert("u made a mistake");}///shows error
}
function twoone(){
	var str="string";
	document.getElementById("twoone").innerHTML="Length of "+str+" is "+str.length;
	}
	function fourth(){
		var xx=prompt("Enter a","");
		var yy=prompt("Enter b","");
		var zz=prompt("Enter c","");
		var h;
		var s;
		var p;
if(xx!=null && yy!=null && zz!=null)
{
	p=(xx+yy+zz)/2;
	s=Math.sqrt(p*(p-xx)*(p-yy)*(p-zz));
	h=(2*s)/xx;
alert("h="+h+"\nS="+s);
}
else{alert("u made a mistake");}
}
	function fifth(){
		var input=prompt("Enter ur name","");
		var str1="Kate";
		var str2="Elandir";
		if(input!=null){
			if(str1.toLowerCase().indexOf(input.toLowerCase())>=0 ){
				alert("Hello "+str1)
				}
				else if(str2.toLowerCase().indexOf(input.toLowerCase())>=0){alert("Hello "+str2)} 
				else{alert("Hello mr/ms X");}
			}
		}	
		function sixth(){
			var month=prompt("Enter month","");
			switch(month.toLowerCase()){
				case "january": 
				case "march": 
				case "may": 
				case "july": case "august": case "october": case "december":
				alert("31 days in that month");
				break;
				case "february": 
				case "april": case "june": case "september": case "november":
				alert("30 or less days");
				break;
				default:
				alert("check ur spelling");
				}
			}
			function eighth(){
				var color=prompt("Enter one rainbow color","");
				switch(color.toLowerCase()){
					case "yellow":
					case "red":
					case "green":
					case "dark blue":
					case "violet":
					case "orange":
					case "light blue":
					alert("This is the color of the rainbow");
					break;
					default: alert("This isnt the color of rainbow");
					
					}
				}
				function eleven(){
					var val=prompt("Enter a number","");
					if(val>=-12 && val<=1){
						document.getElementById("eleven").innerHTML="Yes";
						}
						else{document.getElementById("eleven").innerHTML="No";}
					}
					function twelve(){
						var numRows = parseFloat( prompt("Enter number of rows ", "10") );
var numCols = parseFloat( prompt("Enter number of columns", "10") );
if (isNaN(numRows) || isNaN(numCols)) {
    alert("Rows and columns must be a number");
}else if (numRows < 1 || numCols < 1) {
    alert("Rows and columns must be greater than zero");
}else if (numRows * numCols > 10000) {
    alert("Too many rows or columns");
}else {
    var tblHTML = "", rowHTML;
    for (var row = 0; row <= numRows; row++) {
        rowHTML = "";
        for (var col = 0; col <= numCols; col++) {
            if (row == 0) {
                rowHTML += "<td><strong>" +
                    ((col == 0) ? " " : col) +
                    "</strong> </td>";
            } else if (col == 0) {
                rowHTML += "<td><strong>" +
                    row +
                    "</strong> </td>";
            } else {
                rowHTML += "<td>" +
                    (row * col) +
                    "</td>";
            }
        }
        tblHTML += "<tr>" + rowHTML + "</tr>";
    }
    document.write("<table border=\"1\">" +
        tblHTML +
        "</table>");
}
						}
	
		function fbin(dec2){
			return parseInt(dec2,2);
			}
			function ConvertToBinary(dec) {
            var bits = [];
            var dividend = dec;
            var remainder = 0;
            while (dividend >= 2) {
                remainder = dividend % 2;
                bits.push(remainder);
                dividend = (dividend - remainder) / 2;
            }
            bits.push(dividend);
            bits.reverse();
            return bits.join("");
        }
		function thex(dec3){return Number(dec3).toString(16);}
		function fhex(dec4){return parseInt(dec4,16);}
	function sixt(){
		var count=0;
		var pass="pass";
		var i;
		for(i=0;i<=2;i++){
			var inp=prompt("Enter pass","");
			if(inp!=pass)
			{
				count++;
			if(count==3){
				window.close();
			}
			}
			else{alert("Welcome");
			break;}
			}
		}
		function sevent(){
			var d=new Date();
			var i;
			var weekday=new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";
			if(d.getDay()==1 || d.getDay()==2 || d.getDay()==3 || d.getDay()==4 || d.getDay()==5){
				for(i=0;i<=4;i++){document.write("Today is the day of the week: "+weekday[d.getDay()]+"<br>");}
				}
				else if(d.getDay()==6 || d.getDay()==0){for(i=0;i<=4;i++){document.write("Today is the day of the week: "+weekday[d.getDay()]+". Sunday or satuday-closed<br>");}
				//document.write("Sunday or satuday-closed");
				}
			//	else{alert("Holysay");}
			}
			function twotwo(){
				var str=prompt("Enter a sentence and the second word shall be magically shown!","");
				var words=str.split(" ")[1];
				//document.write(words);
				alert(words);
				}
			function twofive(){
				var a=prompt("Enter user",""); 
				var b=prompt("Enter user",""); 
				var	c=prompt("Enter user",""); 
				var d=prompt("Enter user",""); 
				var e=prompt("Enter user",""); 
				var arr=[a,b,c,d,e];
				myWindow=window.open('','','width=800,height=600')
				myWindow.document.write("<ol type='circle'>")
				var m=arr.sort();
				for(var i=0;i<m.length;i++){
				myWindow.document.write("<li>"+m[i]+"</li>");
}
myWindow.document.write("</ol>")
myWindow.focus()
				}
	
</script>
</head>

<body>
<h2>Third</h2>
<p>32*12</p>
<button type="button" onClick="third1()">result</button>
<br><p>12+5</p>
<button type="button" onClick="third2()">result</button>
<br><p>34+12+5</p>
<button type="button" onClick="third3()">result</button>
<br><p>y*z/x</p>
<button type="button" onClick="third4()">result</button>
<br><h2>First</h2><br><p id="first"></p>
<button type="button" onClick="first()">result</button>
<br><h2>Second</h2><br><p></p>
<button type="button" onClick="second()">result</button>
<br><h2>Fourth</h2><br><p></p>
<button type="button" onClick="fourth()">result</button>
<br><h2>21</h2><br><p id="twoone"></p>
<button type="button" onClick="twoone()">result</button>
<br><h2>Fifth</h2><br>
<button type="button" onClick="fifth()">result</button>
<br><h2>Sixth</h2><br>
<button type="button" onClick="sixth()">result</button>
<br><h2>Eighth</h2><br>
<button type="button" onClick="eighth()">result</button>
<br><h2>Eleventh</h2><br><p>inserted number belongs betveen [-12;1]?</p><p id="eleven"></p>
<button type="button" onClick="eleven()">result</button>
<br><h2>Twelve</h2><br>
<button type="button" onClick="twelve()">result</button>

<br><h2>Thirteen</h2><br>
To Binary:<input type="text" id="txtDec" />
    <input type="button" value="Convert" onClick="document.getElementById('spBin').innerHTML=ConvertToBinary(document.getElementById('txtDec').value);" />
    <span id="spBin"></span>
    <br>
From binary:<input type="text" id="txtDec2" />
    <input type="button" value="Convert" onClick="document.getElementById('spBin2').innerHTML=fbin(document.getElementById('txtDec2').value);" />
    <span id="spBin2"></span>
    
    <br><h2>Fourteen</h2><br>
To hex:<input type="text" id="txtDec3" />
    <input type="button" value="Convert" onClick="document.getElementById('spBin3').innerHTML=thex(document.getElementById('txtDec3').value);" />
    <span id="spBin3"></span><br>
    From hex:<input type="text" id="txtDec4" />
    <input type="button" value="Convert" onClick="document.getElementById('spBin4').innerHTML=fhex(document.getElementById('txtDec4').value);" />
    <span id="spBin4"></span>
   <br><h2>Sixteen</h2><br>
   <button type="button" onClick="sixt()">result</button>
    <br><h2>Seventeen</h2><br>
   <button type="button" onClick="sevent()">result</button>

    <br><h2>Twentytwo</h2><br>
   <button type="button" onClick="twotwo()">result</button>
      <br><h2>Twentyfive</h2><br>
   <button type="button" onClick="twofive()">result</button>
