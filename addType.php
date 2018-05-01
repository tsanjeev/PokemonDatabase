<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");
if(!$mysqli || $mysqli->connect_errno){
  echo "Connection error ". $mysqli->connect_errno . " " . $mysqli->connect_error;
}

if(!$stmt = $mysqli->prepare("INSERT INTO type (type_name) VALUES (?)")){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['tName']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
} else {
	//echo "Added " . $stmt->affected_rows . " rows to type.";
	header("Location:index.php");
}
?>