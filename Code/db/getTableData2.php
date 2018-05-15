<?php

//return object that has data for table visualization

//weapon type
$other=($_POST['wt_Other1']);
$hands=($_POST['wt_Hands1']);
$knife=($_POST['wt_Knife1']);
$firearm=($_POST['wt_Firearm1']);
$none=($_POST['wt_None1']);


//crime type
$aggAssault = ($_POST['wt_AggAssault1']);
$arson = ($_POST['wt_Arson1']);
$assaultByThreat = ($_POST['wt_AssaultByThreat1']);
$autoTheft = ($_POST['wt_AutoTheft1']);
$burglary = ($_POST['wt_Burglary1']);
$commonAssault = ($_POST['wt_CommonAssault1']);
$homicide = ($_POST['wt_Homicide1']);
$larceny = ($_POST['wt_Larceny1']);
$larcenyAuto = ($_POST['wt_LarcenyAuto1']);
$rape = ($_POST['wt_Rape1']);
$robberyStreet = ($_POST['wt_RobberyStreet1']);
$robberyCar = ($_POST['wt_RobberyCar1']);
$robberyCom = ($_POST['wt_RobberyCom1']);
$robberyRes = ($_POST['wt_RobberyRes1']);
$shooting = ($_POST['wt_Shooting1']);


//district
$central = ($_POST['wt_Northern1']);
$western = ($_POST['wt_Southern1']);
$northEastern = ($_POST['wt_Eastern1']);
$southWestern = ($_POST['wt_Western1']);
$southEastern = ($_POST['wt_Central1']);
$southern = ($_POST['wt_NorthEastern1']);
$northern = ($_POST['wt_NorthWestern1']);
$eastern = ($_POST['wt_SouthEastern1']);
$northWestern = ($_POST['wt_SouthWestern1']);


//date / time

$startDate = ($_POST['wt_StartDate1']);
$startDate = date("$startDate");

$endDate = ($_POST['wt_EndDate1']);
$endDate = date("$endDate");

$startTime = ($_POST['wt_StartTime1']);
$startTime = date("$startTime");

$endTime = ($_POST['wt_EndTime1']);
$endTime = date("$endTime");

$insideOne = ($_POST['wt_inside1']);
$inside = ($_POST['wt_inside21']);
$outsideOne = ($_POST['wt_outside1']);
$outside = ($_POST['wt_outside21']);
$unspecified = ($_POST['wt_unspecified1']);

$berea = ($_POST['wt_berea1']);
$cherryHill = ($_POST['wt_cherryHill1']);
$dorchester = ($_POST['wt_dorchester1']);
$ellwoodPark = ($_POST['wt_ellwoodPark1']);
$fairfield = ($_POST['wt_fairfield1']);
$greenmont = ($_POST['wt_greenmont1']);
$orangeville = ($_POST['wt_orangeville1']);
$madison = ($_POST['wt_madison1']);
$pulaski = ($_POST['wt_pulaski1']);
$rosemont = ($_POST['wt_rosemont1']);
$neighOther = ($_POST['wt_neighOther1']);

$wt_alley = ($_POST['wt_alley']);
$wt_apt = ($_POST['wt_apt']);
$wt_aptTwo = ($_POST['wt_aptTwo']);
$wt_atm = ($_POST['wt_atm']);
$wt_bank = ($_POST['wt_bank']);
$wt_bar = ($_POST['wt_bar']);
$wt_barber = ($_POST['wt_barber']);
$wt_bridge = ($_POST['wt_bridge']);
$wt_bus = ($_POST['wt_bus']);
$wt_busTwo = ($_POST['wt_busTwo']);
$wt_auto = ($_POST['wt_auto']);
$wt_busThree = ($_POST['wt_busThree']);
$wt_busFour = ($_POST['wt_busFour']);
$wt_carry = ($_POST['wt_carry']);
$wt_conv = ($_POST['wt_conv']);
$wt_cloth = ($_POST['wt_cloth']);
$wt_shop = ($_POST['wt_shop']);
$wt_court = ($_POST['wt_court']);
$wt_dept = ($_POST['wt_dept']);
$wt_driveway = ($_POST['wt_driveway']);
$wt_drug = ($_POST['wt_drug']);
$wt_dwelling = ($_POST['wt_dwelling']);
$wt_fast = ($_POST['wt_fast']);
$wt_fire = ($_POST['wt_fire']);
$wt_garage = ($_POST['wt_garage']);
$wt_garageTwo = ($_POST['wt_garageTwo']);
$wt_gas = ($_POST['wt_gas']);
$wt_grocery = ($_POST['wt_grocery']);
$wt_home = ($_POST['wt_home']);
$wt_hosp = ($_POST['wt_hosp']);
$wt_hotel = ($_POST['wt_hotel']);
$wt_laundry = ($_POST['wt_laundry']);
$wt_lightRail = ($_POST['wt_lightRail']);
$wt_liquor = ($_POST['wt_liquor']);
$wt_market = ($_POST['wt_market']);
$wt_office = ($_POST['wt_office']);
$wt_rec = ($_POST['wt_rec']);
$wt_religious = ($_POST['wt_religious']);
$wt_retail = ($_POST['wt_retail']);
$wt_rest = ($_POST['wt_rest']);
$wt_row = ($_POST['wt_row']);
$wt_park = ($_POST['wt_park']);
$wt_parking = ($_POST['wt_parking']);
$wt_parkingTwo = ($_POST['wt_parkingTwo']);
$wt_play = ($_POST['wt_play']);
$wt_porch = ($_POST['wt_porch']);
$wt_publ = ($_POST['wt_publ']);
$wt_publTwo = ($_POST['wt_publTwo']);
$wt_school = ($_POST['wt_school']);
$wt_specialty = ($_POST['wt_specialty']);
$wt_stadium = ($_POST['wt_stadium']);
$wt_streetCap = ($_POST['wt_streetCap']);
$wt_street = ($_POST['wt_street']);
$wt_subway = ($_POST['wt_subway']);
$wt_vac = ($_POST['wt_vac']);
$wt_war = ($_POST['wt_war']);
$wt_whole = ($_POST['wt_whole']);
$wt_yard = ($_POST['wt_yard']);
$wt_yardTwo = ($_POST['wt_yardTwo']);
$wt_otherOne = ($_POST['wt_otherOne']);
$wt_otherTwo = ($_POST['wt_otherTwo']);
$wt_otherThree = ($_POST['wt_otherThree']);
$wt_otherFour = ($_POST['wt_otherFour']);
$wt_rent = ($_POST['wt_rent']);


$db = new SQLite3('mydb.db');

//$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");
//above tests all the different filters, now combine them to one SQL statement
//might remove lat

if($none == "NONE"){
	

 		if($startTime < $endTime){
 	
 						if($unspecified == "NONE"){
 							
 								if($wt_otherOne == "OTHER/RESI"){
 									
 									$results = $db->query("
 
 									SELECT sub6.*
 		
 										FROM( 
 									
 									 SELECT sub5.*
	
 										FROM( SELECT sub4.*
 
 										FROM (SELECT sub3.*
  
  
  									FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  									FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 								='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  					
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 										)sub3
 			
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
				
										WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside' or inside_outside IS NULL)
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
										
	
 										;");
 									}else{
 										$results = $db->query("
 
 									SELECT sub6.*
 		
 										FROM( 
 									
 									 SELECT sub5.*
	
 										FROM( SELECT sub4.*
 
 										FROM (SELECT sub3.*
  
  
  									FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  									FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 								='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  					
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 										)sub3
 			
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
				
										WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside' or inside_outside IS NULL)
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
										
	
 										;");
 									}
 										
 										
 								}else{
 				
 									if($wt_otherOne == "OTHER/RESI"){
 											$results = $db->query("
 											SELECT sub6.*
 		
 										FROM( 
 											SELECT sub5.*
	
 											FROM( SELECT sub4.*
 
 											FROM (SELECT sub3.*
  
  
  										FROM (SELECT sub2.* 
  
  										FROM ( SELECT sub.* 
  
  										FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 										='$knife' or weapon ='$firearm' or weapon IS NULL)
  															)sub
  					
  													WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  													= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  													'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  													'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  														'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  															'$shooting' or sub.description IS NULL)
  											)sub2
												WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 					
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
		
										WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside')
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
										
										
					
 									;");
 									
 								}else{
 									$results = $db->query("
 											SELECT sub6.*
 		
 										FROM( 
 											SELECT sub5.*
	
 											FROM( SELECT sub4.*
 
 											FROM (SELECT sub3.*
  
  
  										FROM (SELECT sub2.* 
  
  										FROM ( SELECT sub.* 
  
  										FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 										='$knife' or weapon ='$firearm' or weapon IS NULL)
  															)sub
  					
  													WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  													= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  													'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  													'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  														'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  															'$shooting' or sub.description IS NULL)
  											)sub2
												WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 					
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
		
										WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside')
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
										
										
					
 									;");
 								}
 							}
 					
 		}else{
 	
 				if($unspecified == "NONE"){
 					
 						if($wt_otherOne == "OTHER/RESI"){
 
 										$results = $db->query("
 		
 										SELECT sub6.*
 		
 										FROM( SELECT sub5.*
	
 										FROM( SELECT sub4.*
 
 										FROM (SELECT sub3.*
  
  
  									FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  	
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  							 						='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  			
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  											)sub2
											WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
											sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 											or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
											WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
											)sub4
		
											WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
											)sub5
			
											WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
											or inside_outside = '$outside' or inside_outside IS NULL)
											
											)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 												;");
 												
 											}else{
 												
 												$results = $db->query("
 		
 										SELECT sub6.*
 		
 										FROM( SELECT sub5.*
	
 										FROM( SELECT sub4.*
 
 										FROM (SELECT sub3.*
  
  
  									FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  	
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  							 						='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  			
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  											)sub2
											WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
											sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 											or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
											WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
											)sub4
		
											WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
											)sub5
			
											WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
											or inside_outside = '$outside' or inside_outside IS NULL)
											
											)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent')
 												;");
 												
 											}
 												
 											
 							}else{
 							
 							
 									if($wt_otherOne == "OTHER/RESI"){
 											$results = $db->query("
 											SELECT sub6.*
 		
 										FROM( 
 		
 											SELECT sub5.*
	
 											FROM( SELECT sub4.*
 
 											FROM (SELECT sub3.*
  
  
  										FROM (SELECT sub2.* 
  
  										FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  							 						='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  			
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 										)sub3
 			
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
		
										WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside')
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 										;");
 										
 									}else{
 										$results = $db->query("
 											SELECT sub6.*
 		
 										FROM( 
 		
 											SELECT sub5.*
	
 											FROM( SELECT sub4.*
 
 											FROM (SELECT sub3.*
  
  
  										FROM (SELECT sub2.* 
  
  										FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  							 						='$knife' or weapon ='$firearm' or weapon IS NULL)
  													)sub
  			
  											WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  											= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  											'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  											'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  											'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  											'$shooting' or sub.description IS NULL)
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 										)sub3
 			
										WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
										)sub4
		
										WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
										)sub5
			
										WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
										or inside_outside = '$outside')
										
										)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
 										;");
 									}
 						}
			}
 //$results = $db->query("SELECT * FROM mydb;");
}else{
	
	if($startTime < $endTime){
		
		if($unspecified == "NONE"){
			
			if($wt_otherOne == "OTHER/RESI"){
 		$results = $db->query("
 		SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
  		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside' or inside_outside IS NULL)
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 							;");
 							
 						}else{
 							$results = $db->query("
 		SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
  		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside' or inside_outside IS NULL)
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
 							;");
 						}
 							
 						}else{
 							
 							if($wt_otherOne == "OTHER/RESI"){
 								
 							$results = $db->query("
 							SELECT sub6.*
 		
 										FROM( 
 							SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
  		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside')
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 							;");
 							
 						}else{
 							$results = $db->query("
 							SELECT sub6.*
 		
 										FROM( 
 							SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
  		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside')
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
 							;");
 						}
 						}
 							
 	}else{
 		
 		if($unspecified == "NONE"){
 			
 			if($wt_otherOne == "OTHER/RESI"){
 			
 		$results = $db->query("
 		SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
 	 		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside' or inside_outside IS NULL)
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 							;");
 							
 						}else{
 							$results = $db->query("
 		SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
 	 		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside' or inside_outside IS NULL)
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
 							;");
 							
 						}
 							
 						}else{
 							
 							if($wt_otherOne == "OTHER/RESI"){
 								
 							$results = $db->query("
 							SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
 	 		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside')
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											or premise IS NULL)
 							;");
 							
 						}else{
 							$results = $db->query("
 							SELECT sub6.*
 		
 										FROM( 
 		
 		SELECT sub5.*
	
 		FROM( SELECT sub4.*
 
 		FROM (SELECT sub3.*
  
  
 	 		FROM (SELECT sub2.* 
  
 				 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  									 ='$knife' or weapon ='$firearm')
  							)sub
  			
  							WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  							= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  							'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  							'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  							'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  							'$shooting' or sub.description IS NULL)
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
				sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
				 or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			)sub5
			
			WHERE(inside_outside = '$insideOne' or inside_outside = '$inside' or inside_outside = '$outsideOne'
						or inside_outside = '$outside')
						
						)sub6
											
											WHERE( premise = '$wt_alley' or premise = '$wt_apt' or premise = '$wt_aptTwo' or
											premise = '$wt_atm' or premise = '$wt_bank' or premise ='$wt_bar' or premise =
											'$wt_barber' or premise = '$wt_bridge' or premise = '$wt_bus' or premise ='$wt_busTwo'
											or premise = '$wt_auto' or premise = '$wt_busThree' or premise = '$wt_busFour' or
											premise = '$wt_carry' or premise = '$wt_conv' or premise = '$wt_cloth' or
											premise = '$wt_shop' or premise = '$wt_court' or premise = '$wt_dept' or
											premise = '$wt_driveway' or premise = '$wt_drug' or premise = '$wt_dwelling'
											or premise = '$wt_fast' or premise = '$wt_fire' or premise = '$wt_garage' or
											premise = '$wt_garageTwo' or premise = '$wt_gas' or premise = '$wt_grocery' or
											premise = '$wt_home' or premise = '$wt_hosp' or premise = '$wt_hotel' or premise =
											'$wt_laundry' or premise = '$wt_lightRail' or premise = '$wt_liquor' or premise =
											'$wt_market' or premise = '$wt_office' or premise = '$wt_rec' or premise = 
											'$wt_religious' or premise = '$wt_retail' or premise = '$wt_rest' or premise =
											'$wt_row' or premise = '$wt_park' or premise = '$wt_parking' or premise = 
											'$wt_parkingTwo' or premise = '$wt_play' or premise = '$wt_porch' or premise =
											'$wt_publ' or premise = '$wt_publTwo' or premise = '$wt_school' or premise = 
											'$wt_specialty' or premise = '$wt_stadium' or premise = '$wt_streetCap' or 
											premise = '$wt_street' or premise = '$wt_subway' or premise = '$wt_vac' or premise =
											'$wt_war' or premise = '$wt_whole' or premise = '$wt_yard' or premise = '$wt_yardTwo' 
											or premise = '$wt_otherOne' or premise = '$wt_otherTwo' or premise = 
											'$wt_otherThree'  or premise = '$wt_otherFour' or premise = '$wt_rent'
											)
 							;");
 						}
 						}
 		
	}
	
}
  
 
  
 $dataArray = array();
while ($row = $results->fetchArray()) {
	$innerArray = array();
 array_push($innerArray, $row[3]);
 array_push($innerArray, $row[6]);
 array_push($innerArray, $row[7]);
 array_push($innerArray, $row[21]);
 array_push($innerArray, $row[19]);
 array_push($innerArray, $row[10]);
 array_push($innerArray, $row[17]);
 
 array_push($innerArray, $row[8]);
 array_push($innerArray, $row[4]);
 array_push($innerArray, $row[5]);
  
  array_push($dataArray, $innerArray);
}

$jsonArray = array("data" =>$dataArray);

echo json_encode($jsonArray);


?>