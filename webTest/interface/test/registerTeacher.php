<?php
session_start();
if(empty($_SESSION)) header("Location: register.php");
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

</head>
<body>
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
    <div class="grid-container-nav-bottom">
        <div class="grid-container-left sidenav">
            <ul class="sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="registerStudent.php">Add Student</a></li><hr>
                <li class="sidebar-item"><a class="sidebar-link" href="registerTeacher.php">Add Teacher</a></li><hr>
                <li class="sidebar-item"><a class="sidebar-link" href="registerParent.php">Add Parent</a></li><hr>
            </ul>
        </div>
        <div class="grid-container-right">
            <div class="signupform">
                <button class="btn" id="newBtn">New</button>
                <table>
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Last Logged</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include "../../phpfile/Classes.php";
                    include "../../phpfile/teacher.php";
                    $teacher = new DBConnector();
                    $query = "SELECT firstName,lastName,username,gender,DoB,contacts,last_logged FROM teacher;";
                    $result=$teacher->select($query);
                    $arraySize = sizeof($result);

                    foreach ($result as $array){
                        if($array['gender'] == 1){
                            $gender = 'male';
                        }else{
                            $gender = 'female';
                        }
                        echo "<tr>";
                        echo"<td>".$array['firstName']."</td>";
                        echo"<td>".$array['lastName']."</td>";
                        echo"<td>".$array['username']."</td>";
                        echo"<td>".$gender."</td>";
                        echo"<td>".$array['contacts']."</td>";
                        echo"<td>".$array['last_logged']."</td>";
                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<div class="register reg-modal" id="studentModal">
        <div>
            <span class="close">&#215;</span>
        </div>
        <form action="../../phpfile/signup.php" method="post">
            <div class="form-row">
                <input style="margin-right: 10px;" type="text" name="fname" class="mb-4 form-control" placeholder="First Name">
                <input name="lname" class="mb-4 form-control" type="text" placeholder="Last Name">
            </div>
            <div class="form-row">
                <input style="margin-right: 10px;" name="uname" type="text" class="mb-4 form-control" placeholder="Username">
                <input name="pword" type="password" class="mb-4 form-control" placeholder="Password">
            </div>

            <div class="form-row">
                <input name="phone" type="tel" class="mb-4 form-control" placeholder="Phone Number" style="margin-right: 10px;">
                <input name="birth" placeholder="Date of Birth" class="mb-4 form-control" type="text" onfocus="(this.type='date')"
                       onmouseover="(this.type='date')" onmouseout="(this.type='text')">

            </div>
            <div class="form-row">
                <select name="gender" class="mb-4">
                    <!--                Male is represented by true while female with false-->
                    <option value="" disabled selected hidden>Select the Gender</option>
                    <option value="1" >Male</option>
                    <option value="0" >Female</option>
                </select>
                <select name="subject" class="mb-4">
                    <option value="" disabled selected hidden>Select a subject</option>
                    <option value="102">English</option>
                    <option value="103">Kiswahili</option>
                    <option value="101">Mathematics</option>
                    <option value="104">Biology</option>
                    <option value="106">Chemistry</option>
                    <option value="105">Physics</option>
                    <option value="107">History</option>
                    <option value="108">Geography</option>
                    <option value="109">CRE</option>
                    <option value="110">Business</option>
                    <option value="111">Art and Design</option>
                    <option value="112">Drawing and Design</option>
                    <option value="113">Agriculture</option>
                    <option value="114">Music</option>
                    <option value="115">Computer Studies</option>
                    <option value="116">French Language</option>
                </select>
            </div>
            <div class="multiselect">
                <div class="form-row">
                    <select class="mb-4" id="formSelector" onchange="showCheckboxes()">
                        <option>Select class taught</option>
                        <option value="f1">Form 1</option>
                        <option value="f2">Form 2</option>
                        <option value="f3">Form 3</option>
                        <option value="f4">Form 4</option>
                    </select>
                    <div class="overSelect"></div>
                </div>
                <div id="checkboxes1">
                    <label for="f1a"><input name="classTaught[]" value="700" type="checkbox" id="f1a">Form 1A</label>
                    <label for="f1d"><input name="classTaught[]" value="701" type="checkbox" id="f1d">Form 1D</label>
                    <label for="f1k"><input name="classTaught[]" value="702" type="checkbox" id="f1k">Form 1K</label>
                    <label for="f1l"><input name="classTaught[]" value="703" type="checkbox" id="f1l">Form 1L</label>
                    <label for="f1m"><input name="classTaught[]" value="704" type="checkbox" id="f1m">Form 1M</label>
                    <label for="f1n"><input name="classTaught[]" value="705" type="checkbox" id="f1n">Form 1N</label>
                    <label for="f1s"><input name="classTaught[]" value="706" type="checkbox" id="f1s">Form 1S</label>
                    <label for="f1t"><input name="classTaught[]" value="707" type="checkbox" id="f1t">Form 1T</label>
                </div>
                <div id="checkboxes2">
                    <label for="f2a"><input name="classTaught[]" value="708" type="checkbox" id="f2a">Form 2A</label>
                    <label for="f2d"><input name="classTaught[]" value="709" type="checkbox" id="f2d">Form 2D</label>
                    <label for="f2k"><input name="classTaught[]" value="710" type="checkbox" id="f2k">Form 2K</label>
                    <label for="f2l"><input name="classTaught[]" value="711" type="checkbox" id="f2l">Form 2L</label>
                    <label for="f2m"><input name="classTaught[]" value="712" type="checkbox" id="f2m">Form 2M</label>
                    <label for="f2n"><input name="classTaught[]" value="713" type="checkbox" id="f2n">Form 2N</label>
                    <label for="f2s"><input name="classTaught[]" value="714" type="checkbox" id="f2s">Form 2S</label>
                    <label for="f2t"><input name="classTaught[]" value="715" type="checkbox" id="f2t">Form 2T</label>
                </div>
                <div id="checkboxes3">
                    <label for="f3a"><input name="classTaught[]" value="716" type="checkbox" id="f3a">Form 3A</label>
                    <label for="f3d"><input name="classTaught[]" value="717" type="checkbox" id="f3d">Form 3D</label>
                    <label for="f3k"><input name="classTaught[]" value="718" type="checkbox" id="f3k">Form 3K</label>
                    <label for="f3l"><input name="classTaught[]" value="719" type="checkbox" id="f3l">Form 3L</label>
                    <label for="f3m"><input name="classTaught[]" value="720" type="checkbox" id="f3m">Form 3M</label>
                    <label for="f3n"><input name="classTaught[]" value="721" type="checkbox" id="f3n">Form 3N</label>
                    <label for="f3s"><input name="classTaught[]" value="722" type="checkbox" id="f3s">Form 3S</label>
                    <label for="f3t"><input name="classTaught[]" value="723" type="checkbox" id="f3t">Form 3T</label>
                </div>
                <div id="checkboxes4">
                    <label for="f4a"><input name="classTaught[]" value="724" type="checkbox" id="f4a">Form 4A</label>
                    <label for="f4d"><input name="classTaught[]" value="725" type="checkbox" id="f4d">Form 4D</label>
                    <label for="f4k"><input name="classTaught[]" value="726" type="checkbox" id="f4k">Form 4K</label>
                    <label for="f4l"><input name="classTaught[]" value="727" type="checkbox" id="f4l">Form 4L</label>
                    <label for="f4m"><input name="classTaught[]" value="728" type="checkbox" id="f4m">Form 4M</label>
                    <label for="f4n"><input name="classTaught[]" value="729" type="checkbox" id="f4n">Form 4N</label>
                    <label for="f4s"><input name="classTaught[]" value="730" type="checkbox" id="f4s">Form 4S</label>
                    <label for="f4t"><input name="classTaught[]" value="731" type="checkbox" id="f4t">Form 4T</label>
                </div>
            </div>

            <br>
            <input class="btn" type="submit" name="regTeacher" value="Register">
        </form>
    </div>
<script src="../javascrip.js"></script>
</body>
</html>
