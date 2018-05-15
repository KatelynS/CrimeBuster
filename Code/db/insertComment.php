<?php

//setup for db that inserts into comments table

//weapon type
$commentsID=($_POST['wt_commentsID1']);
$crimeID=($_POST['wt_crimeID1']);
$userID=($_POST['wt_userID1']);
$actualComment=($_POST['wt_actualComment1']);

$db = new SQLite3('mydb.db');


$db->exec("INSERT INTO comments (commentsID, crimeID, userID, summary) 
    VALUES ('$commentsID', '$crimeID', '$userID','$actualComment')");
    
$results = $db->query("SELECT * FROM comments");

$myArray = array();
while ($row = $results->fetchArray()) {
	array_push($myArray, $row[0].",". $row[1].",".$row[2].",".$row[3]);
}


echo json_encode($myArray);


?>