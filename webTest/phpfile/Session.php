<?php
include_once 'Classes.php';

class LoginSession
{
    private $ds;
    function __construct()
    {
        require_once "Classes.php";
        $this->ds = new DBConnector();
    }
    function getMemberById($memberId){
        if ($_SESSION["type"] == "Student"){
            $query="SELECT * FROM student_info WHERE studentID = ?;";
            $paramType = "i";
            $paramArray = array($memberId);
            $memberResult = $this->ds->select($query,$paramType,$paramArray);
            return $memberResult;
        }elseif ($_SESSION["type"]=="Parent"){
            $query = "SELECT * FROM parent WHERE parentID = ?;";
            $paramType = "i";
            $paramArray = array($memberId);
            $memberResult = $this->ds->select($query,$paramType,$paramArray);
            return $memberResult;
        }elseif ($_SESSION['type'] == "Teacher"){
            $query = "SELECT * FROM teacher WHERE  teacherID = ?;";
            $paramType = "i";
            $paramArray = array($memberId);
            $memberResult = $this->ds->select($query,$paramType,$paramArray);
            return $memberResult;
        }

    }
    public function processLogin($username,$password){
//        $passwordHash = md5($password);
        $query = "SELECT * FROM student WHERE username = ? AND password = ?;";
        $paramType = "ss";
        $paramArray = array($username,$password);
        $memberResult = $this->ds->select($query,$paramType,$paramArray);
        if (!empty($memberResult)){
            $_SESSION["userId"] = $memberResult[0]["adminNo"];
//            $query1 = "SELECT firstName,lastName FROM student_info WHERE studentID = ?";
//            $paramType1 = "i";
//            $paramArray1 = array($memberResult[0]["adminNo"]);
//            $result = $this->ds->select($query1,$paramType1,$paramArray1);
//            $_SESSION['fname'] = $result[0]["firstName"];
//            $_SESSION['lname'] = $result[0]["lastName"];
            return true;
        }
    }
    public function processParentlog($username,$password){
        $query = "SELECT * FROM parent WHERE username = ? AND password = ?;";
        $paramType = "ss";
        $paramArray = array($username,$password);
        $memberResult = $this->ds->select($query,$paramType,$paramArray);
        if(!empty($memberResult)){
            $_SESSION["userId"] = $memberResult[0]["parentID"];
            return true;
        }
    }
    public function processTeacherlog($username,$password){
        $query = "SELECT * FROM teacher WHERE username = ? AND password = ?;";
        $paramType = "ss";
        $paramArray = array($username,$password);
        $memberResult = $this->ds->select($query,$paramType,$paramArray);
        if (!empty($memberResult)){
            $_SESSION['userId'] = $memberResult[0]['teacherID'];
            return true;
        }
    }
}