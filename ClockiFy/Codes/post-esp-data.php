<?php

$servername = "91.216.107.248";

// REPLACE with your Database name
$dbname = "gauth1148636_1fzru";
// REPLACE with Database user
$username = "gauth1148636_1fzru";
// REPLACE with Database user password
$password = "n7ttg6wdjq";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $id = $id_stage = $nbr_entree = $nbr_sortie = $nbr_actuel = $heure = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $id = test_input($_POST["id"]);
        $id_stage = test_input($_POST["id_stage"]);
        $nbr_entree = test_input($_POST["nbr_entree"]);
        $nbr_sortie = test_input($_POST["nbr_sortie"]);
        $nbr_actuel = test_input($_POST["nbr_actuel"]);
        $heure = test_input($_POST["heure"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Nbr_Personne (id_stage, nbr_entree, nbr_sortie, nbr_actuel, heure)
        VALUES ('" . $id . "', '" . $id_stage . "', '" . $nbr_entree . "', '" . $nbr_sortie . "', '" . $nbr_actuel . "', '" . $heure . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}