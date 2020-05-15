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

if (isset($_POST['examSubmit'])){
    $form = mysqli_real_escape_string($conn,$_POST['level']);
    $stream = mysqli_real_escape_string($conn, $_POST['stream']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $term = mysqli_real_escape_string($conn, $_POST['termdate']);
    $examType = mysqli_real_escape_string($conn, $_POST['examtype']);
    $examDate = mysqli_real_escape_string($conn, $_POST['date_exam']);
    $examDate = date('Y', strtotime($examDate));


    $query1 = "SELECT * FROM examDetails WHERE examType=? AND examDate=? AND term=?;";
    $paramType1="ssi";
    $paramArray1=array($examType,$examDate,$term);
    if(!empty($result=$connection->select($query1,$paramType1,$paramArray1))){
        $examID = $result[0]['examID'];
    }else{
        $query4 = "INSERT INTO examDetails (examType,examDate,term) VALUES (?,?,?);";
        $paramType4 = "ssi";
        $paramArray4 = array($examType,$examDate,$term);
        $examID = $connection->insert($query4,$paramType4,$paramArray4);
    }


    $query = "SELECT streamID FROM streamLink WHERE FormID = ? AND ClassID = ?;";
    $paramType = 'ii';
    $paramArray = array($form, $stream);
    $result2 = $connection->select($query,$paramType,$paramArray);
    $streamLinkID = $result2[0]['streamID'];

    $result3 = getSubject($subject);
    $subjectName = $result3[0]['name'];
//

    if(!empty($examID)){
        header("Location: ../interface/test/resultForm.php?Recorded created!");
        session_start();
        $_SESSION['subID'] = $subject;              //subject ID
        $_SESSION['streamID'] = $streamLinkID;      //stream ID
        $_SESSION['examID'] = $examID;
        $_SESSION['classID'] = $stream;
        $_SESSION['formID'] = $form;
    }else{
        header("Location: ../interface/test/examDetails.php?Error: Recorded not created!");
//        print_r($paremArray);
        exit(1);
    }
    exit(0);
}

//Not complete
if(isset($_POST['profileChange'])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $uname = mysqli_real_escape_string($conn,$_POST['uname']);
    $dob = mysqli_real_escape_string($conn,$_POST['birthDate']);
    $sex = mysqli_real_escape_string($conn,$_POST['gender']);
    $contact = mysqli_real_escape_string($conn, $_POST['phone']);
    $sex = genderToBool($sex);

    $query = "UPDATE teacher SET ";
}


function genderToBool($gender){
    if($gender == 'male'){
        return true;
    }elseif ($gender=='female'){
        return false;
    }
}

function genderConvert($gender){
    if($gender){
        return "male";
    }else{
        return "female";
    }
}

//function that returns the class a student is currently studying in.
function getLevel($linkID){
    global $connection;
    $query = "SELECT FormID,ClassID FROM streamLink WHERE streamID = ?;";
    $paramType = "i";
    $paramArray = array($linkID);
    $result = $connection->select($query,$paramType,$paramArray);
    $query1 = "SELECT levelName FROM form WHERE formID = ?;";
    $result1 = $connection->select($query1,$paramType,array($result[0]['FormID']));
    $query2 = "SELECT className FROM class WHERE classID =?;";
    $result2 = $connection->select($query2,$paramType,array($result['0']['ClassID']));
    return array($result1[0]['levelName'],$result2[0]['className']);
}

//function to return the details about a teacher
function getDetails($teacherID){
    global $connection;
    $query = "SELECT streamID,subjectID FROM subject_teacher WHERE teacherID = ?;";
    $paramType = "i";
    $paramArray = array($teacherID);
    return $connection->select($query,$paramType,$paramArray);
}

//function to return the subject name
function getSubject($subID){
    global $connection;
    $query = "SELECT name FROM subject WHERE subjectID= ?;";
    $paramType = "i";
    $paramArray = array($subID);
    return $connection->select($query,$paramType,$paramArray);
}

function getExamDetails($examID){
    global $connection;
    $query = "SELECT * FROM examDetails WHERE examID = ?;";
    $paramType = "i";
    $paramArray = array($examID);
    return $connection->select($query,$paramType,$paramArray);
}

function studentDetails($streamLink){
    global $connection;
    $query = "SELECT * FROM student_info WHERE streamLinkID = ?;";
    return $connection->select($query,"i",array($streamLink));
}

function studentIdintity($id){
    global $connection;
    $query = "SELECT studentID,firstName,lastName FROM student_info WHERE ParentID = ?;";
    return $connection->select($query,"i",array($id));
}

function examInfo(){
    global $connection;
    $query = "SELECT * FROM examDetails;";
    return $connection->select($query);
}

function getResults($examID){
    global $connection;
    $query = "SELECT * FROM exam WHERE examID = ?;";
    $paramType = "i";
    $paramArray = array($examID);
    return $connection->select($query,$paramType,$paramArray);
}

function studentRegId($streamLink){
    global $connection;
    $query = "SELECT studentID FROM student_info WHERE streamLinkID = ?;";
    return $connection->select($query,"i",array($streamLink));
}


function insertMarks($marks,$streamID,$subID,$studID,$exID){
    global $connection;
    $query = "INSERT INTO exam (results,streamLinkID,subjectID,studentID,examID) VALUES (?,?,?,?,?);";
    $paramType = "diiii";
    $paramArray = array($marks,$streamID,$subID,$studID,$exID);
    $connection->insert($query,$paramType,$paramArray);
}

if(isset($_POST['resultSubmit'])){
    $index = array();
    session_start();
    $array=studentRegId($_SESSION['streamID']);
    foreach ($array as $k){
        array_push($index, $k['studentID']);
    }
    foreach ($index as $v){         //$v is the student ID
        $regNo = mysqli_real_escape_string($conn,$_POST[$v]);
        if(!empty($regNo)){
            insertMarks($regNo,$_SESSION['streamID'],$_SESSION['subID'], $v, $_SESSION['examID']);
        }
    }
    header("Location: ../interface/test/overallResult.php?Score_successfully_added!");
    exit(0);
}