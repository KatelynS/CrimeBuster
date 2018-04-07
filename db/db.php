<?php
$db = new SQLite3('mydb.db');

$myStreet="STREET";
$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");

//change these assignments to contain what is currently clicked
$other="OTHER";
$hands="HANDS";
$knife="KNIFE";
$firearm="FIREARM";
//$results = $db->query("SELECT * FROM mydb WHERE weapon ='$weapon1'");

$results = $db->query("SELECT * FROM mydb WHERE weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm'");


$aggAssault = "AGG. ASSAULT";
$arson = "ARSON";
$assaultByThreat = "ASSAULT BY THREAT";
$autoTheft = "AUTO THEFT";
$burglary = "BURGLARY";
$commonAssault = "COMMON ASSAULT";
$homicide = "HOMICIDE";
$larceny = "LARCENY";
$larcenyAuto = "LARCENY FROM AUTO";
$rape = "RAPE";
$robberyStreet = "ROBBERY - STREET";
$robberyCar = "ROBBERY - CARJACKING";
$robberyCom = "ROBBERY - COMMERCIAL";
$robberyRes = "ROBBERY - RESIDENCE";
$shooting = "SHOOTING";

$results = $db->query("SELECT * FROM mydb WHERE description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = '$commonAssault' or description = '$homicide' or description = '$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = '$shooting'");


$central = "CENTRAL";
$western = "WESTERN";
$northEastern = "NORTHEASTERN";
$southWestern = "SOUTHWESTERN";
$southEastern = "SOUTHEASTERN";
$southern = "SOUTHERN";
$northern = "NORTHERN";
$eastern = "EASTERN";
$northWestern = "NORTHWESTERN";
$results = $db->query("SELECT * FROM mydb where district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern'");


$startDate = date("2015-7-5 00:00:00");
$endDate = date("2017-12-25 00:00:00");
$results = $db->query("SELECT * FROM mydb WHERE crimedate > '$startDate' and crimedate < '$endDate'");


$startTime = date("12:00:00");
$endTime = date("24:00:00");
$results = $db->query("SELECT * FROM mydb WHERE crimetime > '$startTime' and crimetime < '$endTime'");

$startingLong = -76.61544;
$endingLong = -76.58913;
$startingLat = 39.29433;
$endingLat = 39.3239;
$results = $db->query("SELECT * FROM mydb WHERE latitude > '$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and longitude < '$endingLong'");

//above tests all the different fileters, now combine them to one SQL statement
$results = $db->query("SELECT * FROM mydb WHERE (latitude > '$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = '$commonAssault' or description = '$homicide' or description = '$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");

/*
for($x=0; $x=row.length; x++){

}

*/

while ($row = $results->fetchArray()) {
  // var_dump($row);
  print($row[9]);
  print($row[16]);
  echo "<br>";
// print("\n");
}
?>
