<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="/extra/jquery.magnifier.js">

/***********************************************
* jQuery Image Magnify- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
</head>
<body>
<?php 	
	if(isset($picture)){  
		foreach($picture as $row)
		{
			echo '<br>
			<img src="'.$row->p_link.'" class="magnify" style="width:200px;" />';
				}
		}?>

