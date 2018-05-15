<?php
//get data for table viz - without premise filter

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
$myStreet="STREET";

//$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");
//above tests all the different filters, now combine them to one SQL statement
//might remove lat
/*
$results = $db->query("SELECT * FROM mydb WHERE (latitude > '$startingLat' and latitude < 
'$endingLat' and longitude > '$startingLong' and longitude < '$endingLong' and crimetime > '$startTime') 
and (crimetime < '$endTime' and crimedate > '$startDate' and crimedate < '$endDate') and (district = 
'$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern'
 or district = '$northWestern') and (description = '$aggAssault' or description = '$arson' or description
  = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = 
  '$commonAssault' or description = '$homicide' or description = '$larceny' or description = 
  '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = 
  '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = 
  '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");
  */
if($none == "NONE"){
	/*
  $results = $db->query("
  SELECT sub2.* 
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
 */
 /*
 $results = $db->query("
 SELECT sub3.*
  
  
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
			;");
			*/
			
 if($startTime < $endTime){
 		$results = $db->query("
 		SELECT sub4.*
 
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
 							;");
 					
 }else{
 		$results = $db->query("
 		SELECT sub4.*
 
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
 							;");
	}
 //$results = $db->query("SELECT * FROM mydb;");
}else{
	
	if($startTime < $endTime){
 		$results = $db->query("
 		SELECT sub4.*
 
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
 							;");
 							
 	}else{
 		
 		$results = $db->query("
 		SELECT sub4.*
 
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
 							;");
 		
	}
	
}
  /*
  $results = $db->query("SELECT sub.* 
  
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
  			'$shooting' or sub.description IS NULL)");
  */
  /*
  $results = $db->query("SELECT * 
  			 		FROM mydb 
  			 		WHERE(district ='$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern'
 or district = '$northWestern' or district IS NULL)");
  */
  /*
  $results = $db->query("
  
  SELECT sub.* 
  
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
 '$shooting');");
  */
  
  
  /*
 $results = $db->query("SELECT * FROM mydb WHERE (district = 
'$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern'
 or district = '$northWestern' AND * IN (SELECT * FROM mydb WHERE (description = '$aggAssault' or description = '$arson' or description
  = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = 
  '$commonAssault' or description = '$homicide' or description = '$larceny' or description = 
  '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = 
  '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = 
  '$shooting' AND * IN (SELECT * FROM mydb WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  ='$knife' or weapon ='$firearm')))");
  */
 /*
$results = $db->query("SELECT * FROM mydb WHERE (district = '$central' or district = 
'$western' or district = '$northEastern' or district = '$southWestern' or district = 
'$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern'or 
district = '$northWestern' or description = '$aggAssault' or description = '$arson' or description
= '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = 
'$commonAssault' or description = '$homicide' or description = '$larceny' or description = 
'$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = 
'$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = 
'$shooting' or weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");
*/
 /*
 $results = $db->query("SELECT * FROM mydb WHERE (weapon ='$other'or weapon = '$hands' or weapon ='$knife' or weapon ='$firearm') or (district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern')");
 */
//just testing weapon type
//$results = $db->query("SELECT * FROM mydb WHERE weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm'");

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

/*
						<th>CrimeCode</th>
            <th>Crime Type</th>
            <th>District</th>
            <th>Weapon Type</th> 
            <th>Premise</th>
            <th>Neighborhood</th>
            <th>Inside/Out</th>
            <th>Date</th>
            <th>Time</th>

*/


?>