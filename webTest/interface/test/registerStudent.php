
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
                        list($year,$month,$day) = explode("-",$array['adminDate']);
                        $date = strtotime($year . "-" . $month . "-" . $day);
                        if(date('Y',$date) == 2020){
                            $current = 1;
                        }elseif (date('Y',$date) == 2019){
                            $current = 2;
                        }elseif (date('Y',$date) == 2018){
                            $current = 3;
                        }elseif (date('Y',$date) == 2017){
                            $current = 4;
                        }else{
                            $current = date('Y',$date);
                        }
                        echo "<tr>";
                        echo"<td>".$array['studentID']."</td>";
                        echo"<td>".$array['firstName']."</td>";
                        echo"<td>".$array['lastName']."</td>";
                        echo"<td>".$gender."</td>";
                        echo"<td>".$array['DoB']."</td>";
                        echo"<td>".$array['adminDate']."</td>";
                        echo"<td>".$current."</td>";
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
        <form action="">
            <input name="fname" class="mb-4 form-control" placeholder="First Name">
            <br>
            <input name="lname" class="mb-4 form-control" placeholder="Last Name">
            <br>
            <input name="DoB" placeholder="Date of Birth" class="mb-4 form-control">
            <br>
            <input name="admindate" class="mb-4 form-control" placeholder="Date of Admission">
            <br>
            <select name="gender" class="mb-4">
                <option value="" disabled selected hidden>Select the Gender</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <select name="class" class="mb-4">
                <option value="" disabled selected hidden>Select the Class</option>
                <option>A</option>
                <option>D</option>
                <option>K</option>
                <option>L</option>
                <option>M</option>
                <option>S</option>
                <option>T</option>
            </select>
            <br>
            <input class="btn" type="submit" value="Register">
        </form>
    </div>
<script src="../javascrip.js"></script>
</body>
</html>
