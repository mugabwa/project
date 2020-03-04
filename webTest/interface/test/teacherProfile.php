<?php
require_once '../../phpfile/teacher.php';
session_start();
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
<!--    <script src="../javascrip.js"></script>-->

</head>
<body onload="loadProf()">
<div class="grid-container">
    <div class="grid-container-nav-top">
        <div class="grid-container-nav-top-logo">
            <div class="menu1">
                <nav>
                    <ul>
                      <img src="../resources/images/phoenix0.png" id="logo"></a></li>
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
                        <li><a href="#">Profile</a> </li>
                        <li><form method="post" action="../../phpfile/signup.php">
                            <button class="btn" name="logout">Logout</button>
                            </form></li>
                        </form>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    <div class="grid-container-nav-bottom extented1">
        <div class="extented">
            <h2>Professional Details</h2>
            <hr>
            <div class="profile">
                <img src="../resources/images/mother-with-daughter.jpg" class="profile-image">
            </div>
            <div>
                <?php
                $mydetails = details($_SESSION['userId']);
                echo sprintf("<p><strong>NAME:</strong> %s %s</p>",$mydetails['firstName'], $mydetails['lastName']);
                echo sprintf("<p><strong>USERNAME:</strong> %s</p>",$mydetails['username']);
                echo sprintf("<p><strong>AGE:</strong> %s</p>",$mydetails['DoB']);
                echo sprintf("<p><strong>GENDER:</strong> %s</p>",$mydetails['gender']);
                echo sprintf("<p><strong>CONTACT:</strong> %s</p>",$mydetails['contacts']);
                ?>
            </div>
            <hr>

        </div>
        <div class="grid-container-right profile-text">

            <?php
//            echo sprintf("Welcome %s %s", $_SESSION['fname'], $_SESSION['lname'])."<br>";
            ?>
            <h2>About Me</h2>
            <hr>
            <div>
                <p id="teacherProfile"></p>
            </div>
            <h2>Details</h2>
            <hr>
            <p><strong>Subjects taught:</strong></p>
            <p><strong>Classes:</strong></p>
            <p><strong>Role:</strong></p>
            <p><strong>Professional Details:</strong></p>
        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<script src="../javascrip.js"></script>
</body>
</html>
