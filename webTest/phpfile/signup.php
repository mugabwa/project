<?php
include_once 'Classes.php';
$dbConn = new DBConnector();
$conn = $dbConn->connect();

    if(isset($_POST['studentSignup'])){
        $student = new Student();
        $student->getValues($conn,'fname','lname',
            'sex','uname','pword','adminNo');

    }
    if(isset($_POST['parentSignup'])){
        $parent = new StudentParent();
        $parent->getValues($conn,'fname','lname','sex','uname','pword',
            'adminNo','phone','sfname','slname');
    }
    if(isset($_POST['teacherSignup'])){
        $teacher = new Teacher();
        $teacher->getValues($conn, 'fname', 'lname', 'sex', 'uname', 'pword',
            'phone', 'birth');
    }

//    login handler
    if(isset($_POST['login'])) {
        session_start();
        $_SESSION["type"] = "Student";
        $username = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
        require_once __DIR__. '/Session.php';

        $member = new LoginSession();
        $isLoggedIn = $member->processLogin($username,$password);
        if (!$isLoggedIn) {
            $_SESSION["errorMessage"] = "Invalid Credentials";
            header("Location: ../interface/test/login1.php");
        }else{
            header("Location: ../interface/test/studentResult.php");
//            echo "good logged in<br>";
            echo $isLoggedIn;
            echo $_SESSION['uname'];
        }
        if (!empty($_SESSION['userId']))
        {
//            require_once __DIR__. '/Session.php';
            $member = new LoginSession();
            $memberResult = $member->getMemberById($_SESSION["userId"]);
            if(!empty($memberResult[0]["firstName"])){
//                $displayName = ucwords($memberResult[0]["firstName"]);
//                $displayName1 = ucwords($memberResult[0]["lastName"]);
//                print_r($displayName);
//                print_r($displayName1);
                $_SESSION['fname'] = $memberResult[0]["firstName"];
                $_SESSION['lname'] = $memberResult[0]["lastName"];
            }else{

                $_SESSION['fname'] = $result[0]["firstName"];
                $_SESSION['lname'] = $result[0]["lastName"];
            }
        }
        exit();
    }


//    logout
if (isset($_POST['logout'])){
    session_start();
    unset($_SESSION['userId']);
    unset($_SESSION['uname']);
    session_unset();
    session_destroy();
    header("Location:../interface/test/home.php");
}

//    login handler
if(!empty($_POST['parenLogin'])) {
    session_start();
    $_SESSION["type"] = "Parent";
    $username = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
    require_once __DIR__. '/Session.php';

    $member = new LoginSession();
    $isLoggedIn = $member->processParentlog($username,$password);
    if (!$isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
        header("Location: ../interface/test/loginParent.php");
    }else{
        header("Location: ../interface/test/studentResult.php");
        echo $isLoggedIn;
    }
    if (!empty($_SESSION['userId']))
    {
        $member = new LoginSession();
        $memberResult = $member->getMemberById($_SESSION["userId"]);
        if(!empty($memberResult[0]["firstName"])){
            $_SESSION['fname'] = $memberResult[0]["firstName"];
            $_SESSION['lname'] = $memberResult[0]["lastName"];
        }else{

            $_SESSION['fname'] = $result[0]["firstName"];
            $_SESSION['lname'] = $result[0]["lastName"];
        }
    }
    exit();
}


//    teacher login handler
if(!empty($_POST['teacherLogin'])) {
    session_start();
    $_SESSION["type"] = "Teacher";
    $username = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
    require_once __DIR__. '/Session.php';

    $member = new LoginSession();
    $isLoggedIn = $member->processTeacherlog($username,$password);
    if (!$isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
        header("Location: ../interface/test/loginTeacher.php");
    }else{
        header("Location: ../interface/test/teacherOperation.php"); //path to be taken
        echo $isLoggedIn;
    }
    if (!empty($_SESSION['userId']))
    {
        $member = new LoginSession();
        $memberResult = $member->getMemberById($_SESSION["userId"]);
        if(!empty($memberResult[0]["firstName"])){
            $_SESSION['fname'] = $memberResult[0]["firstName"];
            $_SESSION['lname'] = $memberResult[0]["lastName"];
        }else{

            $_SESSION['fname'] = $result[0]["firstName"];
            $_SESSION['lname'] = $result[0]["lastName"];
        }
    }
    exit();
}


//logout function
function logout1(){
//    if (!session_start()){
//        session_start();
//    }
    unset($_SESSION['userId']);
    unset($_SESSION['uname']);
    session_unset();
    session_destroy();
//    header("Location:../interface/test/home.php");
}