<?php

//returns object that has count base on selected crime type

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
	
	//agg assault
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$aggAssault')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$aggAssault')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$aggAssault')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$aggAssault')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$aggAssaultCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	//arson
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$arson')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$arson')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$arson')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$arson')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$arsonCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//assaultByThreat
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$assaultByThreat')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$assaultByThreat')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$assaultByThreat')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$assaultByThreat')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$assaultByThreatCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//autoTheft
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$autoTheft')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$autoTheft')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$autoTheft')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$autoTheft')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$autoTheftCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//burglary
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$burglary')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$burglary')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$burglary')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$burglary')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$burglaryCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//common assault
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$commonAssault')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$commonAssault')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$commonAssault')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$commonAssault')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$commonAssaultCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//homicide
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$homicide')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$homicide')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$homicide')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$homicide')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$homicideCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//larceny
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$larceny')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$larceny')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$larceny')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$larceny')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$larcenyCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//larcenyFromAuto
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$larcenyAuto')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$larcenyAuto')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$larcenyAuto')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$larcenyAuto')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$larcenyAutoCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//rape
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$rape')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$rape')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$rape')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$rape')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$rapeCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//streetRob
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$robberyStreet')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$robberyStreet')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyStreet')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyStreet')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$streetRobberyCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//robberyCar
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$robberyCar')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$robberyCar')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyCar')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyCar')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$robberyCarCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//robberyCom
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$robberyCom')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$robberyCom')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyCom')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyCom')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$robberyComCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//robberyRes
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$robberyRes')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$robberyRes')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyRes')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$robberyRes')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$robberyResCnt=$results->fetchArray();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//shooting
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  					
  													WHERE (sub.description = '$shooting')
  											)sub2
												WHERE ( sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
												sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 												or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
 											)sub3
 			
							WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			
							)sub4
		
					WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  											WHERE (sub.description = '$shooting')
  									)sub2
										WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
										sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 										or sub2.district = '$northWestern' or sub2.district IS NULL)
 			
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
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$shooting')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
				 )sub3
 			
			WHERE(crimedate >= '$startDate' and crimedate <= '$endDate' )
			)sub4
		
			WHERE(crimetime >= '$startTime' and crimetime <= '$endTime')
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.description) AS total
 		
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
  			
  							WHERE (sub.description = '$shooting')
 				 )sub2
				WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
							sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 							or sub2.district = '$northWestern' or sub2.district IS NULL)
				 
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
	$shootingCnt=$results->fetchArray();

	
	
	
	
	//increment the date
	
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
			array_push($cnt2012, $aggAssaultCnt['total']);
			array_push($cnt2012, $arsonCnt['total']);
			array_push($cnt2012, $assaultByThreatCnt['total']);
			array_push($cnt2012, $autoTheftCnt['total']);
			array_push($cnt2012, $burglaryCnt['total']);
			array_push($cnt2012, $commonAssaultCnt['total']);
			array_push($cnt2012, $homicideCnt['total']);
			array_push($cnt2012, $larcenyCnt['total']);
			array_push($cnt2012, $larcenyAutoCnt['total']);
			array_push($cnt2012, $rapeCnt['total']);
			array_push($cnt2012, $streetRobberyCnt['total']);
			array_push($cnt2012, $robberyCarCnt['total']);
			array_push($cnt2012, $robberyComCnt['total']);
			array_push($cnt2012, $robberyResCnt['total']);
			array_push($cnt2012, $shootingCnt['total']);
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
			array_push($cnt2013, $aggAssaultCnt['total']);
			array_push($cnt2013, $arsonCnt['total']);
			array_push($cnt2013, $assaultByThreatCnt['total']);
			array_push($cnt2013, $autoTheftCnt['total']);
			array_push($cnt2013, $burglaryCnt['total']);
			array_push($cnt2013, $commonAssaultCnt['total']);
			array_push($cnt2013, $homicideCnt['total']);
			array_push($cnt2013, $larcenyCnt['total']);
			array_push($cnt2013, $larcenyAutoCnt['total']);
			array_push($cnt2013, $rapeCnt['total']);
			array_push($cnt2013, $streetRobberyCnt['total']);
			array_push($cnt2013, $robberyCarCnt['total']);
			array_push($cnt2013, $robberyComCnt['total']);
			array_push($cnt2013, $robberyResCnt['total']);
			array_push($cnt2013, $shootingCnt['total']);
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
			array_push($cnt2014, $aggAssaultCnt['total']);
			array_push($cnt2014, $arsonCnt['total']);
			array_push($cnt2014, $assaultByThreatCnt['total']);
			array_push($cnt2014, $autoTheftCnt['total']);
			array_push($cnt2014, $burglaryCnt['total']);
			array_push($cnt2014, $commonAssaultCnt['total']);
			array_push($cnt2014, $homicideCnt['total']);
			array_push($cnt2014, $larcenyCnt['total']);
			array_push($cnt2014, $larcenyAutoCnt['total']);
			array_push($cnt2014, $rapeCnt['total']);
			array_push($cnt2014, $streetRobberyCnt['total']);
			array_push($cnt2014, $robberyCarCnt['total']);
			array_push($cnt2014, $robberyComCnt['total']);
			array_push($cnt2014, $robberyResCnt['total']);
			array_push($cnt2014, $shootingCnt['total']);
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
			array_push($cnt2015, $aggAssaultCnt['total']);
			array_push($cnt2015, $arsonCnt['total']);
			array_push($cnt2015, $assaultByThreatCnt['total']);
			array_push($cnt2015, $autoTheftCnt['total']);
			array_push($cnt2015, $burglaryCnt['total']);
			array_push($cnt2015, $commonAssaultCnt['total']);
			array_push($cnt2015, $homicideCnt['total']);
			array_push($cnt2015, $larcenyCnt['total']);
			array_push($cnt2015, $larcenyAutoCnt['total']);
			array_push($cnt2015, $rapeCnt['total']);
			array_push($cnt2015, $streetRobberyCnt['total']);
			array_push($cnt2015, $robberyCarCnt['total']);
			array_push($cnt2015, $robberyComCnt['total']);
			array_push($cnt2015, $robberyResCnt['total']);
			array_push($cnt2015, $shootingCnt['total']);
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
			array_push($cnt2016, $aggAssaultCnt['total']);
			array_push($cnt2016, $arsonCnt['total']);
			array_push($cnt2016, $assaultByThreatCnt['total']);
			array_push($cnt2016, $autoTheftCnt['total']);
			array_push($cnt2016, $burglaryCnt['total']);
			array_push($cnt2016, $commonAssaultCnt['total']);
			array_push($cnt2016, $homicideCnt['total']);
			array_push($cnt2016, $larcenyCnt['total']);
			array_push($cnt2016, $larcenyAutoCnt['total']);
			array_push($cnt2016, $rapeCnt['total']);
			array_push($cnt2016, $streetRobberyCnt['total']);
			array_push($cnt2016, $robberyCarCnt['total']);
			array_push($cnt2016, $robberyComCnt['total']);
			array_push($cnt2016, $robberyResCnt['total']);
			array_push($cnt2016, $shootingCnt['total']);
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
			array_push($cnt2017, $aggAssaultCnt['total']);
			array_push($cnt2017, $arsonCnt['total']);
			array_push($cnt2017, $assaultByThreatCnt['total']);
			array_push($cnt2017, $autoTheftCnt['total']);
			array_push($cnt2017, $burglaryCnt['total']);
			array_push($cnt2017, $commonAssaultCnt['total']);
			array_push($cnt2017, $homicideCnt['total']);
			array_push($cnt2017, $larcenyCnt['total']);
			array_push($cnt2017, $larcenyAutoCnt['total']);
			array_push($cnt2017, $rapeCnt['total']);
			array_push($cnt2017, $streetRobberyCnt['total']);
			array_push($cnt2017, $robberyCarCnt['total']);
			array_push($cnt2017, $robberyComCnt['total']);
			array_push($cnt2017, $robberyResCnt['total']);
			array_push($cnt2017, $shootingCnt['total']);
	}else{
		
			array_push($cnt2018, $aggAssaultCnt['total']);
			array_push($cnt2018, $arsonCnt['total']);
			array_push($cnt2018, $assaultByThreatCnt['total']);
			array_push($cnt2018, $autoTheftCnt['total']);
			array_push($cnt2018, $burglaryCnt['total']);
			array_push($cnt2018, $commonAssaultCnt['total']);
			array_push($cnt2018, $homicideCnt['total']);
			array_push($cnt2018, $larcenyCnt['total']);
			array_push($cnt2018, $larcenyAutoCnt['total']);
			array_push($cnt2018, $rapeCnt['total']);
			array_push($cnt2018, $streetRobberyCnt['total']);
			array_push($cnt2018, $robberyCarCnt['total']);
			array_push($cnt2018, $robberyComCnt['total']);
			array_push($cnt2018, $robberyResCnt['total']);
			array_push($cnt2018, $shootingCnt['total']);
		
	}
	
	
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