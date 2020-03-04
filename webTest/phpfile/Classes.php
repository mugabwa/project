<?php


class DBConnector
{
    public $dbHandler;
    private $serverName;
    private $userName;
    private $password;
    private $dbName;

    function __construct($sname='localhost',$uname='root',$pass='',$db='school_system')
    {
        $this->dbName = $db;
        $this->serverName = $sname;
        $this->userName = $uname;
        $this->password = $pass;
        $this->dbHandler = $this->connect();
    }

    public function connect(){
        $conn = new mysqli($this->serverName,$this->userName,$this->password,$this->dbName);
        if(mysqli_connect_errno()){
            trigger_error("Error: ".$conn->connect_errno);
            trigger_error("\nConnection failed: ".$conn->connect_error);
            exit(1);
        }
        else{
//            echo "Connection is good";
            return $conn;
        }
    }
    public function select($query,$paramType="",$paramArray=array()){
        $stmt = $this->dbHandler->prepare($query);
        if (!empty($paramType)&&!empty($paramArray)){
            $this->bindQueryParams($stmt,$paramType,$paramArray);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                $resultSet[] = $row;
            }
        }
        if(!empty($resultSet)){
            return $resultSet;
        }
    }

    public function insert($query, $paramType, $paramArray){
//        print $query;
        $stmt = $this->dbHandler->prepare($query);
        if(!empty($paramType)&&!empty($paramArray)){
            $this->bindQueryParams($stmt,$paramType,$paramArray);
        }
        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    public function execute($query, $paramType, $paramArray){
        $stmt = $this->dbHandler->prepare($query);
        if(!empty($paramType)&&!empty($paramArray)){
            $this->bindQueryParams($stmt,$paramType,$paramArray);
        }
        $stmt->execute();
    }

    public function bindQueryParams($stmt,$paramType,$paramArray=array()){
        $paramValuesReference[] = & $paramType;
        for ($i = 0; $i<count($paramArray);$i ++){
            $paramValuesReference[] = & $paramArray[$i];
        }
        call_user_func_array(array($stmt,'bind_param'),$paramValuesReference);
    }

    public function numRows($query,$paramType="",$paramArray=array()){
        $stmt = $this->dbHandler->prepare($query);
        if (!empty($paramArray)&& !empty($paramType)){
            $this->bindQueryParams($stmt,$paramType,$paramArray);
        }
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;
        return $recordCount;
    }

}

class Person{
    protected $myconnect;
    protected $firstName;
    protected $lastName;
    protected $username;
    protected $password;
    protected $gender;

    public function  __construct()
    {
        $this->firstName='Allan';
        $this->lastName='Mugabwa';
        $this->gender='male';
        $this->password="";
        $this->username='mugas';
        $this->myconnect = new DBConnector();
    }

    protected function innerConver(){
        if ($this->gender == 'male'){
            $this->gender = 1;
        }
        else if($this->gender == 'female'){
            $this->gender = 0;
        }
        else{
            $this->gender = 2;
        }
    }
}

class Student extends Person{
    private $regNo;

    public function __construct()
    {

        parent::__construct();
        $this->regNo = '12345';
    }

    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$reg){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->regNo = mysqli_real_escape_string($connector,$_POST[$reg]);
        $this->innerConver();
        $this->validateStudent();
    }
    public function display(){
        echo $this->username."<br>";
        echo $this->gender."<br>";
        echo $this->regNo."<br>";
        echo $this->password."<br>";
        echo $this->lastName."<br>";
        echo $this->firstName."<br>";
    }
    private function insertData(){
        $curDate = date('Y/m/d');
        $query = "INSERT INTO student (username,password,last_logged,adminNo) VALUES (?,?,?,?);";
        $paramType = "sssi";
        $paramArray = array($this->username,$this->password,$curDate,$this->regNo);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if (!empty($result)){
            echo "New recorded created successfully";
        }else{
            echo "Error: Values not inserted";
        }

    }
    private function validateStudent(){
        $query = "SELECT firstName,lastName,Gender FROM student_info WHERE studentID = ?";
        $paramType = "i";
        $paramArray = array($this->regNo);
        $result = $this->myconnect->select($query,$paramType,$paramArray);
        if (!empty($result)){
            if(($result[0]['firstName']==$this->firstName)&&($result[0]['lastName']==$this->lastName)&&($result[0]['Gender']==$this->gender)){
                $this->insertData();
            }else{
                if($result[0]['firstName']!=$this->firstName){
                    echo "The student first name do not match with the ones in the school record<br>";
                }
                if($result[0]['lastName']!=$this->lastName){
                    echo "The student last name do not match with the ones in the school record<br>";
                }
                if($result[0]['Gender']!=$this->gender){
                    echo "The student gender do not match with the ones in the school record<br>";
                }
                echo "Error in insertion";
            }
        }else{
            echo "<br>The record of this student does not exist!<br>";
        }

    }

}

class StudentParent extends Person{
    private $adminNo;
    private $phone;
    private $student;
    public function __construct()
    {
        parent::__construct();
        $this->phone = '0700000000';
        $this->adminNo='1234';
        $this->student = array('none','none');
    }
    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$reg,$contact,$sname1,$sname2){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->adminNo = mysqli_real_escape_string($connector,$_POST[$reg]);
        $this->phone = mysqli_real_escape_string($connector,$_POST[$contact]);
        $this->student = array(mysqli_real_escape_string($connector,$_POST[$sname1]),mysqli_real_escape_string($connector,$_POST[$sname2]));
        $this->innerConver();
        $this->insertDetails();
    }
    private function validateParent(){
        $query = "SELECT firstName,lastName FROM student_info where studentID = ?";
        $paraType = 'i';
        $paraArray = array($this->adminNo);
        $result = $this->myconnect->select($query,$paraType,$paraArray);
        if(!empty($result)){
            if(($this->student[0]==$result[0]['firstName']) and ($this->student[1] ==$result[0]['lastName'])){
                return true;
            }else{
                header("Location: ../interface/test/parentSignup.html?failed1");
                return false;
            }
        }else{
            header("Location: ../interface/test/parentSignup.html?failed2");
            return false;
        }
    }

    private function insertDetails(){
        $curDate = date('Y/m/d');
        if($this->validateParent()){
            $query = "INSERT INTO parent(firstName,lastName,username,password,gender,contacts,last_logged) VALUE (?,?,?,?,?,?,?);";
            $paraType = "sssssss";
            $paraArray = array($this->firstName,$this->lastName,$this->username,$this->password,$this->gender,$this->phone,$curDate);
            $result = $this->myconnect->insert($query,$paraType,$paraArray);
            if(!empty($result)){
                header("Location: ../interface/test/loginParent.php?success");
            }else{
                header("Location: ../interface/test/parentSignup.html?failed3");
            }

        }
    }
}

class Teacher extends Person{
    private $phone;
    private $birthDate;
    public function __construct()
    {
        parent::__construct();
        $this->phone = '0700000000';
        $this->birthDate = date('Y/m/d');
    }
    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$contact,$birth){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->phone = mysqli_real_escape_string($connector,$_POST[$contact]);
        $this->birthDate = mysqli_real_escape_string($connector, $_POST[$birth]);
        $this->innerConver();
        $this->setDetails();
    }
    private function setDetails(){
        $curDate = date('Y/m/d');
        $query = "INSERT INTO teacher(firstName,lastName,username,password,DoB,gender,contacts,last_logged) VALUE (?,?,?,?,?,?,?,?);";
        $paramType = "sssssiss";
        $paramArray = array($this->firstName,$this->lastName,$this->username,$this->password,
            $this->birthDate,$this->gender,$this->phone,$curDate);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if(!empty($result)){
            header("Location: ../interface/test/loginTeacher.php?success");
        }else{
            header("Location: ../interface/test/teacherSignup.html?failed");
        }
    }
}