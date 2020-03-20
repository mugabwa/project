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
                        <li><a href="#"><img src="../resources/images/phoenix0.png" id="logo"></a></li>
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
                        <li><a href="login1.php">Login</a> </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Signup</button>
                                <div class="dropdown-content">
                                    <a href="registerStudent.php">Student</a>
                                    <a href="parentSignup.html">Parent</a>
                                    <a href="teacherSignup.html">Teacher</a>
                                </div>
                            </div>
                        </li>
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
                <!--register form-->
                <form class="text-center border border-light p-5" onsubmit= "return validateRegistration()" action="../../phpfile/signup.php" method="post">

                    <p class="h4 mb-4">Add an Admin</p>
                    <hr>
                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="FirstName" name="fname" class="form-control" placeholder="First name">
                            <div class="error" id="error-fn"></div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="LastName" name="lname" class="form-control" placeholder="Last name">
                            <div class="error" id="error-ln"></div>
                        </div>
                    </div>
                    <div class="form-control1">
                        <!-- Username -->
                        <input type="text" id="username" name="uname" class="form-control mb-4" placeholder="Username">
                        <div class="error" id="error-usr"></div>

                        <!-- Password -->
                        <input type="password" id="FormPassword" name="pword" class="form-control mb-4" placeholder="Password" aria-describedby="FormPasswordHelpBlock">
                       <div class="error" id="error-pswd"></div>
                        <!--                        <small id="FormPasswordHelpBlock" class="form-text text-muted mb-4">-->
                        <!--                            At least 8 characters and 1 digit-->
                        <!--                        </small>-->
                        <br>
                        <select class="mb-4" id="gender" name="sex" id="formGender">
                            <option value="" disabled selected hidden>Select Your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>
                        <div class="error" id="error-gnd"></div>
                        <input class="form-control mb-4" id="DoB" name="birth" type="date">
                        <div class="error" id="error-birth"></div>
                        <!-- Role Played -->
                        <input type="text" name="role" id="rolePlayed" class="form-control mb-4" placeholder="Role played" aria-describedby="FormPhoneHelpBlock">
                        <br>
                        <div class="error" id="error-rol"></div>
                        <button class="btn my-4" type="submit" name="regAdmin">Send</button>
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
