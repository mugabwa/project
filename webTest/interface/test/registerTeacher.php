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
                <input name="birth" type="date" placeholder="Date of Birth" class="mb-4 form-control" type="text" onfocus="(this.type='date')"
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
            <div class="form-row">
                <select name="classTaught" class="mb-4">
                    <option>1A</option>
                    <option>1D</option>
                    <option>1K</option>
                    <option>1L</option>
                    <option>1M</option>
                    <option>1N</option>
                    <option>1S</option>
                    <option>1T</option>
                    <option>2A</option>
                    <option>2D</option>
                    <option>2K</option>
                    <option>2L</option>
                    <option>2M</option>
                    <option>2N</option>
                    <option>2S</option>
                    <option>2T</option>
                    <option>3A</option>
                    <option>3D</option>
                    <option>3K</option>
                    <option>3L</option>
                    <option>3M</option>
                    <option>3N</option>
                    <option>3S</option>
                    <option>3T</option>
                    <option>4A</option>
                    <option>4D</option>
                    <option>4K</option>
                    <option>4L</option>
                    <option>4M</option>
                    <option>4N</option>
                    <option>4S</option>
                    <option>4T</option>
                </select>
                <select name="role" class="mb-4">
                    <option value="" disabled selected hidden>Select role played</option>
                    <option value="classTeacher">Class Teacher</option>
                    <option value="subjectTeacher">Subject Teacher</option>
                </select>
            </div>

            <br>
            <input class="btn" type="submit" name="regParent" value="Register">
        </form>
    </div>
<script src="../javascrip.js"></script>
</body>
</html>
