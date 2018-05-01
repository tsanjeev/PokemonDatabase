<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
	<table class="pokeTable">
		<tr>
			<td>Pokemon Database</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>Type</td>
			<td>Skills</td>
			<td>Location</td>
			<td>Evolution</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT p1.name , type.type_name, skill.skill_name, location.loc_name, p2.name
          FROM pokemon p1
          LEFT JOIN poke_type ON p1.id = poke_type.pid
          LEFT JOIN type ON poke_type.tid = type.type_id
          LEFT JOIN poke_skill ON p1.id = poke_skill.pid
          LEFT JOIN skill ON poke_skill.sid = skill.skill_id 
          LEFT JOIN poke_loc ON p1.id = poke_loc.pid
          LEFT JOIN location ON poke_loc.lid = location.loc_id 
          LEFT JOIN poke_evo ON p1.id = poke_evo.pid
          LEFT JOIN pokemon p2 ON poke_evo.evo_pid = p2.id
          WHERE p1.id = ?
          ORDER BY p1.name ASC"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['pokeName']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name, $type, $skill, $loc, $evo)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $type . "\n</td>\n<td>\n" . $skill . "\n</td>\n<td>\n" . $loc . "\n</td>\n<td>\n" . $evo . "\n</td></tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>