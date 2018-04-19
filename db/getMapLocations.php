<?php

//$q = ($_GET['test']);

//weapon type
$other=($_POST['wt_Other']);
$hands=($_POST['wt_Hands']);
$knife=($_POST['wt_Knife']);
$firearm=($_POST['wt_Firearm']);

//crime type
$aggAssault = "";
$arson = "";
$assaultByThreat = "";
$autoTheft = "";
$burglary = "";
$commonAssault = "";
$homicide = "";
$larceny = "";
$larcenyAuto = "";
$rape = "";
$robberyStreet = "";
$robberyCar = "";
$robberyCom = "";
$robberyRes = "";
$shooting = "";

$db = new SQLite3('mydb.db');
$myStreet="STREET";
//$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");
//above tests all the different filters, now combine them to one SQL statement
//might remove lat
//$results = $db->query("SELECT * FROM mydb WHERE (latitude > '$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = '$commonAssault' or description = '$homicide' or description = '$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");
//just testing weapon type
$results = $db->query("SELECT * FROM mydb WHERE weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm'");


$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9].",". $row[16]);
}


echo json_encode($myArray);


?>