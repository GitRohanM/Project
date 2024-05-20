<?php

include 'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="./img/logo.png">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/flash.css">
    
    <title>Hotel BlissFul</title>
</head>
<body>
    <!--Carousel Section-->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./img/image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/image/hotel2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/image/hotel3.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/image/hotel4.jpg">
            </div>
        </div>
    </section>

    <!--Main Section-->
    <section id="auth_section">
        <div class="head">
            <img src="./img/logo.png" alt="logo" class="hotellogo">
            <p>HOTEL BLISSFUL</p>
        </div>
    
        <div class="auth_container">
            <!--Login Section-->
            <div id="login">
                <h2>Log In</h2>
                <!--Buttons Menu for User and Staff-->
                <div class="role_btn">
                    <div class="btns active">User</div>
                    <div class="btns">Staff</div>
                </div>
                <!--user login-->
                    <?php
                    if(isset($_POST["user_login_submit"])) {
                        $Username = $_POST["Username"] ;
                        $Email = $_POST["email"];
                        $Password = $_POST["password"];

                        $sql = "SELECT * FROM `signup` WHERE Email = '$Email' AND Username = '$Username' AND Password =  BINARY'$Password'";
                        $result = mysqli_query($conn, $sql);

                        if($result->num_rows > 0){
                            $SESSION["usermail"] = $Email;
                            $Email = "";
                            $Password = "";
                            header("Location: home.php");
                        }
                        else {
                            echo "<script> swal({
                                title: 'Enter the Correct Details!',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }
                    ?>
                <form class="user_login authsection active" id="userlogin" action="" method="POST">

                    <!--Input from the user to login-->
                    <div class="form-floating">
                        <input name="Username" class="form-control" type="text" placeholder=" " required>
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input name="email" class="form-control" type="text" placeholder=" " required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input name="password" class="form-control" type="password"   placeholder=" ">
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" name="user_login_submit" class="auth_btn" >Log in</button>
                    
                    <div class="footer_line">
                        <h6>Don't have an account? <span class="page-move-btn" onclick="signuppage()">Sign Up</span> </h6>
                    </div>
                </form>
                    
                <!--emp login-->
                <?php
                    if(isset($_POST["employee_login_submit"])) {
                    
                        $Email = $_POST['emp_email'];
                        $Password = $_POST['emp_password'];

                        $sql = "SELECT * FROM `emp_login` WHERE emp_email = '$Email' AND emp_password = BINARY '$Password'";
                        $result = mysqli_query($conn, $sql);

                        if($result->num_rows > 0){
                            $_SESSION['usermail'] = $Email;
                            $Email = "";
                            $Password = "";
                            header("Location: admin/admin.php");
                            
                        }
                        else {
                            echo "<script> swal({
                                title: 'Enter the Correct Details!',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }
                ?>

                <form class="employee_login authsection" id="employeelogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="emp_email" placeholder="" required>
                        <label for="emp_email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="emp_password" placeholder=" ">
                        <label for="emp_password">Password</label>
                    </div>
                    
                    <button type="submit" name="employee_login_submit" class="auth_btn" >Log in</button>
                    
                </form>
            </div>

            <!--Signup Section-->
            <?php
            if(isset($_POST["user_signup_submit"])) {
                $Fname = $_POST["First"];
                $Sname = $_POST["Second"];
                $Username = $_POST["Username"];
                $Email = $_POST["Email"];
                $Password = $_POST["Password"];
                $CPassword = $_POST["CPassword"];
                $Phone = $_POST["Phone"];

                if($Fname == "" || $Sname == "" || $Username == "" || $Email == "" || $Password == "" || $CPassword == "" || $Phone == "") {
                    echo "<script>swal ({
                    title: 'Fill the Details Properly',
                    icon: 'error'
                    });
                    </script>";
                }
                else{
                    if($Password == $CPassword) {
                        $sql = "SELECT * FROM `signup` WHERE Email = '$Email'";
                        $result = mysqli_query($conn, $sql);

                        if($result->num_rows > 0){
                            echo "<script>swal({
                                title: 'Email already exists',
                                icon: 'error',
                                )};
                                </script>";
                        }
                        else{
                            $sql = "INSERT INTO `signup` (`Fname`, `Sname`, `Username`, `Email`, `Password`, `Phone`) VALUES ('$Fname', '$Sname', '$Username', '$Email', '$Password', '$Phone')";
                            $result = mysqli_query($conn, $sql);

                            if($result) {
                                $SESSION["usermail"] = $Email;
                                $Fname = "";
                                $Sname = "";
                                $Username = "";
                                $Email = "";
                                $Password = "";
                                $CPassword = "";
                                $Phone = "";
                                header("Location: home.php");
                                
                            }
                            else{
                                echo "<script>swal({
                                    title: 'Something went wrong!!',
                                    icon: 'error',
                                    )};
                                    </script>";
                            }
                        }
                    }
                    else{
                        echo "<script>swal({
                        title: 'Password Doesn't Matched',
                        icon: 'error';
                        }); 
                        </script>";
                    }
                }
            }
            ?>
            <div id="sign_up">
                <h2>Sign Up</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="First" placeholder="" required>
                        <label for="First">First Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Second" placeholder=" " required>
                        <label for="Second">Second Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" " required>
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" placeholder=" " required>
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" " required>
                        <label for="Password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="CPassword" placeholder=" " required>
                        <label for="CPassword">Confirm Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" name="Phone" placeholder=" " maxlength="10" required>
                        <label for="Phone">Phone Number</label>
                    </div>
                    <button type="submit" name="user_signup_submit" class="auth_btn">Sign up</button>

                    <div class="footer_line">
                        <h6>Already have an account? <span class="page-move-btn" onclick='loginpage()'>Log In</span></h6>
                    </div>
                </form>

            </div>
    </section>
</body>

<!--Javascript-->
    <script src="./javascript/index.js"></script>

<!--Bootstrap CDN-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>