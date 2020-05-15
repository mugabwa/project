<?php
require_once '../../phpfile/teacher.php';
include "headerFile.php";
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
                        <li><a href="examDetails.php">Enter Results</a> </li>
                        <li><form method="post" action="../../phpfile/signup.php">
                            <button class="btn" name="logout">Logout</button>
                            </form></li>
                        </form>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
    <div class="grid-container-nav-bottom2" style="justify-content: normal; scroll-behavior: smooth; overflow: auto;">

            <?php
            echo sprintf("Welcome %s %s", $_SESSION['fname'], $_SESSION['lname']);
//            echo $_SESSION['fname'];

            ?>
            <div class="table-responsive">

                    <?php
                    $examInfo = examInfo();
                    foreach ($examInfo as $v) {
                        echo $v['examType'] . " Exam" . " Term: " . $v['term']." ".$v['examDate'];

                        echo "
                <table class=\"table table-bordered\" id='attendance_table'>
                <thead style='background: #9fcdff'>
                    <tr>
                        <th>Reg No.</th>
                        <th>Math</th>
                        <th>Eng</th>
                        <th>Kisw</th>
                        <th>Bio</th>
                        <th>Phyc</th>
                        <th>Chem</th>
                        <th>Histo</th>
                        <th>Geo</th>
                        <th>CRE</th>
                        <th>Technical</th>
                        <th>Mean</th>
                    </tr>
                    </thead>
                    <tbody>";
                        $result1 = getResults($v['examID']);
                        $students = array();
                        foreach ($result1 as $value) {
                            if (isset($students[$value["studentID"]])) {
                                $students[$value["studentID"]] += [$value["subjectID"] => $value];
                            } else {
                                $students += [$value["studentID"] => [$value["subjectID"] => $value]];
                            }
                        }

                        foreach ($students as $key => $value) {
                            $sum = 0;
                            $count = 0;
                            echo "<tr>" . "<td>" . $key . "</td>";
                            echo "<td>";
                            if (isset($value[101])) {
                                echo $value[101]["results"];
                                $count++;
                                $sum += $value[101]["results"];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[102])) {
                                echo $value[102]["results"];;
                                $count++;
                                $sum += $value[102]["results"];;
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[103])) {
                                echo $value[103]["results"];;
                                $count++;
                                $sum += $value[103]["results"];;
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[104])) {
                                echo $value[104]["results"];
                                $count++;
                                $sum += $value[104]["results"];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[105])) {
                                echo $value[105]["results"];
                                $count++;
                                $sum += $value[105]['results'];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[106])) {
                                echo $value[106]['results'];
                                $count++;
                                $sum += $value[106]['results'];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[107])) {
                                echo $value[107]['results'];
                                $count++;
                                $sum += $value[107]['results'];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[108])) {
                                echo $value[108]['results'];
                                $count++;
                                $sum += $value[108]['results'];
                            }
                            echo "</td>";
                            echo "<td>";
                            if (isset($value[109])) {
                                echo $value[109]['results'];
                                $count++;
                                $sum += $value[109]['results'];
                            }
                            echo "</td>";
                            echo "<td>";

                            if (isset($value[110])) {
                                echo "BS: ".$value[110]['results'];
                                $count++;
                                $sum += $value[110]['results'];
                            }
                            if (isset($value[111])) {
                                echo "A/D: ".$value[111]['results'];
                                $count++;
                                $sum += $value[111]['results'];
                            }
                            if (isset($value[112])) {
                                echo "D/D: ".$value[112]['results'];
                                $count++;
                                $sum += $value[112]['results'];
                            }
                            if (isset($value[113])) {
                                echo "Agric: ".$value[113]['results'];
                                $count++;
                                $sum += $value[113]['results'];
                            }
                            if (isset($value[114])) {
                                echo "Music: ".$value[114]['results'];
                                $count++;
                                $sum += $value[114]['results'];
                            }
                            if (isset($value[115])) {
                                echo "Comp: ".$value[115]['results'];
                                $count++;
                                $sum += $value[115]['results'];
                            }
                            if (isset($value[116])) {
                                echo "French: ".$value[116]['results'];
                                $count++;
                                $sum += $value[116]['results'];
                            }
                            echo "</td>";
                            $sum = number_format((float)($sum / $count), 4, '.', '');
                            echo "<td>" . $sum . "</td>";
                            echo "</tr>";
                            }
                        echo "</tbody> </table>";
                    }
                    ?>

            </div>
    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<script src="../javascrip.js"></script>
</body>
</html>
