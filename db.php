<?php
$db = new SQLite3('mydb.db');

$results = $db->query('SELECT * FROM mydb WHERE weapon = 'other'');
while ($row = $results->fetchArray()) {
    var_dump($row);
}
?>