<!DOCTYPE html>
<html><body>
<?php

$servername = "91.216.107.248";

// REPLACE with your Database name
$dbname = "gauth1148636_1fzru";
// REPLACE with Database user
$username = "gauth1148636_1fzru";
// REPLACE with Database user password
$password = "n7ttg6wdjq";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, id_stage, nbr_entree, nbr_sortie, nbr_actuel, heure FROM Nbr_Personne";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>ID_Stage</td> 
        <td>Nombre d\'entrées</td> 
        <td>Nombre de sorties</td> 
        <td>Nombre actuel</td> 
        <td>Heure</td>
      </tr>';

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_id_stage = $row["id_stage"];
        $row_nbr_entree = $row["nbr_entree"];
        $row_nbr_sortie = $row["nbr_sortie"];
        $row_nbr_actuel = $row["nbr_actuel"];
        $row_heure = $row["heure"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));

        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));

        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_id_stage . '</td>
                <td>' . $row_nbr_entree . '</td> 
                <td>' . $row_nbr_sortie . '</td> 
                <td>' . $row_nbr_actuel . '</td> 
                <td>' . $row_heure . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?>
</table>
</body>
</html>
