<?php
require_once '../../phpfile/teacher.php';
session_start();
if(empty($_SESSION)) header("Location: loginTeacher.php");
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
                        <li><a href="#"><img src="../resources/images/phoenix0.png" id="logo"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="grid-container-nav-top-menu">
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a> </li>
                        <li><form method="post" action="../../phpfile/signup.php">
                                <button class="btn" name="logout">Logout</button>
                            </form></li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
    <div class="grid-container-nav-bottom">
        <div class="grid-container-left sidenav">
            <ul class="sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="#">Home</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element1</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element2</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element3</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element4</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element5</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element6</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#">element7</a></li>
            </ul>
        </div>
        <div class="grid-container-right">
            <div class="detailform1">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Form: </td>
                            <td>Class: </td>
                            <td>Subject: </td>
                            <td>Teacher: <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></td>
                        </tr>
                        <tr>
                            <td>Exam type: </td>
                            <td>Exam name: </td>
                            <td>Term: </td>
                            <td>Exam date: </td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <form method="post" action="#" id="my_form"></form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Admission Number</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>57734gdi</td>
                            <td>Allan</td>
                            <td>Siema</td>
                            <td>
                                <input type="text" name="mark" form="my_form">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" form="my_form" name="submit" value="SUBMIT">
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<script src="../javascrip.js"></script>
</body>
</html>
