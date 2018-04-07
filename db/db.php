<?php
$db = new SQLite3('mydb.db');

$myStreet="STREET";
$results = $db->query("SELECT premise FROM mydb WHERE premise='$myStreet'");
//$row = $results->fetchArray();
//$array =
//print($row[1]);

/*
for($x=0; $x=row.length; x++){

}

*/

while ($row = $results->fetchArray()) {
  // var_dump($row);
  print($row[0]);
  echo "<br>";
// print("\n");
}
?>
