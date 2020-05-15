<?php
    require_once '../../phpfile/signup.php';
    session_start();
    if(!empty($_SESSION['userId'])){
        logout1();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test case</title>
    <link rel="stylesheet" href="../style1.css" type="text/css">
    <link rel="stylesheet" href="../style2.css" type="text/css">
    <link rel="stylesheet" href="../style3.css" type="text/css">
    <script src="../javascrip.js"></script>

</head>
<body>
<div class="grid-container">
    <div class="grid-container-nav-top">
        <div class="grid-container-nav-top-logo">
            <div class="menu1">
                <nav>
                    <ul>
                        <li><a href="#"><img src="../resources/images/phoenix0.png" id="logo" onload="loadHomeDoc()"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="grid-container-nav-top-menu">
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Login</button>
                                <div class="dropdown-content">
                                    <a href="login1.php">Student</a>
                                    <a href="loginParent.php">Parent</a>
                                    <a href="loginTeacher.php">Teacher</a>
                                </div>
                            </div>
                        <li><a href="register.php">Register</a></li>
<!--                        <li>-->
<!--                            <div class="dropdown">-->
<!--                                <button class="dropbtn">Signup</button>-->
<!--                                <div class="dropdown-content">-->
<!--                                    <a href="studentSignup.html">Student</a>-->
<!--                                    <a href="parentSignup.html">Parent</a>-->
<!--                                    <a href="teacherSignup.html">Teacher</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                             </li>-->
                    </ul>
                </nav>
            </div>
        </div>

    </div>
    <div class="grid-container-nav-bottom1">
        <div class="grid-container-left">
            <div class="grid-container-left-top">
                <p id="homeStatement"></p>
            </div>
            <div class="grid-container-left-bottom">
                <h3 style="text-align: center">Login options</h3>
                <ul>
                    <li><a href="login1.php">Student</a></li>
                    <li><a href="loginParent.php">Parent</a></li>
                    <li><a href="loginTeacher.php">Teacher</a></li>
                </ul>
            </div>
        </div>
        <div class="grid-container-right">
            <div class="principal">
                <img onload="loadDoc()" src="../resources/images/principal.png" class="principalImage">
                <p>Caspal Maina - <strong>Principal</strong></p>
            </div>
            <div class="princState">
                <p id="principalNote"></p>
            </div>

        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateViewRev"></p>
    </div>
</div>
<script src="../response.js"></script>
</body>
</html>
