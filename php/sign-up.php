<?php
session_start();

//database connection
$db_hostname = 'localhost';
$db_database = 'game';
$db_username = 'root';
$db_paswword = '';
$connection = new mysqli($db_hostname, $db_username, $db_paswword, $db_database);

//class for players
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

//session creation
if (!isset($_SESSION["user_details"])) $_SESSION["user_details"] = array();

//data check
if (isset($_POST['player_name']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['team'])) {
    //data storage
    $user = $_POST['player_name'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm_password'];
    $team = $_POST['team'];

    //username verification
    $value = "$user";
    $query = "SELECT COUNT(*) FROM user_details WHERE username='$value'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_fetch_row($result)[0];
    if ($count > 0) {
        echo "ERROR! \nPLAYER NAME ALREADY EXISTS!";
    } else {
        if ($password == $c_password) {
            //session updated
            $u = new Player($user, $team);
            array_push($_SESSION["user_details"], $u);
            
            //random landing generated
            $index = rand(0, 99);
            $query = "SELECT COUNT(*) FROM user_details WHERE location='$index'";
            $result = mysqli_query($connection, $query);
            $count = mysqli_fetch_row($result)[0];
            while ($count != 0){
                $index = rand(0, 99);
                $query = "SELECT COUNT(*) FROM user_details WHERE location='$index'";
                $result = mysqli_query($connection, $query);
                $count = mysqli_fetch_row($result)[0];  
            }

            //database insertion
            $stat = "online";
            $query = "INSERT INTO user_details (username, password, team, location, status) VALUES ('$user', '$password', '$team', '$index', '$stat')";
            mysqli_query($connection, $query);

            $query = "UPDATE board SET color='$team' WHERE cell='$index'";
            mysqli_query($connection, $query);

            $query = "UPDATE board SET title='$user' WHERE cell='$index'";
            mysqli_query($connection, $query);

            $i = 1;
            if ($team == "Red"){
                $query = "UPDATE board SET red= '$i' WHERE cell='$index'";
                mysqli_query($connection, $query);
            }
            else if ($team == "Yellow"){
                $query = "UPDATE board SET yellow= '$i' WHERE cell='$index'";
                mysqli_query($connection, $query);
            }
            else if ($team == "Green"){
                $query = "UPDATE board SET green= '$i' WHERE cell='$index'";
                mysqli_query($connection, $query);
            }
            
            echo "safe";
        } else {
            echo "ERROR! \nTHE PASSWORD DOES NOT MATCH!";
        }
    }
}
?>