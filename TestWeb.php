<script type='text/javascript' src='//code.jquery.com/jquery-1.11.2.js'></script>

<head>

</head>

<body>
	
	<br />
	Champion:
	<br />
	<input type="text" id="champ">
	<br />
	<br />
	Items:
	<br />
	<select id="item1">
		<option value="0">Item 1</option>
	</select>
	<select id="item2">
		<option value="0">Item 2</option>
	</select>
	<select id="item3">
		<option value="0">Item 3</option>
	</select>
	<select id="item4">
		<option value="0">Item 4</option>
	</select>
	<select id="item5">
		<option value="0">Item 5</option>
	</select>
	<select id="item6">
		<option value="0">Item 6</option>
	</select>
	<br />
	<br />
	Red Runes:
	<br />
	<select id="red1">
		<option value="0">Rune 1</option>
	</select>
	<select id="red2">
		<option value="0">Rune 2</option>
	</select>
	<select id="red3">
		<option value="0">Rune 3</option>
	</select>
	<select id="red4">
		<option value="0">Rune 4</option>
	</select>
	<select id="red5">
		<option value="0">Rune 5</option>
	</select>
	<select id="red6">
		<option value="0">Rune 6</option>
	</select>
	<select id="red7">
		<option value="0">Rune 7</option>
	</select>
	<select id="red8">
		<option value="0">Rune 8</option>
	</select>
	<select id="red9">
		<option value="0">Rune 9</option>
	</select>
	<br />
	<br />
	Yellow Runes:
	<br />
	<select id="yellow1">
		<option value="0">Rune 1</option>
	</select>
	<select id="yellow2">
		<option value="0">Rune 2</option>
	</select>
	<select id="yellow3">
		<option value="0">Rune 3</option>
	</select>
	<select id="yellow4">
		<option value="0">Rune 4</option>
	</select>
	<select id="yellow5">
		<option value="0">Rune 5</option>
	</select>
	<select id="yellow6">
		<option value="0">Rune 6</option>
	</select>
	<select id="yellow7">
		<option value="0">Rune 7</option>
	</select>
	<select id="yellow8">
		<option value="0">Rune 8</option>
	</select>
	<select id="yellow9">
		<option value="0">Rune 9</option>
	</select>
	<br />
	<br />
	Blue Runes:
	<br />
	<select id="blue1">
		<option value="0">Rune 1</option>
	</select>
	<select id="blue2">
		<option value="0">Rune 2</option>
	</select>
	<select id="blue3">
		<option value="0">Rune 3</option>
	</select>
	<select id="blue4">
		<option value="0">Rune 4</option>
	</select>
	<select id="blue5">
		<option value="0">Rune 5</option>
	</select>
	<select id="blue6">
		<option value="0">Rune 6</option>
	</select>
	<select id="blue7">
		<option value="0">Rune 7</option>
	</select>
	<select id="blue8">
		<option value="0">Rune 8</option>
	</select>
	<select id="blue9">
		<option value="0">Rune 9</option>
	</select>
	<br />
	<br />
	Purple Runes:
	<br />
	<select id="purple1">
		<option value="0">Rune 1</option>
	</select>
	<select id="purple2">
		<option value="0">Rune 2</option>
	</select>
	<select id="purple3">
		<option value="0">Rune 3</option>
	</select>
	<br />
	<br />
	<input type="button" value="Calculate" onclick="champSearch();" id="Calc" />
	<br />
	<span id="test"></span>
	<span id="test1"></span>
	<span id="champStats"></span>
	
	<!--script containing ajax for querying the champion-->
	<script>
		$("#champ").keyup(function(event){
			if(event.keyCode == 13){
				$("#Calc").click();
			}
		});
		function champSearch()
		{
			var champNameVanilla = $("#champ").val();
			var champName = champNameVanilla.charAt(0).toUpperCase() + champNameVanilla.slice(1);
			var redRunes = [$("#red1").val(), $("#red2").val(), $("#red3").val(), $("#red4").val(), $("#red5").val(), $("#red6").val(), $("#red7").val(), $("#red8").val(), $("#red9").val()];
			var blueRunes = [$("#blue1").val(), $("#blue2").val(), $("#blue3").val(), $("#blue4").val(), $("#blue5").val(), $("#blue6").val(), $("#blue7").val(), $("#blue8").val(), $("#blue9").val()];
			var yellowRunes = [$("#yellow1").val(), $("#yellow2").val(), $("#yellow3").val(), $("#yellow4").val(), $("#yellow5").val(), $("#yellow6").val(), $("#yellow7").val(), $("#yellow8").val(), $("#yellow9").val()];
			var purpleRunes = [$("#purple1").val(), $("#purple2").val(), $("#purple3").val()];
			$.ajax({
				type: "post",
				url: 'champSearch.php',
				data: {action:'set', champ: champName, red: redRunes, blue: blueRunes, yellow: yellowRunes, purple: purpleRunes},
				success:function(html) 
				{
					var champData = JSON.parse(html);
					var champ = champData['champ'];
					var title = champData['title'];
					var fullName = champ + ", " + title;
					var lv1DPS = champData['DPS1'];
					var lv3DPS = champData['DPS3'];
					var lv11DPS = champData['DPS11'];
					var lv16DPS = champData['DPS16'];
					document.getElementById("champStats").innerHTML = fullName + "<br />" + 
																	  "Level 1 Auto DPS: " + lv1DPS + "<br />" + 
																	  "Level 3 Auto DPS: " + lv3DPS + "<br />" + 
																	  "Level 11 Auto DPS: " + lv11DPS + "<br />" + 
																	  "Level 16 Auto DPS: " + lv16DPS + "<br />";
				}
			});
		}
	</script>
		
</body>
<!--script filling the runes and items dropdown menus-->
<script type='text/javascript' src='populateDropdown.js'></script>
