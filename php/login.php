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

if (isset($_POST['player_name']) && isset($_POST['password'])) {
    $user = $_POST['player_name'];
    $password = $_POST['password'];

    //username verification
    $value = "$user";
    $query = "SELECT COUNT(*) FROM user_details WHERE username='$value'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_fetch_row($result)[0];
    if ($count > 0) {
        //password verification
        $query = "SELECT password FROM user_details WHERE username='$user'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $pas = $row['password'];
        if ($pas == $password){
            $query = "SELECT team FROM user_details WHERE username='$user'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $team = $row['team'];
            $u = new Player($user, $team);
            array_push($_SESSION["user_details"], $u);

            //status update
            $status = 'online';
            $query = "UPDATE user_details SET status='$status' WHERE username='$user'";
            mysqli_query($connection, $query);
            echo "safe";
        }
        else {
            echo "ERROR! \nINCORRECT PASSWORD!";
        }
    } 
    else {
        echo "ERROR! \nTHE PLAYER NAME DOES NOT EXIST!";
    }
}
?>