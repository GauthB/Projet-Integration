<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "wecod1168786_2jauzk";
// REPLACE with Database user
$username = "wecod1168786_2jauzk@localhost";
// REPLACE with Database user password
$password = "guyjptvc2p";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $sensor = $location = $value1 = $value2 = $value3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $Stage_name = test_input($_POST["Stage_name"]);
        $Stage_latitude = test_input($_POST["Stage_latitude"]);
        $Stage_longitude = test_input($_POST["Stage_longitude"]);
        $nbrOfPeople = test_input($_POST["nbrOfPeople"]);
        $MaxPeople = test_input($_POST["MaxPeople"]);
        $Event_id = test_input($_POST["Event_id"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Stages (Stage_name, Stage_latitude, Stage_longitude, nbrOfPeople, MaxPeople, Event_id)
        VALUES ('" . $Stage_name . "', '" . $Stage_latitude . "', '" . $Stage_longitude . "', '" . $nbrOfPeople . "', '" . $MaxPeople . "', '" . $Event_id . "')";

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