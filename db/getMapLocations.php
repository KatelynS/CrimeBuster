<?php

//$q = ($_GET['test']);

//weapon type
$other=($_POST['wt_Other']);
$hands=($_POST['wt_Hands']);
$knife=($_POST['wt_Knife']);
$firearm=($_POST['wt_Firearm']);


//crime type
$aggAssault = ($_POST['wt_AggAssault']);
$arson = ($_POST['wt_Arson']);
$assaultByThreat = ($_POST['wt_AssaultByThreat']);
$autoTheft = ($_POST['wt_AutoTheft']);
$burglary = ($_POST['wt_Burglary']);
$commonAssault = ($_POST['wt_CommonAssault']);
$homicide = ($_POST['wt_Homicide']);
$larceny = ($_POST['wt_Larceny']);
$larcenyAuto = ($_POST['wt_LarcenyAuto']);
$rape = ($_POST['wt_Rape']);
$robberyStreet = ($_POST['wt_RobberyStreet']);
$robberyCar = ($_POST['wt_RobberyCar']);
$robberyCom = ($_POST['wt_RobberyCom']);
$robberyRes = ($_POST['wt_RobberyRes']);
$shooting = ($_POST['wt_Shooting']);


//district
$central = ($_POST['wt_Northern']);
$western = ($_POST['wt_Southern']);
$northEastern = ($_POST['wt_Eastern']);
$southWestern = ($_POST['wt_Western']);
$southEastern = ($_POST['wt_Central']);
$southern = ($_POST['wt_NorthEastern']);
$northern = ($_POST['wt_NorthWestern']);
$eastern = ($_POST['wt_SouthEastern']);
$northWestern = ($_POST['wt_SouthWestern']);

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
 
 
$results = $db->query("SELECT * FROM mydb WHERE (district = '$central' or district = 
'$western' or district = '$northEastern' or district = '$southWestern' or district = 
'$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern'or 
district = '$northWestern' or description = '$aggAssault' or description = '$arson' or description
= '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = 
'$commonAssault' or description = '$homicide' or description = '$larceny' or description = 
'$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = 
'$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = 
'$shooting' or weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");

 /*
 $results = $db->query("SELECT * FROM mydb WHERE (weapon ='$other'or weapon = '$hands' or weapon ='$knife' or weapon ='$firearm') or (district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern')");
 */
//just testing weapon type
//$results = $db->query("SELECT * FROM mydb WHERE weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm'");


$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9].",". $row[16]);
}


echo json_encode($myArray);


?>