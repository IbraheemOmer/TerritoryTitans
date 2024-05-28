<?php
session_start();

$db_hostname = 'localhost';
$db_database = 'game';
$db_username = 'root';
$db_paswword = '';
$connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

class Player
{
    private $userName;
    private $team;
    public function __construct($userName, $team)
    {
        $this->userName = $userName;
        $this->team = $team;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function getTeam()
    {
        return $this->team;
    }
    public function setTeam($team)
    {
        $this->team = $team;
    }
}

if (isset($_POST["function_name"])){
    $fn = $_POST["function_name"];

    if ($fn == "getName"){
        getName();
    }
    else if ($fn == "getTeam"){
        getTeam();
    }
    else if ($fn == "create_board"){
        create_board();
    }
    else if ($fn == "display_board"){
        display_board();
    }
    else if ($fn == "update_board"){
        update_board();
    }
    else if ($fn == "display_stats"){
        display_stats();
    }
    else if ($fn == "logout"){
        logout();
    }
    else if ($fn == "admin"){
        admin();
    }
}

function getName(){
    foreach ($_SESSION["user_details"] as $n){
        $name = $n->getUserName();
    }
    echo "$name";
}

function getTeam(){
    foreach ($_SESSION["user_details"] as $t){
        $team = $t->getTeam();
    }
    echo "$team";
}

function create_board(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $query = "SELECT COUNT(*) FROM board";
    $result = mysqli_query($connection, $query);
    $row = $result->fetch_row();
    $count = $row[0];

    if ($count < 50){
        for ($i = 0; $i < 100; $i++){
            $cell = $i;
            $title = "";
            $color = "skyblue";
            $red = 0;
            $green = 0;
            $yellow = 0;
            $occupied = "no";

            $query = "INSERT INTO board (cell, title, color, red, green, yellow, occupied) VALUES ('$cell', '$title', '$color', '$red', '$green', '$yellow', '$occupied')";
            mysqli_query($connection, $query);
        }
    }
}

function display_board(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $username = $_POST['name'];
    $team = $_POST['color'];

    $query = "SELECT location FROM user_details WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $index = $row['location'];

    $output = "";
    for($i = 0; $i < 100; $i++){
        $result = $connection->query("SELECT * FROM board WHERE cell='$i'");

        // Fetch the row as an associative array
        $row = $result->fetch_assoc();

        // Store the values of the columns in variables
        $title = $row['title'];
        $color = $row['color'];
        $red = $row['red'];
        $green = $row['green'];
        $yellow = $row['yellow'];
        $occupied = $row['occupied'];

        if ($index == $i){
            $output .= "<div title=\"$title\" style=\"background-color: $color;\" id=\"cell\" onclick = \"update_board($i)\"><img src=\"ship.png\"></div>";
        } else {
            $output .= "<div title=\"$title\" style=\"background-color: $color;\" id=\"cell\" onclick = \"update_board($i)\"></div>";
        }
    }
    echo "$output";
}

function update_board(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $name = $_POST['name'];
    $team = $_POST['color'];
    $index = $_POST['index'];

    $result = $connection->query("SELECT * FROM board WHERE cell='$index'");

    // Fetch the row as an associative array
    $row = $result->fetch_assoc();

    // Store the values of the columns in variables
    $title = $row['title'];
    $color = $row['color'];
    $red = $row['red'];
    $green = $row['green'];
    $yellow = $row['yellow'];
    $occupied = $row['occupied'];

    $allow = "false";

    if ($title == ""){
        $c_name = "$name";
        $allow = "true";
    }
    else {
        $titles = explode("\r\n", $title);

        $found = "false";
        foreach($titles as $t){
            if ($t == $name){
                $found = "true";
            }
        }

        $c_name = "";
        if ($found == "false"){
            foreach($titles as $t){
                $c_name .= "$t\r\n";
            }
            $c_name .= "$name";
            $allow = "true";
        }
    }

    if ($allow == "true") {
        if ($team == "Red") {
            $red++;
            if ($red >= $green && $red >= $yellow) {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$team', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            } else {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$color', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            }
        } else if ($team == "Green") {
            $green++;
            if ($green >= $red && $green >= $yellow) {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$team', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            } else {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$color', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            }
        } else if ($team == "Yellow") {
            $yellow++;
            if ($yellow >= $red && $yellow >= $green) {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$team', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            } else {
                $result = $connection->query("UPDATE board SET title='$c_name', color='$color', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$index'");
                $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
            }
        }
    }
    else {
        $result = $connection->query("UPDATE user_details SET location='$index' WHERE username='$name'");
    }
}

function display_stats(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $username = $_POST['username'];
    $team = $_POST['team'];

    $query = "SELECT location FROM user_details WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $index = $row['location'];

    $output = "";

    $row = ($index % 10) + 1;
    $column = (int)($index / 10) + 1;

    if ($row >0 && $column > 0){
        $output .= "Your Location $column,$row <br><br>";
    }
    else{
        $output .= "Your Location <br><br>";
    }
    

    $red_count = 0;
    $result = $connection->query("SELECT COUNT(*) FROM board WHERE color = 'Red'");
    $row = $result->fetch_row();
    $red_count = $row[0];

    $green_count = 0;
    $result = $connection->query("SELECT COUNT(*) FROM board WHERE color = 'Green'");
    $row = $result->fetch_row();
    $green_count = $row[0];

    $yellow_online = 0;
    $result = $connection->query("SELECT COUNT(*) FROM board WHERE color = 'Yellow'");
    $row = $result->fetch_row();
    $yellow_count = $row[0];

    $output .= "<b>Territory leaderboard</b><br> Team red: $red_count cells<br> Team green: $green_count cells<br> Team yellow: $yellow_count cells<br><br>";

    $unoccupied = 100 - $red_count - $green_count - $yellow_count;

    $output .= "Unoccupied: $unoccupied cells<br><br>";

    $red_online = 0;
    $result = $connection->query("SELECT COUNT(*) FROM user_details WHERE team='Red' AND status='online'");
    $row = $result->fetch_row();
    $red_online = $row[0];

    $green_online = 0;
    $result = $connection->query("SELECT COUNT(*) FROM user_details WHERE team='Green' AND status='online'");
    $row = $result->fetch_row();
    $green_online = $row[0];

    $yellow_online = 0;
    $result = $connection->query("SELECT COUNT(*) FROM user_details WHERE team='Yellow' AND status='online'");
    $row = $result->fetch_row();
    $yellow_online = $row[0];

    $output .= "<b>Players online</b><br> Team red: $red_online <br> Team green: $green_online <br> Team yellow: $yellow_online<br><br>";

    echo "$output";
}

function logout(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    $username = $_POST["user"];
    $status = "offline";

    $result = $connection->query("UPDATE user_details SET status='$status' WHERE username='$username'");

    session_destroy();
}

function admin(){
    $db_hostname = 'localhost';
    $db_database = 'game';
    $db_username = 'root';
    $db_paswword = '';
    $connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

    for ($i = 0; $i < 100; $i++){
        $cell = $i;
        $title = "";
        $color = "skyblue";
        $red = 0;
        $green = 0;
        $yellow = 0;
        $occupied = "no";

        $result = $connection->query("UPDATE board SET title='$title', color='$color', red='$red', green='$green', yellow='$yellow', occupied='$occupied' WHERE cell='$cell'");
    }

    $result = $connection->query("UPDATE user_details SET location=-1");
}
?>