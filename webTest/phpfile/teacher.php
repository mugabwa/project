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
    $examName = mysqli_real_escape_string($conn, $_POST['exname']);
    $examType = mysqli_real_escape_string($conn, $_POST['examtype']);
    $examDate = mysqli_real_escape_string($conn, $_POST['date_exam']);
//    echo $form.$stream.$subject.$term.$examName.$examType.$examDate;
    $query = "SELECT formID FROM form WHERE levelName=?;";
    $paramType = 'i';
    $paremArray = array($form);
    $result = $connection->select($query,$paramType,$paremArray);
    $formID = $result[0]['formID'];  //form ID
    $query1 = "SELECT classID FROM class WHERE className = ?;";
    $paramType1 = 's';
    $paremArray1 = array($stream);
    $result1 = $connection->select($query1,$paramType1,$paremArray1);
    $streamID = $result1[0]['classID'];  //stream ID

    $query2 = "SELECT streamID FROM streamLink WHERE FormID = ? AND ClassID = ?;";
    $paramType2 = 'ii';
    $paremArray2 = array($formID, $streamID);
    $result2 = $connection->select($query2,$paramType2,$paremArray2);
    $streamLinkID = $result2[0]['streamID'];

    $query3 = "SELECT subjectID FROM subject WHERE name = ?;";
    $paramType3 = 's';
    $paremArray3 = array($subject);
    $result3 = $connection->select($query3,$paramType3,$paremArray3);
    $subjectID = $result3[0]['subjectID'];

    $query4 = "INSERT INTO examDetails (examName,examType,examDate,term) VALUES (?,?,?,?);";
    $paramType4 = "sssi";
    $paremArray4 = array($examName,$examType,$examDate,$term);
    $result4 = $connection->insert($query4,$paramType4,$paremArray4);
    if(!empty($result4)){
        header("Location: ../interface/test/resultForm.php?Recorded created!");
        echo "Record successfully created";
    }else{
        header("Location: ../interface/test/examDetails.php?Error: Recorded not created!");
//        print_r($paremArray);
        exit(1);
    }
//    session_start();
//    $_SESSION['subjectId'] = $subjectID;
//    $_SESSION['linkId'] = $streamLinkID;
    exit(0);
}
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
