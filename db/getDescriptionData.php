<?php

//returns object that has count base on selected crime type - initiate setup without premise

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
$aggAssaultCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$aggAssaultCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
 $aggAssaultCnt =$aggAssaultCnt->fetchArray();
 
 if($none == "NONE"){
 $arsonCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$arsonCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$arsonCnt =$arsonCnt->fetchArray();

if($none == "NONE"){ 
 $assaultByThreatCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE ( sub.description = '$assaultByThreat')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$assaultByThreatCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE ( sub.description = '$assaultByThreat')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
	
}
$assaultByThreatCnt =$assaultByThreatCnt->fetchArray();

if($none == "NONE"){ 
 $autoTheftCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$autoTheftCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$autoTheftCnt =$autoTheftCnt->fetchArray();

if($none == "NONE"){ 
 $burglaryCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$burglaryCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
 $burglaryCnt =$burglaryCnt->fetchArray();
 
 if($none == "NONE"){
 $commonAssaultCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE (sub.description = '$commonAssault' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$commonAssaultCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm')
  			)sub
  			
  			WHERE (sub.description = '$commonAssault' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
 $commonAssaultCnt =$commonAssaultCnt->fetchArray();
 
 
 if($none == "NONE"){
 $homicideCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$homicideCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$homicideCnt =$homicideCnt->fetchArray();


if($none == "NONE"){ 
 $larcenyCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE (sub.description = '$larceny' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$larcenyCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm')
  			)sub
  			
  			WHERE (sub.description = '$larceny' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$larcenyCnt =$larcenyCnt->fetchArray();


if($none == "NONE"){ 
 $larcenyAutoCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE (sub.description = '$larcenyAuto' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$larcenyAutoCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$larcenyAuto' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$larcenyAutoCnt =$larcenyAutoCnt->fetchArray();


if($none == "NONE"){ 
 $rapeCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$rapeCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
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
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$rapeCnt =$rapeCnt->fetchArray();


if($none == "NONE"){ 
 $robberyStreetCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE (sub.description = '$robberyStreet' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$robberyStreetCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE (sub.description = '$robberyStreet' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$robberyStreetCnt =$robberyStreetCnt->fetchArray();


if($none == "NONE"){ 
 $robberyCarCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE ( sub.description = '$robberyCar')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$robberyCarCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE ( sub.description = '$robberyCar')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$robberyCarCnt =$robberyCarCnt->fetchArray();


if($none == "NONE"){ 
 $robberyComCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE ( sub.description = '$robberyCom' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$robberyComCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE ( sub.description = '$robberyCom' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
 $robberyComCnt =$robberyComCnt->fetchArray();
 
 
 if($none == "NONE"){
 $robberyResCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE ( sub.description = '$robberyRes')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$robberyResCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE ( sub.description = '$robberyRes')
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
$robberyResCnt =$robberyResCnt->fetchArray();


if($none == "NONE"){ 
 $shootingCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' or weapon IS NULL)
  			)sub
  			
  			WHERE ( sub.description = '$shooting' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}else{
	$shootingCnt = $db->query("
  SELECT COUNT(sub2.description) AS total
  
  FROM ( SELECT sub.* 
  
  			FROM (
  			 		SELECT * 
  			 		FROM mydb 
  			 		WHERE(weapon ='$other'or  weapon = '$hands' or weapon 
  					 ='$knife' or weapon ='$firearm' )
  			)sub
  			
  			WHERE ( sub.description = '$shooting' )
  )sub2
WHERE (sub2.district ='$central' or sub2.district = '$western' or sub2.district = '$northEastern' or sub2.district = '$southWestern' or 
sub2.district = '$southEastern' or sub2.district = '$southern' or sub2.district = '$northern' or sub2.district = '$eastern'
 or sub2.district = '$northWestern' or sub2.district IS NULL);");
}
 $shootingCnt =$shootingCnt->fetchArray();
 
 $myArray = array();
 for($x = 0; $x < 15; $x++){
 	if($x == 0){
 		//array_push($myArray, "AGG. Assault");
 		array_push($myArray, $aggAssaultCnt['total']);
 	}elseif($x == 1){
 		//array_push($myArray, "Arson");
 		array_push($myArray, $arsonCnt['total']);
 		
 	}elseif($x == 2){
 		//array_push($myArray, "Assauly By Threat");
 		array_push($myArray, $assaultByThreatCnt['total']);
 		
 	}elseif($x == 3){
 		//array_push($myArray, "Auto Theft");
 		array_push($myArray, $autoTheftCnt['total']);
 		
 	}elseif($x == 4){
 		//array_push($myArray, "Burglary");
 		array_push($myArray, $burglaryCnt['total']);
 		
 	}elseif($x == 5){
 		//array_push($myArray, "Common Assault");
 		array_push($myArray, $commonAssaultCnt['total']);
 		
 	}elseif($x == 6){
 		//array_push($myArray, "Homicide");
 		array_push($myArray, $homicideCnt['total']);
 		
 	}elseif($x == 7){
 		//array_push($myArray, "Larceny");
 		array_push($myArray, $larcenyCnt['total']);
 		
 	}elseif($x == 8){
 		//array_push($myArray, "Larceny From Auto");
 		array_push($myArray, $larcenyAutoCnt['total']);
 		
 	}elseif($x == 9){
 		//array_push($myArray, "Rape");
 		array_push($myArray, $rapeCnt['total']);
 		
 	}elseif($x == 10){
 		//array_push($myArray, "Robbery - Street");
 		array_push($myArray, $robberyStreetCnt['total']);
 		
 	}elseif($x == 11){
 		//array_push($myArray, "Robbery - Carjacking");
 		array_push($myArray, $robberyCarCnt['total']);
 		
 	}elseif($x == 12){
 		//array_push($myArray, "Robbery - Commercial");
 		array_push($myArray, $robberyComCnt['total']);
 		
 	}elseif($x == 13){
 		//array_push($myArray, "Robbery - Residence");
 		array_push($myArray, $robberyResCnt['total']);
 		
 	}else{
 		//array_push($myArray, "Shooting");
 		array_push($myArray, $shootingCnt['total']);
 	}
}

echo json_encode($myArray);


?>
 
 