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
    <script src="../javascrip.js"></script>

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
            <button onclick="document.getElementById('teacherModal').style.display='block'">Edit</button>
            <hr>

        </div>
        <div class="grid-container-right profile-text">

            <?php
//            echo sprintf("Welcome %s %s", $_SESSION['fname'], $_SESSION['lname'])."<br>";
//            echo $mydetails['firstName'];
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
            <button>Edit</button>
        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>

<div class="form-content prof-modal" id="teacherModal">
    <form class="profile-form validate-form" method="post" action="../../phpfile/teacher.php">
        <div style="display: flex">
            <span class="profile-form-title">Details</span>
            <span class="close1" onclick="document.getElementById('teacherModal').style.display='none'">&#215;</span>
        </div>
        <div class="form-col">
            <div class="form-input validate-input" style="margin-right: 20px;" data-validate="Name is required">
                <span class="label-input">First Name</span>
                <input class="input100" type="text" name="fname" placeholder="<?php echo $mydetails['firstName']; ?>">
                <span class="focus-input"></span>
            </div>
            <div class="form-input validate-input" data-validate="Name is required">
                <span class="label-input">Last Name</span>
                <input class="input100" type="text" name="lname" placeholder="<?php echo $mydetails['lastName']; ?>">
                <span class="focus-input"></span>
            </div>
        </div>
        <div class="form-col">
            <div class="form-input validate-input" style="margin-right: 20px;" data-validate="Name is required">
                <span class="label-input">Username</span>
                <input class="input100" type="text" name="uname" placeholder="<?php echo $mydetails['username']; ?>">
                <span class="focus-input"></span>
            </div>
            <div class="form-input validate-input" data-validate="Date of birth is required">
                <span class="label-input">Date of Birth</span>
                <input class="input100" type="date" name="birthDate" placeholder="DoB..">
                <span class="focus-input"></span>
            </div>
        </div>
        <div class="form-col">
            <div class="form-input validate-input" style="margin-right: 20px;" data-validate="Gender is required">
                <span class="label-input">Gender</span>
                <select name="gender">
                    <option value="" disabled selected hidden>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-input validate-input" data-validate="Phone is required">
                <span class="label-input">Phone</span>
                <input class="input100" type="text" name="phone" placeholder="<?php echo $mydetails['contacts']; ?>">
                <span class="focus-input"></span>
            </div>
        </div>

        <div class="profile-btn">
            <div class="form-content-btn">
                <div class="profile-bgbtn">
                    <button class="form-btn1" type="submit" name="profileChange">Send</button>
                </div>
            </div>
        </div>

    </form>
</div>

<script src="../javascrip.js"></script>
</body>
</html>
