<?php
include_once 'Classes.php';
include_once 'teacher.php';
$connection = new DBConnector();
$conn = $connection->connect();

function getStudentResult($studentID){
    global $connection;
    $query = "SELECT * FROM exam WHERE studentID = ?;";
    return $connection->select($query,'i',array($studentID));
}

function displayStudentResult(){
    $result1 = getStudentResult($_SESSION['userId']);
    $students = array();

    if(!empty($result1)){
        echo "<table class=\"table table-bordered\">
            <thead>
            <tr>
                <th>Exam</th>
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
        foreach ($result1 as $value) {
            if (isset($students[$value["examID"]])) {
                $students[$value["examID"]] += [$value["subjectID"] => $value];
            } else {
                $students += [$value["examID"] => [$value["subjectID"] => $value]];
            }
        }
        foreach ($students as $key => $value) {
            $result2 = getExamDetails($key);
            $sum = 0;
            $count = 0;
            echo "<tr>" . "<td>" . $result2[0]['examDate'] . " " . $result2[0]['examType'] . " " . $result2[0]['term'] . "</td>";
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
                echo "BS: " . $value[110]['results'];
                $count++;
                $sum += $value[110]['results'];
            }
            if (isset($value[111])) {
                echo "A/D: " . $value[111]['results'];
                $count++;
                $sum += $value[111]['results'];
            }
            if (isset($value[112])) {
                echo "D/D: " . $value[112]['results'];
                $count++;
                $sum += $value[112]['results'];
            }
            if (isset($value[113])) {
                echo "Agric: " . $value[113]['results'];
                $count++;
                $sum += $value[113]['results'];
            }
            if (isset($value[114])) {
                echo "Music: " . $value[114]['results'];
                $count++;
                $sum += $value[114]['results'];
            }
            if (isset($value[115])) {
                echo "Comp: " . $value[115]['results'];
                $count++;
                $sum += $value[115]['results'];
            }
            if (isset($value[116])) {
                echo "French: " . $value[116]['results'];
                $count++;
                $sum += $value[116]['results'];
            }
            echo "</td>";
            $sum = number_format((float)($sum / $count), 4, '.', '');
            echo "<td>" . $sum . "</td>";
            echo "</tr>";
        }
        echo "</tbody>
            </table>";
    }
}

function displayParent(){
    $studentId = studentIdintity($_SESSION['userId']);
    foreach ($studentId as $val){
        $result1 = getStudentResult($val['studentID']);
        $students = array();
        if(!empty($result1)){
            echo "<br>".$val['studentID']." ".$val['firstName']." ".$val['lastName'];
            echo "<table class=\"table table-bordered\">
            <thead>
            <tr>
                <th>Exam</th>
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
            foreach ($result1 as $value) {
                if (isset($students[$value["examID"]])) {
                    $students[$value["examID"]] += [$value["subjectID"] => $value];
                } else {
                    $students += [$value["examID"] => [$value["subjectID"] => $value]];
                }
            }
            foreach ($students as $key => $value) {
                $result2 = getExamDetails($key);
                $sum = 0;
                $count = 0;
                echo "<tr>" . "<td>" . $result2[0]['examDate'] . " " . $result2[0]['examType'] . " " . $result2[0]['term'] . "</td>";
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
                    echo "BS: " . $value[110]['results'];
                    $count++;
                    $sum += $value[110]['results'];
                }
                if (isset($value[111])) {
                    echo "A/D: " . $value[111]['results'];
                    $count++;
                    $sum += $value[111]['results'];
                }
                if (isset($value[112])) {
                    echo "D/D: " . $value[112]['results'];
                    $count++;
                    $sum += $value[112]['results'];
                }
                if (isset($value[113])) {
                    echo "Agric: " . $value[113]['results'];
                    $count++;
                    $sum += $value[113]['results'];
                }
                if (isset($value[114])) {
                    echo "Music: " . $value[114]['results'];
                    $count++;
                    $sum += $value[114]['results'];
                }
                if (isset($value[115])) {
                    echo "Comp: " . $value[115]['results'];
                    $count++;
                    $sum += $value[115]['results'];
                }
                if (isset($value[116])) {
                    echo "French: " . $value[116]['results'];
                    $count++;
                    $sum += $value[116]['results'];
                }
                echo "</td>";
                $sum = number_format((float)($sum / $count), 4, '.', '');
                echo "<td>" . $sum . "</td>";
                echo "</tr>";
            }
            echo "</tbody>
            </table>";
        }
    }

}