<?php
include '../config.php';
session_start();

//Page Redirect
$usermail = "";
$usermail = $_SESSION['usermail'];
if($usermail == true){

}else{
    header("Location : http://localhost/Project/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="x-icon" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="../css/flash.css">
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>BlissFul-Admin Portel</title>

</head>
<body>
    <!--For Mobile View-->
    <div id="mobileview">
        <h5>Admin Portel Doesn't Work in Mobile View!</h5>
    </div>

    <!--Upper Nav Bar-->
    <nav class="uppernav">
        <div class="logo">
            <img class="blissfullogo" src="../img/logo.png" alt="logo">
            <p>Hotel BlissFul</p>
        </div>

        <div class="logout">
        <a href="../logout.php"><button class="btn btn-primary">Logout</button></a>
        </div>
    </nav>

    <!--Side Nav Bar-->
    <nav class="side-nav">
        <ul>
            <li class="pagebtn active"><img src="../img/image/icon/dashboard.png">&nbsp&nbsp&nbsp Dashboard</li>
            <li class="pagebtn"><img src="../img/image/icon/bed.png">&nbsp&nbsp&nbsp Room Booking</li>
            <li class="pagebtn"><img src="../img/image/icon/wallet.png">&nbsp&nbsp&nbsp Payment</li>
            <li class="pagebtn"><img src="../img/image/icon/bedroom.png">&nbsp&nbsp&nbsp Rooms</li>
            <li class="pagebtn"><img src="../img/image/icon/staff.png">&nbsp&nbsp&nbsp Staff</li>
        </ul>
    </nav>

    <!--Main Section-->
    <div class="mainscreen">
        <iframe class="frames frame1 active" src="./dashboard.php" frameborder="0"></iframe>
        <iframe class="frames frame2" src="./roombook.php" frameborder="0"></iframe>
        <iframe class="frames frame3" src="./payment.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./room.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./staff.php" frameborder="0"></iframe>
    </div>
</body>

<script src="./javascript/script.js"></script>

</html>