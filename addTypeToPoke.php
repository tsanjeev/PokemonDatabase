<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");
if(!$mysqli || $mysqli->connect_errno){
  echo "Connection error ". $mysqli->connect_errno . " " . $mysqli->connect_error;
}
    if(!$stmt = $mysqli->prepare('SELECT id FROM pokemon WHERE id = ?')){
    	echo "Prepare 1 failed: "  . $stmt->errno . " " . $stmt->error;
    	};
    if(!$stmt->bind_param('s', $_POST['pokeName'])){
    	echo "Bind 1 failed: "  . $stmt->errno . " " . $stmt->error;
    };
    if(!$stmt->execute()){
    	echo "Execute 1 failed: "  . $stmt->errno . " " . $stmt->error;
    };
    if(!$stmt->bind_result($pid)){
    	echo "Bind result 1 failed: "  . $stmt->errno . " " . $stmt->error;
    };

	$results = $stmt->fetch();
	$mysqli2 = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");
    if(!$stmt = $mysqli2->prepare('SELECT type_id FROM type WHERE type_id = ?')){
    		echo "Prepare 2 failed: "  . $stmt->errno . " " . $stmt->error;
    	};
    if(!$stmt->bind_param('s', $_POST['pokeType'])){
    		echo "Bind 2 failed: "  . $stmt->errno . " " . $stmt->error;
    };
    if(!$stmt->execute()){
    		echo "Execute 2 failed: "  . $stmt->errno . " " . $stmt->error;
    };
    if(!$stmt->bind_result($tid)){
    	echo "Bind result 2 failed: "  . $stmt->errno . " " . $stmt->error;
    };
    $results = $stmt->fetch();

    $mysqli3 = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");
        if(!$stmt = $mysqli3->prepare('INSERT INTO poke_type (pid, tid) VALUES (?, ?)')){
        	echo "Prepare 3 failed: "  . $stmt->errno . " " . $stmt->error;
        };
        if(!$stmt->bind_param('ii', $pid, $tid)){
        	echo "Bind 3 failed: "  . $stmt->errno . " " . $stmt->error;
        };
        if(!$stmt->execute()){
        	//echo "Execute 3 failed: "  . $stmt->errno . " " . $stmt->error;
        };

	header("Location:index.php");
?>