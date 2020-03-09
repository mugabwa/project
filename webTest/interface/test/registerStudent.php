<?php
//require_once '../../phpfile/teacher.php';
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
                        <th>Admission Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Date of Admission</th>
                        <th>Class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include "../../phpfile/Classes.php";
                    include "../../phpfile/teacher.php";
                    $student = new DBConnector();
                    $query = "SELECT * FROM student_info;";
                    $result=$student->select($query);
                    $arraySize = sizeof($result);

                    foreach ($result as $array){
                        if($array['Gender'] == 1){
                            $gender = 'male';
                        }else{
                            $gender = 'female';
                        }
                        $temp = getLevel($array['streamLinkID']);
                        echo "<tr>";
                        echo"<td>".$array['studentID']."</td>";
                        echo"<td>".$array['firstName']."</td>";
                        echo"<td>".$array['lastName']."</td>";
                        echo"<td>".$gender."</td>";
                        echo"<td>".$array['DoB']."</td>";
                        echo"<td>".$array['adminDate']."</td>";
                        echo"<td>".$temp[0].$temp[1]."</td>";
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
                <input style="margin-right: 10px;" name="DoB" placeholder="Date of Birth" class="mb-4 form-control" type="text" onfocus="(this.type='date')"
                        onmouseover="(this.type='date')" onmouseout="(this.type='text')">
                <input name="admindate" class="mb-4 form-control" placeholder="Date of Admission" type="text" onfocus="(this.type='date')"
                       onmouseover="(this.type='date')" onmouseout="(this.type='text')">
            </div>

            <br>
            <select name="gender" class="mb-4">
<!--                Male is represented by true while female with false-->
                <option value="" disabled selected hidden>Select the Gender</option>
                <option value="1" >Male</option>
                <option value="0" >Female</option>
            </select>

            <select name="class" class="mb-4">
<!--                The values represent the classes in the database-->
                <option value="" disabled selected hidden>Select the Class</option>
                <option value="500">A</option>
                <option value="501">D</option>
                <option value="502">K</option>
                <option value="503">L</option>
                <option value="504">M</option>
                <option value="505">N</option>
                <option value="506">S</option>
                <option value="507">T</option>
            </select>
            <br>
            <input class="btn" type="submit" name="regStudent" value="Register">
        </form>
    </div>
<script src="../javascrip.js"></script>
</body>
</html>
