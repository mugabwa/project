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
    <script src="../response.js"></script>

</head>
<body>
<div class="grid-container">
    <div class="grid-container-nav-top">
        <div class="grid-container-nav-top-logo">
            <div class="menu1">
                <nav>
                    <ul>
                        <li><a href="#"><img src="../resources/images/phoenix0.png" id="logo" alt="logo"></a></li>
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
            <div class="detailform">
                <form method="post" action="../../phpfile/teacher.php" onsubmit="return validateExamDetails()">
                    <div class="form-row1-container">
                        <div class="form-row1">
                            <label for="myLevel" style="margin-top: 10px;">Level:</label>
                            <select name="level" id="myLevel">
                                <option value="" disabled selected hidden>Select a stream</option>
                                <option value="200" data-id="Form 1">Form 1</option>
                                <option data-id="Form 2" value="201">Form 2</option>
                                <option value="203" data-id="Form 3">Form 3</option>
                                <option value="204" data-id="Form 4">Form 4</option>
                            </select>
                            <small class="error" id="levelErr"></small>
                            <label for="myclass" style="margin-top: 10px;">Class:</label>
                            <select id="myclass" name="stream">
                                <option value="" disabled selected hidden>Select a class</option>
                                <option value="500" data-id="A">A</option>
                                <option value="501" data-id="D">D</option>
                                <option value="502" data-id="K">K</option>
                                <option value="503" data-id="L">L</option>
                                <option value="504" data-id="M">M</option>
                                <option value="505" data-id="N">N</option>
                                <option value="506" data-id="S">S</option>
                                <option value="507" data-id="T">T</option>
                            </select>
                            <small class="error" id="myclassErr"></small>
                            <label for="mySubject" style="margin-top: 10px;">Subjects:</label>
                            <select id="mySubject" name="subject">
                                <option value="" disabled selected hidden>Select a subject</option>
                                <option value="102" data-id="English">English</option>
                                <option value="103" data-id="Kiswahili">Kiswahili</option>
                                <option value="101" data-id="Mathematics">Mathematics</option>
                                <option value="104" data-id="Biology">Biology</option>
                                <option value="106" data-id="Chemistry">Chemistry</option>
                                <option value="105" data-id="Physics">Physics</option>
                                <option value="107" data-id="History">History</option>
                                <option value="108" data-id="Geography">Geography</option>
                                <option value="109" data-id="CRE">CRE</option>
                                <option value="110" data-id="Business">Business</option>
                                <option value="111" data-id="Art and Design">Art and Design</option>
                                <option value="112" data-id="Drawing and Design">Drawing and Design</option>
                                <option value="113" data-id="Agriculture">Agriculture</option>
                                <option value="114" data-id="Music">Music</option>
                                <option value="115" data-id="Computer Studies">Computer Studies</option>
                                <option value="116" data-id="French Language">French Language</option>n>
                            </select>
                            <small class="error" id="subjectErr"></small>
                        </div>
                        <div class="form-row1">
                            <!--                        <div class="col">-->
                            <label for="term" style="margin-top: 10px;">Term:</label>
                            <select name="termdate" id="term">
                                <option value="" disabled selected hidden>Select the term</option>
                                <option value="1" data-id="I">I</option>
                                <option value="2" data-id="II">II</option>
                                <option value="3" data-id="III">III</option>
                            </select>
                            <small class="error" id="termErr"></small>
                            <!--                        </div>-->

                            <label for="exam_type" style="margin-top: 10px;">Exam type:</label>
                            <select name="examtype" id="exam_type">
                                <option value="" disabled selected hidden>Select exam type</option>
                                <option value="Entry">Entry</option>
                                <option value="Midterm">Midterm</option>
                                <option value="End term">End term</option>
                            </select>
                            <small class="error" id="typeErr"></small>
                            <label for="examdate" style="margin-top: 10px;">Exam date:</label>
                            <input type="date" name="date_exam" id="examdate">
                            <small class="error" id="dateErr"></small>
                        </div>
                    </div>
                    <br>
                    <div class="btn101">
                        <button class="btn btn-primary" type="submit" name="examSubmit">Submit</button>
                        <button class="btn btn-primary" type="reset" name="resetbtn">Clear</button>
                    </div>
                </form>


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
