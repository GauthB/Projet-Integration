<?php
require_once "esp-data.php";

$data = new data();

// Keep this API Key value to be compatible with the ESP32 code provided in the project page.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "12mAT5Ab3j7F9";

$api_key= $id_stage = $nbr_entree = $nbr_sortie = $heure = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $id_stage = test_input($_POST["id_stage"]);
        $nbr_entree = test_input($_POST["nbr_entree"]);
        $nbr_sortie = test_input($_POST["nbr_sortie"]);
        $nbr_actuel = $data->afficheStat('total');

        // Create connection
        $conn = new mysqli($data->getServerName(), $data->getUsername(), $data->getPassword(), $data->getDbName());
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Nbr_Personne (id_stage, nbr_entree, nbr_sortie, nbr_actuel)
        VALUES ('" . $id_stage . "', '" . $nbr_entree . "', '" . $nbr_sortie . "', '" . $nbr_actuel . "')";

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