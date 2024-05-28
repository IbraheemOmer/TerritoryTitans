<?php
session_start();

$db_hostname = 'localhost';
$db_database = 'game';
$db_username = 'root';
$db_paswword = '';
$connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

if (isset($_POST["function_name"])){
    $fn = $_POST["function_name"];
    if ($fn == "update_chat"){
        update_chat();
    }
    else if ($fn == "display_chat"){
        display_chat();
    }
}

function update_chat(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $username = $_POST["name"];
    $team = $_POST["team"];
    $message = $_POST["message"];

    $result = $connection->query("INSERT INTO chat (username, team, message) VALUES ('$username', '$team', '$message')");
}

function display_chat(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $result = $connection->query("SELECT * FROM chat");

    $output = "";
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $team = $row['team'];
        $player = $row['username'];
        $message = $row['message'];

        $output .= "<span style=\"background-color: $team;\">$player</span>: $message <br>";
    }
    echo "$output";
}
?>