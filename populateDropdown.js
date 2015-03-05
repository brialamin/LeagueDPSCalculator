	//RED RUNES
	var idArray = ["red1", "red2", "red3", "red4", "red5", "red6", "red7", "red8", "red9"];
	var select;
	var options = ["Ability Power", "Armor", "Armor Penetration", "Attack Damage", "Attack Speed", "Cooldown Reduction", "Critical Chance", "Critical Damage", "Health", "Hybrid Penetration", "Magic Penetration", "Magic Resist", "Mana", "Mana Regeneration", "Scaling Ability Power", "Scaling Attack Damage", "Scaling Health", "Scaling Magic Resist", "Scaling Mana"];
	var value = ["5267", "5257", "5253", "5245", "5247", "5265", "5251", "5249", "5255", "5402", "5273", "5259", "5269", "5271", "5268", "5246", "5256", "5260", "5270"];
	for (var i = 0; i < idArray.length; i++) {
		select  = document.getElementById(idArray[i]);
		for (var j = 0; j < options.length; j++) {
			var opt = options[j];
			var val = value[j];
			var el = document.createElement("option");
			el.text = opt;
			el.value = val;
			select.appendChild(el);
		}
	}
	//YELLOW RUNES
	var idArray = ["yellow1", "yellow2", "yellow3", "yellow4", "yellow5", "yellow6", "yellow7", "yellow8", "yellow9"];
	var select;
	var options = ["Ability Power", "Armor", "Attack Damage", "Attack Speed", "Cooldown Reduction", "Critical Chance", "Critical Damage", "Energy", "Energy Regeneration", "Health", "Health Regeneration", "Magic Resist", "Mana", "Mana Regeneration", "Percent Health", "Scaling Ability Power", "Scaling Armor", "Scaling Attack Damage", "Scaling Energy", "Scaling Energy Regeneration", "Scaling Health", "Scaling Health Regeneration", "Scaling Magic Resist", "Scaling Mana", "Scaling Mana Regeneration"];
	var value = ["5327", "5317", "5305", "5307", "5325", "5311", "5309", "5371", "5369", "5315", "5321", "5319", "5329", "5331", "5415", "5328", "5318", "5306", "5372", "5370", "5316", "5322", "5320", "5330", "5332"];
	for (var i = 0; i < idArray.length; i++) {
		select  = document.getElementById(idArray[i]);
		for (var j = 0; j < options.length; j++) {
			var opt = options[j];
			var val = value[j];
			var el = document.createElement("option");
			el.text = opt;
			el.value = val;
			select.appendChild(el);
		}
	}
	//BLUE RUNES
	var idArray = ["blue1", "blue2", "blue3", "blue4", "blue5", "blue6", "blue7", "blue8", "blue9"];
	var select;
	var options = ["Ability Power", "Armor", "Attack Damage", "Attack Speed", "Cooldown Reduction", "Critical Chance", "Critical Damage", "Energy", "Health", "Health Regeneration", "Magic Penetration", "Magic Resist", "Mana", "Mana Regeneration", "Scaling Ability Power", "Scaling Attack Damage", "Scaling Cooldown Reduction", "Scaling Energy", "Scaling Health", "Scaling Magic Resist", "Scaling Mana", "Scaling Mana Regeneration"];
	var value = ["5297", "5287", "5275", "5277", "5295", "5281", "5279", "5371", "5285", "5291", "5303", "5289", "5299", "5301", "5298", "5276", "5296", "5372", "5286", "5290", "5300", "5302"];
	for (var i = 0; i < idArray.length; i++) {
		select  = document.getElementById(idArray[i]);
		for (var j = 0; j < options.length; j++) {
			var opt = options[j];
			var val = value[j];
			var el = document.createElement("option");
			el.text = opt;
			el.value = val;
			select.appendChild(el);
		}
	}
	//ALPHABATIZE REQUIRED STILL FOR BELOW
	//PURPLE RUNES
	var idArray = ["purple1", "purple2", "purple3"];
	var select;
	var options = ["Energy", "Energy Regeneration", "Mana", "Mana Regeneration", "Scaling Mana", "Magic Penetration", "Scaling Mana Regeneration", "Movement Speed", "Death Timer", "Ability Power", "Scaling Ability Power", "Scaling Cooldown", "Cooldown", "Scaling Health Regeneration", "Health Regeneration", "Scaling Magic Resist", "Scaling Armor", "Magic Resist", "Scaling Health", "Armor", "Armor Penetration", "Health", "Critical Chance", "Critical Damage", "Attack Damage", "Scaling Attack Damage", "Attack Speed", "Spell Vamp", "Percent Health", "Hybrid Penetration", "Life Steal", "Experience"];
	var value = ["5374", "5373", "5359", "5361", "5360", "5363", "5362", "5365", "5366", "5357", "5358", "5356", "5355", "5352", "5351", "5350", "5348", "5349", "5346", "5347", "5343", "5345", "5341", "5339", "5335", "5336", "5337", "5409", "5406", "5418", "5412", "5368"];
	for (var i = 0; i < idArray.length; i++) {
		select  = document.getElementById(idArray[i]);
		for (var j = 0; j < options.length; j++) {
			var opt = options[j];
			var val = value[j];
			var el = document.createElement("option");
			el.text = opt;
			el.value = val;
			select.appendChild(el);
		}
	}
	//ITEMS
	