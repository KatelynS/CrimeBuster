<?php

//returns object that has count base on selected district - initiate setup without premise

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

$db = new SQLite3('mydb.db');

if($none == "NONE"){
$centralCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE (sub2.district ='$central');");
}else{
	$centralCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE (sub2.district ='$central');");
}
$centralCnt =$centralCnt->fetchArray();

if($none == "NONE"){
$westernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$western');");
}else{
	$westernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$western');");
}
$westernCnt =$westernCnt->fetchArray();

if($none == "NONE"){
$northEasternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$northEastern' );");
}else{
	$northEasternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  			= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  			'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  			'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  			'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  			'$shooting' or sub.description IS NULL)
  )sub2
WHERE ( sub2.district = '$northEastern' );");
}
$northEasternCnt =$northEasternCnt->fetchArray();

if($none == "NONE"){
$southWesternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$southWestern' );");
}else{
	$southWesternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$southWestern' );");
}
$southWesternCnt =$southWesternCnt->fetchArray();

if($none == "NONE"){
$southEasternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$southEastern' );");
}else{
	$southEasternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  			= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  			'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  			'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  			'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  			'$shooting' or sub.description IS NULL)
  )sub2
WHERE ( sub2.district = '$southEastern' );");
}
$southEasternCnt =$southEasternCnt->fetchArray();

if($none == "NONE"){
$southernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$southern' );");
}else{
	$southernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  			= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  			'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  			'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  			'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  			'$shooting' or sub.description IS NULL)
  )sub2
WHERE ( sub2.district = '$southern' );");
}
$southernCnt =$southernCnt->fetchArray();

if($none == "NONE"){
$northernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$northern' );");
}else{
	$northernCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$northern' );");
}
$northernCnt =$northernCnt->fetchArray();

if($none == "NONE"){
$easternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE ( sub2.district = '$eastern');");
}else{
	$easternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  			= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  			'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  			'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  			'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  			'$shooting' or sub.description IS NULL)
  )sub2
WHERE ( sub2.district = '$eastern');");
}
$easternCnt =$easternCnt->fetchArray();

if($none == "NONE"){
$northWesternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
WHERE (sub2.district = '$northWestern' );");
}else{
	$northWesternCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$aggAssault' or sub.description = '$arson' or sub.description
  			= '$assaultByThreat' or sub.description = '$autoTheft' or sub.description = '$burglary' or sub.description = 
  			'$commonAssault' or sub.description = '$homicide' or sub.description = '$larceny' or sub.description = 
  			'$larcenyAuto' or sub.description = '$rape' or sub.description = '$robberyStreet' or sub.description = 
  			'$robberyCar' or sub.description = '$robberyCom' or sub.description = '$robberyRes' or sub.description = 
  			'$shooting' or sub.description IS NULL)
  )sub2
WHERE (sub2.district = '$northWestern' );");
}
$northWesternCnt =$northWesternCnt->fetchArray();

$myArray = array();
 for($x = 0; $x < 9; $x++){
 	if($x == 0){
 		//array_push($myArray, "Northern");
 		array_push($myArray, $northernCnt['total']);
 	}elseif($x == 1){
 		//array_push($myArray, "Southern");
 		array_push($myArray, $southernCnt['total']);
 		
 	}elseif($x == 2){
 		//array_push($myArray, "Eastern");
 		array_push($myArray, $easternCnt['total']);
 		
 	}elseif($x == 3){
 		//array_push($myArray, "Western");
 		array_push($myArray, $westernCnt['total']);
 		
 	}elseif($x == 4){
 		//array_push($myArray, "Central");
 		array_push($myArray, $centralCnt['total']);
 		
 	}elseif($x == 5){
 		//array_push($myArray, "North Eastern");
 		array_push($myArray, $northEasternCnt['total']);
 		
 	}elseif($x == 6){
 		//array_push($myArray, "North Western");
 		array_push($myArray, $northWesternCnt['total']);
 		
 	}elseif($x == 7){
 		//array_push($myArray, "South Eastern");
 		array_push($myArray, $southEasternCnt['total']);
 		
 	}else{
 		//array_push($myArray, "South Western");
 		array_push($myArray, $southWesternCnt['total']);
 	}
}

echo json_encode($myArray);


?>
 
 