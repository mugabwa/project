<?php
require_once '../../phpfile/teacher.php';
session_start();
if(empty($_SESSION)) header("Location: loginTeacher.php");
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
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
                <li class="sidebar-item"><a class="sidebar-link" href="home.php">Home</a></li>
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

            <?php
            echo sprintf("Welcome %s %s", $_SESSION['fname'], $_SESSION['lname']);
//            echo $_SESSION['fname'];

            ?>
            <div class="table-responsive">
                <form method="post" action="../../phpfile/teacher.php" id="my_form">
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
                        <?php
                        $result1=studentDetails($_SESSION['streamID']);
                        foreach ($result1 as $value){
                            echo "<tr>"."<td>".$value['studentID']."</td>";
                            echo "<td>".$value['firstName']."</td>";
                            echo "<td>".$value['lastName']."</td>";
                            echo "<td> <input type=\"text\" name=".$value['studentID']." form=\"my_form\"> </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <input type="submit" form="my_form" name="resultSubmit" value="SUBMIT">
                </form>

        </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<script src="../javascrip.js"></script>
</body>
</html>
