<?php

//$q = ($_GET['test']);
$q = ($_POST['action']);
//$_POST['action']

$db = new SQLite3('mydb.db');
$myStreet="STREET";
$results = $db->query("SELECT * FROM mydb WHERE premise='$myStreet'");

$myArray = array();
if($q=="test"){

while ($row = $results->fetchArray()) {
	array_push($myArray, $row[9]." ". $row[16]);
	
}

}
else{
$sam="Sam";
array_push($myArray, $sam);

}
echo json_encode($myArray);
//echo json_encode($sam);

?>