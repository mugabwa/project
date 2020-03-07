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
    private function selectQuery($value, $type, $memberArr){
        $query = $value;
        $paramType = $type;
        $paramArray = $memberArr;
        return $this->ds->select($query,$paramType,$paramArray);
    }

    public function getMemberById($memberId){
        if ($_SESSION["type"] == "Student"){
            $query="SELECT * FROM student_info WHERE studentID = ?;";
            return $this->selectQuery($query,'i',array($memberId));
        }elseif ($_SESSION["type"]=="Parent"){
            $query = "SELECT * FROM parent WHERE parentID = ?;";
            return $this->selectQuery($query,'i',array($memberId));
        }elseif ($_SESSION['type'] == "Teacher"){
            $query = "SELECT * FROM teacher WHERE  teacherID = ?;";
            return $this->selectQuery($query,'i',array($memberId));
        }elseif ($_SESSION['type'] == "Admin"){
            $query = "SELECT firstName,lastName FROM admin WHERE adminID = ?";
            return $this->selectQuery($query,'i',array($memberId));
        }

    }
    public function processLogin($username,$password){
//        $passwordHash = md5($password);
        $query = "SELECT * FROM student WHERE username = ? AND password = ?;";
        $memberResult = $this->selectQuery($query,'ss',array($username,$password));
        if (!empty($memberResult)){
            $_SESSION["userId"] = $memberResult[0]["adminNo"];
            return true;
        }
    }
    public function processParentlog($username,$password){
        $query = "SELECT * FROM parent WHERE username = ? AND password = ?;";
        $memberResult = $this->selectQuery($query,'ss',array($username,$password));
        if(!empty($memberResult)){
            $_SESSION["userId"] = $memberResult[0]["parentID"];
            return true;
        }
    }
    public function processTeacherlog($username,$password){
        $query = "SELECT * FROM teacher WHERE username = ? AND password = ?;";
        $memberResult = $this->selectQuery($query,'ss',array($username,$password));
        if (!empty($memberResult)){
            $_SESSION['userId'] = $memberResult[0]['teacherID'];
            return true;
        }
    }
    public function processAdminlog($username,$password){
        $query = "SELECT * FROM admin WHERE username = ? AND pword = ?;";
        $memberResult = $this->selectQuery($query,'ss',array($username,$password));
        if (!empty($memberResult)){
            $_SESSION['userId'] = $memberResult[0]['teacherID'];
            return true;
        }
    }
}