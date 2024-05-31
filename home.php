<?php
session_start();

$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="<?php echo ($theme == 'dark') ? 'dark_style.css' : 'style.css'; ?>">

    <script>
        function openModal() {
             document.getElementById('themeModal').style.display = 'flex';
        }

        function closeModal() {
             document.getElementById('themeModal').style.display = 'none';
        }

        function handleHistoryClick() {
            <?php if (isset($_SESSION['username_user_reg'])): ?>
                window.location.href = 'histori.php';
            <?php else: ?>
                window.location.href = 'login.php?redirect=histori.php';
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <!-- header section starts -->
    <section class="header">

    <a href="home.php" class="logo">BeautyWonders</a>

    <nav class="navbar">
        <a href="home.php">HOME</a>
        <a href="about.php">ABOUT</a>
        <a href="pageage.php">PACKAGE</a>
        <a href="book_form.php">BOOK</a>
        <a href="contact.php">CONTACT</a>
        <a href="#" onclick="handleHistoryClick()">HISTORY</a>
    </nav>
    <nav class="navbar23">
    <?php if (!isset($_SESSION['username_user_reg'])): ?>
        <a href="login.php">Login</a>
    <?php else: ?>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>

    </section>
    <!-- header section ends -->

    <!-- home section start -->
    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background:url(images/sea.jpg) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>   
                        <h3>travel around the world</h3>
                        <a href="pageage.php" class="btn">Discover more</a>
                    </div>
                </div>

                <div class="swiper-slide" style="background:url(images/image.jpg) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>Discover the new places</h3>
                        <a href="pageage.php" class="btn">Discover more</a>
                    </div>
                </div>

                <div class="swiper-slide" style="background:url(images/antarctica.jpg) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>make your tour worthwhile</h3>
                        <a href="pageage.php" class="btn">Discover more</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <!-- home section ends -->

    <div class="themebutton">
        <button onclick="openModal()" style="background-color:#96869f; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Change Theme</button>
    </div>

    <!-- Theme Selection Form Pop-Up -->
    <div id="themeModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
        <form method="post" action="set_theme.php" style="padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 20px; margin-bottom: 20px;">Select Theme</h2>
            <select name="theme" style="width: 100%; padding: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="light">Light Theme</option>
                <option value="dark">Dark Theme</option>
            </select>
            <button type="submit" style="width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #007BFF; color: white; cursor: pointer;">Apply Theme</button>
            <button type="button" onclick="closeModal()" style="width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #f44336; color: white; cursor: pointer; margin-top: 10px;">Close</button>
        </form>
    </div>

    <!-- services section starts -->
    <section class="services">
        <h1 class="heading-title">Our Services</h1>
        
        <div class="box-container">
            <div class="box">
                <img src="images/Adventure.jpg" alt="">
                <h3>Adventure</h3>
            </div>

            <div class="box">
                <img src="images/TourGuide.jpg" alt="">
                <h3>Tour Guide</h3>
            </div>

            <div class="box">
                <img src="images/Trekking.jpg" alt="">
                <h3>Trekking</h3>
            </div>

            <div class="box">
                <img src="images/CampFire.jpg" alt="">
                <h3>Camp Fire</h3>
            </div>

            <div class="box">
                <img src="images/OffRoad.png" alt="">
                <h3>Off Road</h3>
            </div>

            <div class="box">
                <img src="images/Camping.jpg" alt="">
                <h3>Camping</h3>
            </div>
        </div>
    </section>
    <!-- services section ends -->

    <!-- home about section starts -->
    <section class="home-about">
        <div class="image">
            <img src="images/aboutas.jpg" alt="">
        </div>

        <div class="content">
            <h3>about us</h3>
            <p>"Experience your adventure with just one click! Buying tickets online has never been easier and 
                faster. Get ready for your upcoming journey by visiting our website and booking your travel
                 tickets in a fast and secure way. Our online tickets offer the opportunity to choose your desired
                  destination and date, giving you the complete satisfaction of organizing your trip according to
                   your preferences. Take advantage of special offers and competitive prices, and get ready to 
                   live an unforgettable adventure. Book your tickets online now and be part of your
                    dream journey!"</p>
            <a href="about.php" class="btn">read more</a>
        </div>
    </section>
    <!-- home about section ends -->

    
    <!-- Additional user info section -->
    <?php if (isset($_SESSION['username_user_reg'])): ?>
        <?php
        // Include file for database connection
        include "book-db.php";

        // Sanitize string
        function sanitizeString($str) {
            return preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
        }

        // Validate numbers
        function validateNumber($num) {
            return preg_match("/^[0-9]+$/", $num);
        }

        // Fetch user info from database
        $username = $_SESSION['username_user_reg'];
        $sql = "SELECT * FROM user_reg WHERE username_user_reg = ?";
        //Fillon SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $name = sanitizeString($row['name_user_reg']);
            $login_count = isset($_SESSION['login_count']) ? $_SESSION['login_count'] : 1;
            if (!validateNumber($login_count)) {
                $login_count = 0;
            }
        } else {
            echo "User not found.";

        }
          //require 'error_handler.php';

        ?>
        <section class="weather"> 
            <h4>Hello, <?php echo $name; ?></h4>
            <p>You have logged in <?php echo $login_count; ?> times.</p>
        </section>
    <?php endif; ?>

    <section class="weather"> 
        <b>You can also see weather</b><a href="weather.html"> <b>here</b></a>
        <style>
            .weather {
                text-align: center;
                padding: 20px;
                font-size: 18px;
            }
            .weather a {
                color: blue;
                text-decoration: underline;
            }
        </style>
    </section>


    <section class="home-packages">
    <h1 class="heading-title">New Packages</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="images/tokyo-japan.jpg" alt="">
            </div>
            <div class="content">
                <h3>Tokyo & JAPAN</h3>
                <p style="text-transform: uppercase;">OFFER: 1280$</p>
                    <p>Ticket: 1650$</p>
                    <div class="price" style="font-size: larger;"><b>7 DAYS</b></div>
                <a href="offert.php" class="btn">See more</a>
                <a href="book_form.php" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/honolulu-hawaii.jpg" alt="">
            </div>
            <div class="content">
                <h3>Honolulu & HAWAII</h3>
                <p style="text-transform: uppercase;">OFFER: 2200$</p>
                    <p>Ticket: 2950$</p>
                    <div class="price" style="font-size: larger;"><b>7 DAYS</b></div>
                <a href="offert.php" class="btn">See more</a>
                <a href="book_form.php" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/berlin-germany.jpg" alt="">
            </div>
            <div class="content">
                <h3>Berlin & GERMANY</h3>
                <p style="text-transform: uppercase;">OFFER: 600$</p>
                    <p>Ticket: 850$</p>
                    <div class="price" style="font-size: larger;"><b>7 DAYS</b></div>
                <a href="offert.php" class="btn">See more</a>
                <a href="book_form.php" class="btn">book now</a>
            </div>
        </div>
        </div>

    </div>

    <div class="load-more"><a href="pageage.php" class="btn">Load more</a></div>
</section>

<!-- home package section ends -->

<!-- home offer section starts -->

<section class="home-offer">
    <div class="content">
        <h3>upto 50% off</h3>
        <p>Don't miss out on this opportunity: Buy with 50% off for a limited time only!</p>
        <a href="book_form.php" class="btn">Book now</a>
    </div>
</section>

<!-- home offer section ends -->

    <!-- footer section start -->
    <section class="footer" style = "background:url(images/Footer-Background-Image.png) no-repeat">
        <div class = "box-container">
            <div class = "box">
                <h3>Quick Links</h3>
            <a href = "home.php"><i class = "fas fa-angle-right"></i>HOME</a>
            <a href = "about.php"><i class = "fas fa-angle-right"></i>ABOUT</a>
            <a href = "FAQ.php"><i class = "fas fa-angle-right"></i>FAQ</a>
            <a href = "book_form.php"><i class = "fas fa-angle-right"></i>BOOK</a>
            <a href = "contact.php"><i class = "fas fa-angle-right"></i>CONTACT</a>
            </div>

            <div class = "box">
                <h3>Extra Links</h3>
            <a href = "contact.php"><i class = "fas fa-angle-right"></i>Ask Questions</a>
            <a href = "about.php"><i class = "fas fa-angle-right"></i>About Us</a>
            <a href = "private.php"><i class = "fas fa-angle-right"></i>Privacy Policy</a>
            <a href = "public.php"><i class = "fas fa-angle-right"></i>Terms and Conditions</a>
            <a href = "pay.php"><i class = "fas fa-angle-right"></i>Link For Pay</a>
            </div> 

            <div class = "box">
                <h3>Contact Info</h3>
                <a href = "#"><i class = "fas fa-phone"></i>+383 49 889 778</a>
                <a href = "#"><i class = "fas fa-phone"></i>+383 44 889 778</a>
                <a href = "contact.php"><i class = "fas fa-envelope"></i>teamTravel@gmail.com</a>
                <a href = "location.php"><i class = "fas fa-map"></i>Prishtine - Kosove</a>
            </div> 

            <div class = "box">
                <h3>Follow Us</h3>
            <a href = "https://www.facebook.com/maxtraveldream"><i class = "fab fa-facebook-f"></i>FACEBOOK</a>
            <a href = "#"><i class = "fab fa-twitter"></i>TWITTER</a>
            <a href = "https://www.instagram.com/maxtraveldream/"><i class = "fab fa-instagram"></i>INSTAGRAM</a>
            <a href = "#"><i class = "fab fa-linkedin"></i>LINKEDIN</a>

            </div>
         </div>

         <div class = "credit">Created by <span>BeautyWonders Travel</span> | all rights reserved! |</div>
    </section>

    <!-- footer section ends -->

    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- custom js file link -->
<script src="script.js"></script>
</body>
</html>
