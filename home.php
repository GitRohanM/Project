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
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./admin/css/roombook.css">

    <title>Hotel BlissFul</title>
    <style>
      #guestdetailpanel{
        display: none;
      }
      #guestdetailpanel .middle{
        height: 450px;
      }
    </style>
</head>
<body>
  <!--Menu-->
    <nav>
        <div class="logo">
            <img src="./img/logo.png" alt="logo" class="bllissfullogo">
            <p>Hotel BlissFul<p>
        </div>
        
        <ul>
          <li><a href="#firstsection">Home</a></li>
          <li><a href="#secondsection">Rooms</a></li>
          <li><a href="#thirdsection">Facilities</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
        </ul>
    </nav>

    <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="carousel-image" src="./img/image/hotel1.jpg" >
            </div>
            <div class="carousel-item">
              <img class="carousel-image" src="./img/image/hotel2.jpg" >
            </div>
            <div class="carousel-item">
              <img class="carousel-image" src="./img/image/hotel3.jpg" >
            </div>
            <div class="carousel-item">
              <img class="carousel-image" src="./img/image/hotel4.jpg" >
            </div>

            <!--Caption-->
            <div class="welcomeline">
              <h1 class="welcometag">Welcome to your Slice of Paradise</h1>
            </div>
            <!--Booking-->
            <div id="guestdetailpanel">
              <form action="" method="POST" class="guestdetailpanelform">
                <!--Form Heading-->
                <div class="head">
                  <h3>RESERVATION</h3>
                  <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
                </div>
                <div class="middle">
                  <div class="guestinfo">
                    <h4>Guest Information</h4>
                    <input type="text" name="Name" placeholder="Enter your full name">
                    <input type="email" name="Email" placeholder="Enter your email">

                    <?php
                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                    ?>

                    <select name="Country" class="selectinput">
						          <option value selected >Select your country</option>
                        <?php
							          foreach($countries as $key => $value):
							          echo '<option value="'.$value.'">'.$value.'</option>';
                            //close your tags!!
							          endforeach;
						            ?>
                    </select>
                    <input type="text" name="Phone" placeholder="Enter your Phone No.">
                  </div>
                  <!--Divide Line-->
                  <div class="line"></div>
                  
                  <div class="reservationinfo">
                    <h4>Reservation Information</h4>
                    <!--FirstField-->
                    <select name="RoomType" class="selectinput">
                    <option value selected>Room Type</option>
                        <option value="Superior Room">SUPERIOR ROOM</option>
                        <option value="Deluxe Room">DELUXE ROOM</option>
                        <option value="Standard Room">STANDARD ROOM</option>
                        <option value="Family Room">FAMILY ROOM</option>
                    </select>
                    <!--SecondField-->
                    <select name="Bed" class="selectinput">
                      <option value selected>Bed Type</option>
                        <option value="Single">SINGLE</option>
                        <option value="Double">DOUBLE</option>
                        <option value="Triple">TRIPLE</option>
                        <option value="Quad">QUAD</option>
                    </select>
                    <!--ThirdField-->
                    <select name="NoofRoom" class="selectinput">
                      <option value selected>No. of Room</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <!--FourthField-->
                    <select name="Meal" class="selectinput">
                    <option value selected>Meal</option>
                        <option value="Full-Board">Full-Board</option>
                        <option value="Half-Board">Half-Board</option>
                    </select>
                    <!--FifthField-->
                    <div class="datesection">
                        <span>
                            <label for="cin"> Check-In</label>
                            <input name="cin" type ="date">
                        </span>
                        <span>
                            <label for="cin"> Check-Out</label>
                            <input name="cout" type ="date">
                        </span>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
                </div>
              </form>
            <!-- ==== room book php ====-->
        <?php       
            if (isset($_POST['guestdetailsubmit'])) {
                $Name = $_POST['Name'];
                $Email = $_POST['Email'];
                $Country = $_POST['Country'];
                $Phone = $_POST['Phone'];
                $RoomType = $_POST['RoomType'];
                $Bed = $_POST['Bed'];
                $NoofRoom = $_POST['NoofRoom'];
                $Meal = $_POST['Meal'];
                $cin = $_POST['cin'];
                $cout = $_POST['cout'];

                if($Name == "" || $Email == "" || $Country == ""){
                    echo "<script>swal({
                        title: 'Fill the proper details',
                        icon: 'error',
                    });
                    </script>";
                }
                else{
                    $sta = "NotConfirm";
                    $sql = "INSERT INTO roombook(Name,Email,Country,Phone,RoomType,Bed,NoofRoom,Meal,cin,cout,stat,nodays) VALUES ('$Name','$Email','$Country','$Phone','$RoomType','$Bed','$NoofRoom','$Meal','$cin','$cout','$sta',datediff('$cout','$cin'))";
                    $result = mysqli_query($conn, $sql);

                    
                        if ($result) {
                            echo "<script>swal({
                                title: 'Reservation successful',
                                icon: 'success',
                            });
                        </script>";
                        } else {
                            echo "<script>swal({
                                    title: 'Something went wrong',
                                    icon: 'error',
                                });
                        </script>";
                        }
                }
            }
            ?>
          </div>

        </div>
    </section>

    <section id="secondsection">
      <img src="./img/image/homeanimatebg.svg">
      <div class="room">
        <h1 class="head">≼ Explore Our Accommodations ≽</h1>
        <div class="roomselect">
          <!--First-->
          <div class="roombox">
            <div class="hotelphoto h1"></div>
              <div class="roomdata">
                <h2>Superior Room</h2>
                  <div class="services">
                  <i class="fa-solid fa-wifi"></i>
                  <i class="fa-solid fa-burger"></i>
                  <i class="fa-solid fa-spa"></i>
                  <i class="fa-solid fa-dumbbell"></i>
                  <i class="fa-solid fa-person-swimming"></i>
                </div>
                <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
              </div>
            </div>
            <!--Second-->
            <div class="roombox">
              <div class="hotelphoto h2"></div>
                <div class="roomdata">
                  <h2>Deluxe Room</h2>
                  <div class="services">
                    <i class="fa-solid fa-wifi"></i>
                    <i class="fa-solid fa-burger"></i>
                    <i class="fa-solid fa-spa"></i>
                    <i class="fa-solid fa-dumbbell"></i>
                  </div>
                  <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
                </div>
              </div>
            
            <!--Third-->
            <div class="roombox">
              <div class="hotelphoto h3"></div>
                <div class="roomdata">
                  <h2>Standard Room</h2>
                  <div class="services">
                    <i class="fa-solid fa-wifi"></i>
                    <i class="fa-solid fa-burger"></i>
                  </div>
                  <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
                </div>
              </div>
              <!--Fourth-->
              <div class="roombox">
                <div class="hotelphoto h4"></div>
                  <div class="roomdata">
                    <h2>Family Room</h2>
                    <div class="services">
                      <i class="fa-solid fa-wifi"></i>
                      <i class="fa-solid fa-burger"></i>
                      <i class="fa-solid fa-spa"></i>
                    </div>
                    <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
                  </div>
                </div>
              </div>
      </div>
    </section>

    <section id="thirdsection">
      <h1 class="head">≼ Discover Our Hotel Features ≽</h1>
      <div class="facility">
        <div class="box">
          <h2>Swimming Pool</h2>
        </div>
        <div class="box">
          <h2>Spa</h2>
        </div>
        <div class="box">
          <h2>24*7 Restaurants</h2>
        </div>
        <div class="box">
          <h2>24*7 Gym</h2>
        </div>
        <div class="box">
          <h2>Heli Service</h2>
        </div>
      </div>
    </section>
    
        <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <img src="./img/image/homeanimatebg.svg" alt="Background" class="contact-background">
        <div class="contact-container">
            <h2>Contact Us</h2>
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
            <div id="confirmationMessage" class="confirmation-message"></div>
        </div>
    </section>
    

    <script src="script.js"></script>
</body>
</html>
    
    <section id="contactus">
    <div class="social">
      <a href="https://instagram.com"><i class="fa-brands fa-instagram" ></i></a>
      <a href="https://facebook.com"><i class="fa-brands fa-facebook"></i></a>
      <a href="https://gmail.com"><i class="fa-solid fa-envelope"></i></a>
    </div>
    <div class="createdby">
      <h5>Developed by Rohan Manav</h5>
    </div>
    </section>
    
</body>

<script src="home.js"></script>
<script>

    var bookbox = document.getElementById("guestdetailpanel");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    closebox = () =>{
      bookbox.style.display = "none";
    }
</script>
</html>