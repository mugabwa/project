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

    public function update($query, $paramType, $paramArray){
        $stmt = $this->dbHandler->prepare($query);
        if(!empty($paramType)&&!empty($paramArray)){
            $this->bindQueryParams($stmt,$paramType,$paramArray);
        }
        return $stmt->execute();
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

class Administrator extends Person{
    private $role;
    private $birth;
    public function __construct()
    {
        parent::__construct();
        $this->role = 'admin';
        $this->birth = date('Y/m/d');
    }
    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$rol,$birth){
        $this->role = mysqli_real_escape_string($connector,$_POST[$rol]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this-> birth = mysqli_real_escape_string($connector,$_POST[$birth]);
        $this->innerConver();
        $this->uploadData();
    }
    private function uploadData(){
        $query = "INSERT INTO admin (firstName,lastName,username,pword,birthDate,gender,role) VALUES (?,?,?,?,?,?,?)";
        $paramType = "sssssis";
        $paramArray = array($this->firstName,$this->lastName,$this->username,$this->password,$this->birth,$this->gender,$this->role);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if (!empty($result)){
            header("Location: ../interface/test/register.php?New recorded created successfully");
        }else{
            header("Location: ../interface/test/addAdmin.php?failed");
        }
    }

}

class Student extends Person{
    private $regDate;
    private $class;
    private $level;
    private $birth;

    public function __construct()
    {

        parent::__construct();
        $this->regDate = date('Y-m-d');
    }

    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$reg,$birth,$stream){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->regDate = mysqli_real_escape_string($connector,$_POST[$reg]);
        $this->birth = mysqli_real_escape_string($connector,$_POST[$birth]);
        $this->class = mysqli_real_escape_string($connector,$_POST[$stream]);
        $this->level = $this->getForm($this->dateExpo($this->regDate),$this->class);
//        $this->innerConver();
        $this->validateStudent();
    }
    //return the current class from a given date
    private function dateExpo($givenDate){
        list($year,$month,$day) = explode("-",$givenDate);
        $currentdate = strtotime($year . "-" . $month . "-" . $day);
        $result = (date('Y') - date('Y',$currentdate))+200;
        if($result>201) {
            $result += 1;
        }
        return $result;
    }
    //returns the formID
    private function getForm($input,$input1){
        $query = "SELECT streamID FROM streamLink WHERE FormID = ? and ClassID = ?;";
        $paramType = 'ii';
        $paramArray = array($input,$input1);
        $result = $this->myconnect->select($query,$paramType,$paramArray);
        return $result[0]['streamID'];
    }
    private function insertData($studentID){
        $curDate = date('Y/m/d');
        $query = "INSERT INTO student (username,password,last_logged,adminNo) VALUES (?,?,?,?);";
        $paramType = "sssi";
        $paramArray = array($this->username,$this->password,$curDate,$studentID);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if (!empty($result)){
            header("Location: ../interface/test/registerStudent.php?New recorded created successfully");
        }else{
            header("Location: ../interface/test/registerStudent.php?Error: Values not inserted");
        }

    }
    private function validateStudent(){
        $query = "INSERT INTO student_info (firstName,lastName,Gender,DoB,adminDate,streamLinkID) VALUES (?,?,?,?,?,?)";
        $paramType = "ssissi";
        $paramArray = array($this->firstName,$this->lastName,$this->gender,$this->birth,$this->regDate,$this->level);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if (!empty($result)) {
            $this->insertData($result);
        }else{
            header("Location: ../interface/test/registerStudent.php?Error: Values not inserted");

        }
    }

}

class StudentParent extends Person{
    private $adminNo;
    private $phone;
    private $myarray;
    public function __construct()
    {
        parent::__construct();
        $this->phone = '0700000000';
        $this->adminNo='1234';
        $this->myarray = array();
    }
    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$contact,$reg){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->adminNo = mysqli_real_escape_string($connector,$_POST[$reg]);
        $this->phone = mysqli_real_escape_string($connector,$_POST[$contact]);
        $this->myarray=explode(",",$this->adminNo);
        sort($this->myarray);
//        $this->innerConver();
        $this->insertDetails();
    }
    private function validateParent($parentID){
        $query = "UPDATE student_info SET ParentID = ? WHERE studentID = ?;";
        $paraType = 'ii';
        $arrayObject = new ArrayObject($this->myarray);
        $iterator = $arrayObject->getIterator();
        for ($iterator; $iterator->valid(); $iterator->next()){
            $paraArray = array($parentID,$iterator->current());
            $result = $this->myconnect->update($query,$paraType,$paraArray);
        }
        if(!empty($result)){
            if(($this->student[0]==$result[0]['firstName']) and ($this->student[1] ==$result[0]['lastName'])){
                return true;
            }else{
                header("Location: ../interface/test/registerParent.php?failed1");
                return false;
            }
        }else{
            header("Location: ../interface/test/registerParent.php?failed2");
            return false;
        }
    }

    private function insertDetails(){
        $curDate = date('Y/m/d');
        $query = "INSERT INTO parent(firstName,lastName,username,password,gender,contacts,last_logged) VALUE (?,?,?,?,?,?,?);";
        $paraType = "sssssss";
        $paraArray = array($this->firstName,$this->lastName,$this->username,$this->password,$this->gender,$this->phone,$curDate);
        $result = $this->myconnect->insert($query,$paraType,$paraArray);
        if(!empty($result)){
            if($this->validateParent($result)){
                header("Location: ../interface/test/registerParent.php?success");
            }
        }else{
            header("Location: ../interface/test/registerParent.php?failed3");
        }
    }
}

class Teacher extends Person{
    private $phone;
    private $birthDate;
    private $subject;
    private $class;
    public function __construct()
    {
        parent::__construct();
        $this->phone = '0700000000';
        $this->subject = 123;
        $this->class = array();
        $this->birthDate = date('Y/m/d');
    }
    public function getValues($connector,$fname,$lname,$sex,$user,$pass,$contact,$birth,$sub,$clas){
        $this->username = mysqli_real_escape_string($connector,$_POST[$user]);
        $this->password = mysqli_real_escape_string($connector,$_POST[$pass]);
        $this->lastName = mysqli_real_escape_string($connector,$_POST[$lname]);
        $this->firstName = mysqli_real_escape_string($connector,$_POST[$fname]);
        $this->gender = mysqli_real_escape_string($connector,$_POST[$sex]);
        $this->phone = mysqli_real_escape_string($connector,$_POST[$contact]);
        $this->birthDate = mysqli_real_escape_string($connector, $_POST[$birth]);
        $this->subject = mysqli_real_escape_string($connector,$_POST[$sub]);
        foreach ($_POST[$clas] as $k=>$v){
            $this->class[mysqli_real_escape_string($connector, $k)] = mysqli_real_escape_string($connector,$v);
        }
//        $this->innerConver();
        $teacherID = $this->setDetails();
        $this->setSubject($teacherID);
    }
    //sets the class and the subject a teacher teaches
    private function setSubject($teacherID){
        $query = "INSERT INTO subject_teacher (streamID,subjectID,teacherID) VALUES (?,?,?);";
        $paramType = "iii";
        foreach ($this->class as $value){
            $paramArray = array($value,$this->subject,$teacherID);
            print_r($paramArray);
            $result = $this->myconnect->insert($query,$paramType,$paramArray);
            if(empty($result)){
                header("Location: ../interface/test/registerTeacher.php?failed1");
                break;
            }
            echo $result;
        }
        if(!empty($result)){
            header("Location: ../interface/test/registerTeacher.php?success");
        }
    }

    private function setDetails(){
        $curDate = date('Y/m/d');
        $query = "INSERT INTO teacher(firstName,lastName,username,password,DoB,gender,contacts,last_logged) VALUES (?,?,?,?,?,?,?,?);";
        $paramType = "sssssiss";
        $paramArray = array($this->firstName,$this->lastName,$this->username,$this->password,
            $this->birthDate,$this->gender,$this->phone,$curDate);
        $result = $this->myconnect->insert($query,$paramType,$paramArray);
        if(!empty($result)){
            return $result;
        }else{
            header("Location: ../interface/test/registerTeacher.php?failed");
        }
    }
}