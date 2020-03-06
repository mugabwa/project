<?php
if(!session_start()){
    session_start();
    if(!empty($_SESSION["userId"])){
        header("Location: registerStudent");
    }else{
        require_once __DIR__."/login1.php";
    }
}

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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Login</button>
                                <div class="dropdown-content">
                                    <a href="login1.php">Student</a>
                                    <a href="loginParent.php">Parent</a>
                                    <a href="loginTeacher.php">Teacher</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Signup</button>
                                <div class="dropdown-content">
                                    <a href="studentSignup.html">Student</a>
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
    <div class="grid-container-nav-bottom2">
        <div class="loginForm">
            <span>Teacher Login</span>
            <hr>
            <?php
            if(isset($_SESSION["errorMessage"])) {
                ?>
                <div class="error-message">
                    <?php
                    echo $_SESSION["errorMessage"];
                    ?>
                </div>
                <?php
                unset($_SESSION["errorMessage"]);
            }
            ?>
            <form method="post" action="../../phpfile/signup.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="uname" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="passwd">Password</label>
                    <input type="password" name="pass" id="passwd" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="teacherLogin" value="SUBMIT">
                </div>
            </form>

            <a href="#">Forgot password?</a>
            <br>
            <a href="#">Don't have an account?</a>
        </div>


    </div>
    <div class="grid-container-footer">
        <p id="dateView"></p>
    </div>
</div>
<script src="../javascrip.js"></script>
</body>
</html>
