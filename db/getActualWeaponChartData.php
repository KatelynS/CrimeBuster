<?php

//returns object that has count base on selected weapon, handle nulls

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

$firearmCounts = array();
$handsCounts = array();
$knifeCounts = array();
$otherCounts = array();
$noneCounts = array();


$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");


//for firearm
for($x = 0; $x < 7; $x++){ 
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  						FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  												FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE(weapon ='$firearm')
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
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
  							FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$firearm')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
 						 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$firearm')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
 	 				FROM (SELECT sub2.* 
  
 					 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$firearm')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$results=$results->fetchArray();
	array_push($firearmCounts, $results['total']);
	
	//increment the date
	
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
	}else{
		//shouldnt get here
		
	}
	
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}



$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");

//for firearm
for($x = 0; $x < 7; $x++){ 
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  						FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  												FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE(weapon = '$hands')
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
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
  							FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE( weapon = '$hands')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
 						 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(  weapon = '$hands')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
 	 				FROM (SELECT sub2.* 
  
 					 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon = '$hands')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$results=$results->fetchArray();
	array_push($handsCounts, $results['total']);
	
	//increment the date
	
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
	}else{
		//shouldnt get here
		
	}
	
	
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}












$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");

//for firearm
for($x = 0; $x < 7; $x++){ 
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  						FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  												FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE( weapon ='$knife')
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
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
  							FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE( weapon ='$knife')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
 						 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE( weapon ='$knife')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
 	 				FROM (SELECT sub2.* 
  
 					 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE( weapon ='$knife')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$results=$results->fetchArray();
	array_push($knifeCounts, $results['total']);
	
	//increment the date
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
	}else{
		//shouldnt get here
		
	}
	
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}














$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");

//for firearm
for($x = 0; $x < 7; $x++){ 
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  						FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  												FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE(weapon ='$other')
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
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
  							FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE(weapon ='$other')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
	
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
 						 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
 	 				FROM (SELECT sub2.* 
  
 					 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon ='$other')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$results=$results->fetchArray();
	array_push($otherCounts, $results['total']);
	
	//increment the date
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
	}else{
		//shouldnt get here
		
	}
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}












$startDate2 = date("2012-01-01");
$endDate2 = date("2012-12-31");

//for firearm
for($x = 0; $x < 7; $x++){ 
	if($none == "NONE"){
			
 	if($startTime < $endTime){
 		$results = $db->query("
 		
 		SELECT COUNT(CASE WHEN weapon IS NULL THEN 1 END) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  						FROM (SELECT sub2.* 
  
  									FROM ( SELECT sub.* 
  
  												FROM (
  			 												SELECT * 
  			 												FROM mydb 
  			 												WHERE( weapon IS NULL)
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
				
				) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 					
 }else{
 		$results = $db->query("
 		
 		SELECT COUNT(CASE WHEN weapon IS NULL THEN 1 END) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
  							FROM ( SELECT sub.* 
  
  										FROM (
  			 										SELECT * 
  			 										FROM mydb 
  			 										WHERE( weapon IS NULL)
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
		}
 //$results = $db->query("SELECT * FROM mydb;");
	}else{
		//else null is not currently selected, so push 0 into array
		if($startTime < $endTime){
		
 		$results = $db->query("
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
  				FROM (SELECT sub2.* 
  
 						 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon = 'n/a')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		
 		SELECT COUNT(sub5.weapon) AS total
 		
 			FROM (SELECT sub4.*
 
 				FROM (SELECT sub3.*
  
  
 	 				FROM (SELECT sub2.* 
  
 					 FROM ( SELECT sub.* 
  
  						FROM (
  			 						SELECT * 
  			 						FROM mydb 
  			 						WHERE(weapon = 'n/a')
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
			
			) sub5
				
		WHERE (crimedate >= '$startDate2' and crimedate <= '$endDate2')
 							;");
 		
		}
	
	}
	//get the count and add it to the array
	$results=$results->fetchArray();
	array_push($noneCounts, $results['total']);
	
	//increment the date
	if($startDate2 == date("2012-01-01") and $endDate2 == date("2012-12-31")){
			$startDate2 = date("2013-01-01");
			$endDate2 = date("2013-12-31");
	}else if($startDate2 == date("2013-01-01") and $endDate2 == date("2013-12-31")){
			$startDate2 = date("2014-01-01");
			$endDate2 = date("2014-12-31");
	}else if($startDate2 == date("2014-01-01") and $endDate2 == date("2014-12-31")){
			$startDate2 = date("2015-01-01");
			$endDate2 = date("2015-12-31");
	}else if($startDate2 == date("2015-01-01") and $endDate2 == date("2015-12-31")){
			$startDate2 = date("2016-01-01");
			$endDate2 = date("2016-12-31");
	}else if($startDate2 == date("2016-01-01") and $endDate2 == date("2016-12-31")){
			$startDate2 = date("2017-01-01");
			$endDate2 = date("2017-12-31");
	}else if($startDate2 == date("2017-01-01") and $endDate2 == date("2017-12-31")){
			$startDate2 = date("2018-01-01");
			$endDate2 = date("2018-12-31");
	}else{
		//shouldnt get here
		
	}
	
	//date_add($startDate2, date_interval_create_from_date_string("1 year"));
	//date_add($endDate2, date_interval_create_from_date_string("1 year"));
}
 

//push the arrays to be returned

$myArray = array();

array_push($myArray, $firearmCounts);
array_push($myArray, $handsCounts);
array_push($myArray, $knifeCounts);
array_push($myArray, $otherCounts);
array_push($myArray, $noneCounts);


echo json_encode($myArray);


?>