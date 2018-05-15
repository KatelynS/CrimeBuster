<?php

//returns object that has count base on selected weapon type - initiate setup without premise

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


$otherCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
 $otherCnt=$otherCnt->fetchArray();
 
$handsCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
 $handsCnt=$handsCnt->fetchArray();
 
 $knifeCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$knife')
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
 $knifeCnt=$knifeCnt->fetchArray();
 
 $firearmCnt = $db->query("
  SELECT COUNT(sub2.weapon) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
 $firearmCnt=$firearmCnt->fetchArray();
 
 $noneCnt = $db->query("
  SELECT COUNT(CASE WHEN weapon IS NULL THEN 1 END) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon IS NULL)
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
 $noneCnt=$noneCnt->fetchArray();
 

 $myArray = array();
 for($x = 0; $x < 5; $x++){
 	if($x == 0){
 		//array_push($myArray, "Firearm".",".$firearmCnt['total']);
 		array_push($myArray, $firearmCnt['total']);
 	}elseif($x == 1){
 		//array_push($myArray, "Hands".",".$handsCnt['total']);
 		array_push($myArray, $handsCnt['total']);
 		
 	}elseif($x == 2){
 		//array_push($myArray, "Knife".",".$knifeCnt['total']);
 		array_push($myArray, $knifeCnt['total']);
 		
 	}elseif($x == 3){
 		//array_push($myArray, "Other".",".$otherCnt['total']);
 		array_push($myArray, $otherCnt['total']);
 		
 	}else{
 		//array_push($myArray, "No Weapon".",".$noneCnt['total']);
 		array_push($myArray, $noneCnt['total']);
 	}
}

echo json_encode($myArray);


?>