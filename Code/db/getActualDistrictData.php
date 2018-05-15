<?php

//returns object that has count base on selected district

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


$db = new SQLite3('mydb.db');

$cnt2012 = array();
$cnt2013 = array();
$cnt2014 = array();
$cnt2015 = array();
$cnt2016 = array();
$cnt2017 = array();
$cnt2018 = array();


$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");


for($x = 0; $x < 7; $x++){ 
	
	//northern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE ( sub2.district = '$northern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$northern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$northernCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
		//southern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$southern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$southern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$southernCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//Eastern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$eastern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$eastern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$eastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$eastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$easternCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//western
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$western')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$western')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$western')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$western')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$westernCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//central
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district ='$central')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district ='$central')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district ='$central')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district ='$central')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$centralCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//northeastern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$northEastern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$northEastern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northEastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northEastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$northEasternCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//northwestern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$northWestern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$northWestern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northWestern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$northWestern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$northWesternCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//southeastern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$southEastern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$southEastern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southEastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southEastern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$southEasternCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
		//southwestern
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
												WHERE (sub2.district = '$southWestern')
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
										WHERE (sub2.district = '$southWestern')
 			
 									)sub3
 			
					WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
					)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southWestern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.district) AS total
 		
 			FROM (SELECT sub4.*
 
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
				WHERE (sub2.district = '$southWestern')
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' or crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$southWesternCnt=$results->fetchArray();
	
	
	//increment the date
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
			array_push($cnt2012, $northernCnt['total']);
			array_push($cnt2012, $southernCnt['total']);
			array_push($cnt2012, $easternCnt['total']);
			array_push($cnt2012, $westernCnt['total']);
			array_push($cnt2012, $centralCnt['total']);
			array_push($cnt2012, $northEasternCnt['total']);
			array_push($cnt2012, $northWesternCnt['total']);
			array_push($cnt2012, $southEasternCnt['total']);
			array_push($cnt2012, $southWesternCnt['total']);
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
			array_push($cnt2013, $northernCnt['total']);
			array_push($cnt2013, $southernCnt['total']);
			array_push($cnt2013, $easternCnt['total']);
			array_push($cnt2013, $westernCnt['total']);
			array_push($cnt2013, $centralCnt['total']);
			array_push($cnt2013, $northEasternCnt['total']);
			array_push($cnt2013, $northWesternCnt['total']);
			array_push($cnt2013, $southEasternCnt['total']);
			array_push($cnt2013, $southWesternCnt['total']);
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
			array_push($cnt2014, $northernCnt['total']);
			array_push($cnt2014, $southernCnt['total']);
			array_push($cnt2014, $easternCnt['total']);
			array_push($cnt2014, $westernCnt['total']);
			array_push($cnt2014, $centralCnt['total']);
			array_push($cnt2014, $northEasternCnt['total']);
			array_push($cnt2014, $northWesternCnt['total']);
			array_push($cnt2014, $southEasternCnt['total']);
			array_push($cnt2014, $southWesternCnt['total']);
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
			array_push($cnt2015, $northernCnt['total']);
			array_push($cnt2015, $southernCnt['total']);
			array_push($cnt2015, $easternCnt['total']);
			array_push($cnt2015, $westernCnt['total']);
			array_push($cnt2015, $centralCnt['total']);
			array_push($cnt2015, $northEasternCnt['total']);
			array_push($cnt2015, $northWesternCnt['total']);
			array_push($cnt2015, $southEasternCnt['total']);
			array_push($cnt2015, $southWesternCnt['total']);
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
			array_push($cnt2016, $northernCnt['total']);
			array_push($cnt2016, $southernCnt['total']);
			array_push($cnt2016, $easternCnt['total']);
			array_push($cnt2016, $westernCnt['total']);
			array_push($cnt2016, $centralCnt['total']);
			array_push($cnt2016, $northEasternCnt['total']);
			array_push($cnt2016, $northWesternCnt['total']);
			array_push($cnt2016, $southEasternCnt['total']);
			array_push($cnt2016, $southWesternCnt['total']);
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
			array_push($cnt2017, $northernCnt['total']);
			array_push($cnt2017, $southernCnt['total']);
			array_push($cnt2017, $easternCnt['total']);
			array_push($cnt2017, $westernCnt['total']);
			array_push($cnt2017, $centralCnt['total']);
			array_push($cnt2017, $northEasternCnt['total']);
			array_push($cnt2017, $northWesternCnt['total']);
			array_push($cnt2017, $southEasternCnt['total']);
			array_push($cnt2017, $southWesternCnt['total']);
	}else{
		
			array_push($cnt2018, $northernCnt['total']);
			array_push($cnt2018, $southernCnt['total']);
			array_push($cnt2018, $easternCnt['total']);
			array_push($cnt2018, $westernCnt['total']);
			array_push($cnt2018, $centralCnt['total']);
			array_push($cnt2018, $northEasternCnt['total']);
			array_push($cnt2018, $northWesternCnt['total']);
			array_push($cnt2018, $southEasternCnt['total']);
			array_push($cnt2018, $southWesternCnt['total']);
		
	}
	
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}

  

  
$myArray = array();

array_push($myArray, $cnt2012);
array_push($myArray, $cnt2013);
array_push($myArray, $cnt2014);
array_push($myArray, $cnt2015);
array_push($myArray, $cnt2016);
array_push($myArray, $cnt2017);
array_push($myArray, $cnt2018);


echo json_encode($myArray);

?>