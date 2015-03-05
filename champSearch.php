<?php
		//file locations for static data
		$urlChamp = './res/5.1.1/data/en_US/champion/';
		$urlRune = './res/5.1.1/data/en_US/rune.json';
		$urlItem = './res/5.1.1/data/en_US/item.json';
		if(isset($_POST['action']))
		{
			if(isset($_POST['champ']))
			{
				//function to handle rune ids from the page
				$runes = getRuneIDsfromPage();
				$stats = getRuneStats($runes, $urlRune);
				//retrieving data from DDragon and formatting data with calculations
				$champ = $_POST['champ'];
				$finalURL = $urlChamp . $champ . '.json';
				$string = file_get_contents($finalURL);
				$champData = json_decode($string, true);
				$champASOffSet = $champData['data'][$champ]['stats']['attackspeedoffset'];
				$champASPerLevel = $champData['data'][$champ]['stats']['attackspeedperlevel'];
				$champAS = number_format(0.625/(1+floatval($champASOffSet))*$stats[1], 3);
				$champAD = $champData['data'][$champ]['stats']['attackdamage'] + $stats[0];
				$champADPerLevel = $champData['data'][$champ]['stats']['attackdamageperlevel'];
				$champADArray[0] = round($champAD);
				$champASArray[0] = 0;
				
				//stat calculations via riot's new stat scaling
				for ($i = 1; $i < 17; $i++)
				{
					$champADArray[$i] = floatval($champADArray[$i-1]) + (floatval($champADPerLevel) * ((($i+1)*3.5-7 + 72)/100));
					$champASArray[$i] = floatval($champASArray[$i-1]) + (floatval($champASPerLevel) * ((($i+1)*3.5-7 + 72)/100));
				}
				$champADEarlyGame = round($champADArray[2] + $stats[0]);
				$champADMidGame = round($champADArray[10] + $stats[0]);
				$champADLateGame = round($champADArray[15] + $stats[0]);
				$champASEarlyGame = number_format($champAS * (1 + $champASArray[2]/100)*$stats[1], 3);
				$champASMidGame = number_format($champAS * (1 + $champASArray[10]/100)*$stats[1], 3);
				$champASLateGame = number_format($champAS * (1 + $champASArray[15]/100)*$stats[1], 3);
				$champDPSLevel1 = $champADArray[0] * $champAS;
				$champDPSEarlyGame = $champADEarlyGame * $champASEarlyGame;
				$champDPSMidGame = $champADMidGame * $champASMidGame;
				$champDPSLateGame = $champADMidGame * $champASLateGame;
				
				//json returns
				$return['champ'] = $champ;
				$return['title'] = $champData['data'][$champ]['title'];
				$return['as'] = $stats[1];
				$return['ad'] = $stats[0];
				$return['AD1'] = $champAD;
				$return['AD3'] = $champADEarlyGame;
				$return['AD11'] = $champADMidGame;
				$return['AD16'] = $champADLateGame;
				$return['DPS1'] = $champDPSLevel1;
				$return['DPS3'] = $champDPSEarlyGame;
				$return['DPS11'] = $champDPSMidGame;
				$return['DPS16'] = $champDPSLateGame;				
				//$return['red'] = $runes[0];
				//$return['yellow'] = $runes[1];
				//$return['blue'] = $runes[2];
				//$return['purple'] = $runes[3];
				echo json_encode($return);
			}
			else
			{
				echo "no champion input1"; 
			}
		}
		else
		{
			echo "No champion input!";
		}
		
		function getRuneIDsfromPage()
		{
			$redRunes = $_POST['red'];
			$yellowRunes = $_POST['yellow'];
			$blueRunes = $_POST['blue'];
			$purpleRunes = $_POST['purple'];
			$runes[0] = $redRunes;
			$runes[1] = $yellowRunes;
			$runes[2] = $blueRunes;
			$runes[3] = $purpleRunes;
			return $runes;
		}
		
		function getRuneStats($runes, $urlRune)
		{
			$string = file_get_contents($urlRune);
			$runeData = json_decode($string, true);
			$runeSearch = $runeData['data'];
			$atkdmg = 0;
			$atkspd = 1;
			//$armpen = 0;
			for($i = 0; $i < count($runes[0]); $i++)
			{
				$runeIdRed = $runes[0][$i];
				$runeIdYellow = $runes[1][$i];
				$runeIdBlue = $runes[2][$i];
				if($i < 3)
				{
					$runeIdPurple = $runes[3][$i];
				}
				else
				{
					$runeIdPurple = 0;
				}
				if($runeIdRed != 0)
				{
					//attack damage
					if(isset($runeSearch[$runeIdRed]['stats']['FlatPhysicalDamageMod']))
					{
						$atkdmg += floatval($runeSearch[$runeIdRed]['stats']['FlatPhysicalDamageMod']);
					}
					//attack speed
					if(isset($runeSearch[$runeIdRed]['stats']['PercentAttackSpeedMod']))
					{
						$atkspd += floatval($runeSearch[$runeIdRed]['stats']['PercentAttackSpeedMod']);
					}
				}
				if($runeIdYellow != 0)
				{
					//attack damage
					if(isset($runeSearch[$runeIdYellow]['stats']['FlatPhysicalDamageMod']))
					{
						$atkdmg += floatval($runeSearch[$runeIdYellow]['stats']['FlatPhysicalDamageMod']);
					}
					//attack speed
					if(isset($runeSearch[$runeIdYellow]['stats']['PercentAttackSpeedMod']))
					{
						$atkspd += floatval($runeSearch[$runeIdYellow]['stats']['PercentAttackSpeedMod']);
					}
				}
				if($runeIdBlue != 0)
				{
					//attack damage
					if(isset($runeSearch[$runeIdBlue]['stats']['FlatPhysicalDamageMod']))
					{
						$atkdmg += floatval($runeSearch[$runeIdBlue]['stats']['FlatPhysicalDamageMod']);
					}
					//attack speed
					if(isset($runeSearch[$runeIdBlue]['stats']['PercentAttackSpeedMod']))
					{
						$atkspd += floatval($runeSearch[$runeIdBlue]['stats']['PercentAttackSpeedMod']);
					}
				}
				if($runeIdPurple != 0)
				{
					//attack damage
					if(isset($runeSearch[$runeIdPurple]['stats']['FlatPhysicalDamageMod']))
					{
						$atkdmg += floatval($runeSearch[$runeIdPurple]['stats']['FlatPhysicalDamageMod']);
						// echo 'AD + Purple';
					}
					//attack speed
					if(isset($runeSearch[$runeIdPurple]['stats']['PercentAttackSpeedMod']))	
					{
						$atkspd += floatval($runeSearch[$runeIdPurple]['stats']['PercentAttackSpeedMod']);
					}
				}
			}

			
			
			//array values for the returned array $stats
			$stats[0] = $atkdmg;
			$stats[1] = $atkspd;
			//$stats[2] = $armpen;
			return $stats;
			
		}
		
		/*function getStatsFromFile($stats, $runeId, $atkdmg, $atkspd, $cchance, $cdam, $armpenflat, $armpenpercent)
		{
			
			return $stats;
		}*/
?>