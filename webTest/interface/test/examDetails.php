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
                <form method="post" action="../../phpfile/teacher.php">
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="myLevel">Level:</label>
                            <select name="level" id="myLevel">
                                <option value="" disabled selected hidden>Select a stream</option>
                                <option value="1">Form 1</option>
                                <option value="2">Form 2</option>
                                <option value="3">Form 3</option>
                                <option value="4">Form 4</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="myclass">Class:</label>
                            <select id="myclass" name="stream">
                                <option value="" disabled selected hidden>Select a class</option>
                                <option value="A">A</option>
                                <option value="D">D</option>
                                <option value="K">K</option>
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="S">S</option>
                                <option value="T">T</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label for="mySubject">Subjects:</label>
                            <select id="mySubject" name="subject">
                                <option value="" disabled selected hidden>Select a subject</option>
                                <option value="eng">English</option>
                                <option value="kisw">Kiswahili</option>
                                <option value="math">Mathematics</option>
                                <option value="bio">Biology</option>
                                <option value="chem">Chemistry</option>
                                <option value="phys">Physics</option>
                                <option value="histo">History</option>
                                <option value="geo">Geography</option>
                                <option value="cre">CRE</option>
                                <option value="buss">Business</option>
                                <option value="a/d">Art and Design</option>
                                <option value="d/d">Drawing and Design</option>
                                <option value="agrics">Agriculture</option>
                                <option value="music">Music</option>
                                <option value="comps">Computer Studies</option>
                                <option value="french">French Language</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="term">Term:</label>
                            <select name="termdate" id="term">
                                <option value="" disabled selected hidden>Select the term</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                            </select>
                        </div>


                    </div>
                    <div class="form-row mb-4">
                        <div>
                            <label for="exam_name">Exam name:</label>
                            <input type="text" name="exname" id="exam_name" placeholder="Enter exam name">
                        </div>
                        <div>
                            <label for="exam_type">Exam type:</label>
                            <select name="examtype" id="exam_type">
                                <option value="" disabled selected hidden>Select exam type</option>
                                <option value="Entry">Entry</option>
                                <option value="Midterm">Midterm</option>
                                <option value="End term">End term</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div>
                            <label for="examdate">Exam date:</label>
                            <input type="date" name="date_exam" id="examdate">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="examSubmit">Submit</button>
                    <button class="btn btn-primary" type="reset" name="resetbtn">Clear</button>
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
