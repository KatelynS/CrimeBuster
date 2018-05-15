<?php
//setting up file that reads from database - starting setup for onload
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

//above tests all the different filters, now combine them to one SQL statement
$results = $db->query("SELECT * FROM mydb WHERE (latitude > '$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or district = '$western' or district = '$northEastern' or district = '$southWestern' or district = '$southEastern' or district = '$southern' or district = '$northern' or district = '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = '$burglary' or description = '$commonAssault' or description = '$homicide' or description = '$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or weapon ='$firearm')");
/*

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$aggAssault') 
and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$arson' ) and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$assaultByThreat') 
and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$autoTheft' ) 
and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$burglary' ) 
and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$commonAssault' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$homicide' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$larceny' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$larcenyAuto' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$rape' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");


$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$robberyStreet' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$robberyCar')
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$robberyCom' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$robberyRes' )
 and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count description FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and ( description = '$shooting') 
and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central')
 and (description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and ( district = '$western' )
 and (description = '$aggAssault' or description = '$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$northEastern' )
 and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and ( district = '$southWestern' )
 and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and ( district = '$southEastern' )
 and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and ( district = '$southern' )
 and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$northern') 
and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and ( district = '$eastern')
 and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count district FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$northWestern') 
and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other'or  weapon = '$hands' or weapon ='$knife' or 
weapon ='$firearm')");

$cnt = $db->query("SELECT count weapon FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$other')");

$cnt = $db->query("SELECT count weapon FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and ( weapon = '$hands' )");

$cnt = $db->query("SELECT count weapon FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$knife' )");

$cnt = $db->query("SELECT count weapon FROM mydb WHERE (latitude > 
'$startingLat' and latitude < '$endingLat' and longitude > '$startingLong' and 
longitude < '$endingLong' and crimetime > '$startTime') and (crimetime < '$endTime' 
and crimedate > '$startDate' and crimedate < '$endDate') and (district = '$central' or 
district = '$western' or district = '$northEastern' or district = '$southWestern' or 
district = '$southEastern' or district = '$southern' or district = '$northern' or district 
= '$eastern' or district = '$northWestern') and (description = '$aggAssault' or description = 
'$arson' or description = '$assaultByThreat' or description = '$autoTheft' or description = 
'$burglary' or description = '$commonAssault' or description = '$homicide' or description = 
'$larceny' or description = '$larcenyAuto' or description = '$rape' or description = '$robberyStreet' 
or description = '$robberyCar' or description = '$robberyCom' or description = '$robberyRes' or 
description = '$shooting') and (weapon ='$firearm')");
*/
/*
for($x=0; $x=row.length; x++){

}

*/

$results = $db->query("SELECT DISTINCT inside_outside FROM mydb ");

while ($row = $results->fetchArray()) {
  // var_dump($row);
  print($row[0]);
  //print($row[9]);
  //print($row[16]);
  echo "<br>";
// print("\n");
}
?>
