<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","sanjeevt-db","x6wwQ7Pqw8iQg7b8", "sanjeevt-db");
if($mysqli->connect_errno){
  echo "Connection error ", $mysqli->connect_errno, " ", $mysqli->connect_error;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Pokemon Database</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
    <header>
      <h1 class="title">Pokemon Database</h1>
      <hr>
    </header>

  <div class="container">
    <div class="box1">
      <form action='addPoke.php' method='POST'>
        <fieldset>
          <legend>Add New Pokemon</legend>
            Name: <input type="text" id="pName" name ="pName" value="Pokemon Name"/>
            <input name="add-pokemon" type="submit" class="btn-primary" value="Add Pokemon"/>
       </fieldset>
      </form>
    </div>


  <div class="box2">
      <form action='addTypeToPoke.php' method='POST'>
        <fieldset>
          <legend>Add Type To Pokemon</legend>
            Select Pokemon: <select name="pokeName">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
            </select>
            Select Type: <select name="pokeType">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT type_id, type_name FROM type"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($tid, $tname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $tid . ' "> ' . $tname . '</option>\n';
              }
              $stmt->close();
            ?>
        </select>
        <input name="addPokeType" type="submit" class="btn-primary" value="Update Pokemon"/>
        </fieldset>
      </form>
    </div>


    <div class="box3">
      <form action='addSkillToPoke.php' method='POST'>
        <fieldset>
          <legend>Add Skill To Pokemon</legend>
            Select Pokemon: <select name="pokeName">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
            </select>
            Select Skill: <select name="pokeSkill">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT skill_id, skill_name FROM skill"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($sid, $sname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $sid . ' "> ' . $sname . '</option>\n';
              }
              $stmt->close();
            ?>
        </select>
        <input name="addPokeSkill" type="submit" class="btn-primary" value="Update Pokemon"/>
        </fieldset>
      </form>
    </div>


    <div class="box13">
      <form action='addLocToPoke.php' method='POST'>
        <fieldset>
          <legend>Add Location To Pokemon</legend>
            Select Pokemon: <select name="pokeName">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
            </select>
            Select Location: <select name="pokeLoc">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT loc_id, loc_name FROM location"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($lid, $lname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $lid . ' "> ' . $lname . '</option>\n';
              }
              $stmt->close();
            ?>
        </select>
        <input name="addPokeLoc" type="submit" class="btn-primary" value="Update Pokemon"/>
        </fieldset>
      </form>
    </div>


    <div class="box5">
      <form action='addEvoToPoke.php' method='POST'>
        <fieldset>
          <legend>Add An Evolution To A Pokemon</legend>
            Select Pokemon: <select name="pokeName">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
            </select>
            Select Select: <select name="pokeEvo">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
        </select>
        <input name="addPokeEvo" type="submit" class="btn-primary" value="Update Pokemon"/>
        </fieldset>
      </form>
    </div>


    <div class="box6">
      <form action='addType.php' method='POST'>
        <fieldset>
          <legend>Add A New Type</legend>
            Name: <input type="text" id="tName" name="tName" value="Type Name" />
            <input name="add-type" type="submit" class="btn-primary" value="Add Type"/>
        </fieldset>
      </form>
      </div>


      <div class="box14">
      <form action='addSkill.php' method='POST'>
        <fieldset>
          <legend>Add A New Skill</legend>
            Name: <input type="text" id="sName" name ="sName" value="Skill Name"/>
            <input name="add-skill" type="submit" class="btn-primary" value="Add Skill"/>
       </fieldset>
      </form>
    </div>


    <div class="box7">
       <form action='addLoc.php' method='POST'>
        <fieldset>
          <legend>Add A New Location</legend>
            Location: <input type="text" id="Lname" name="Lname" value=" Location" />
            <input name="add-loc" type="submit" class="btn-primary" value="Add Location"/>
        </fieldset>
      </form>
    </div>

    <div class="box8">
      <form action='deletePoke.php' method='POST'>
        <fieldset>
          <legend>Delete A Pokemon</legend>
           Name: <select name = "delPoke">
            <?php
              if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
              }

              if(!$stmt->execute()){
                echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              if(!$stmt->bind_result($id, $pname)){
                echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
              }
              while($stmt->fetch()){
              echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
              }
              $stmt->close();
            ?>
        </select>
        <input name="delete-poke" type="submit" class="btn-primary" value="Delete"/>
        </fieldset>
      </form>
    </div>

    
    <div class="box9">
      <form method="post" action="filterType.php">
    <fieldset>
      <legend>Filter By Type</legend>
        <select name="typeName">
          <?php
          if(!($stmt = $mysqli->prepare("SELECT type_id, type_name FROM type"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          if(!$stmt->bind_result($id, $tname)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          while($stmt->fetch()){
           echo '<option value=" '. $id . ' "> ' . $tname . '</option>\n';
          }
          $stmt->close();
          ?>
        </select>
        <input type="submit" value="Run Filter" />
    </fieldset>
  </form>
  </div>



  <div class="box10">
 <form method="post" action="filterPoke.php">
    <fieldset>
      <legend>Filter By Pokemon</legend>
        <select name="pokeName">
          <?php
          if(!($stmt = $mysqli->prepare("SELECT id, name FROM pokemon"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          if(!$stmt->bind_result($id, $pname)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          while($stmt->fetch()){
           echo '<option value=" '. $id . ' "> ' . $pname . '</option>\n';
          }
          $stmt->close();
          ?>
        </select>
        <input type="submit" value="Run Filter" />
    </fieldset>
  </form>
  </div>


  <div class="box11">
   <form method="post" action="filterLoc.php">
    <fieldset>
      <legend>Filter By Location</legend>
        <select name="locName">
          <?php
          if(!($stmt = $mysqli->prepare("SELECT loc_id, loc_name FROM location"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          if(!$stmt->bind_result($id, $Lname)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          while($stmt->fetch()){
           echo '<option value=" '. $id . ' "> ' . $Lname . '</option>\n';
          }
          $stmt->close();
          ?>
        </select>
         <input type="submit" value="Run Filter" />
    </fieldset>
  </form>
  </div>


  <div class="box12">
   <form method="post" action="filterSkill.php">
    <fieldset>
      <legend>Filter By Skill</legend>
        <select name="skillName">
          <?php
          if(!($stmt = $mysqli->prepare("SELECT skill_id, skill_name FROM skill"))){
            echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
          }

          if(!$stmt->execute()){
            echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          if(!$stmt->bind_result($id, $sname)){
            echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
          }
          while($stmt->fetch()){
           echo '<option value=" '. $id . ' "> ' . $sname . '</option>\n';
          }
          $stmt->close();
          ?>
        </select>
        <input type="submit" value="Run Filter" />
    </fieldset>
  </form>
  </div>
  </div>
	</body>
</html>