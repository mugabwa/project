<?php
include_once 'Classes.php';
$connection = new DBConnector();
$conn = $connection->connect();

function details($userID){
    global $connection;
    $query = "SELECT firstName, lastName, username, gender, DoB, contacts FROM teacher WHERE teacherID = ?;";
    $paramType = "i";
    $paremArray = array($userID);
    $result = $connection->select($query,$paramType,$paremArray);
    if(!empty($result)){
        if($result[0]['gender']){
            $result[0]['gender'] = 'Male';
        }
        else{
            $result[0]['gender'] = 'Female';
        }
        $birdate = date('Y', strtotime($result[0]['DoB']));
        $birdate = date('Y') - $birdate;
        $result[0]['DoB'] = $birdate;
//        print_r($result[0]);
        return $result[0];

    }else{
        echo "baaad";
    }
}