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

    <div class="form-container">
<div class="form-inner">
<form action="addOrders-php.php" method="post" class="login" id="orders"><br><br>
<div class="field">
    <input type="number" placeholder="Shto id e orders" id="id_orders" name="id_orders"><br><br>
</div>
    <div class="field">
    <input type="number" placeholder="Shto id e booking" id="id_booking" name="id_booking" ><br><br>
    </div>
    <div class="field">
    <input type="number" placeholder="Shto id e perdoruesit" id="id_user_reg" name="id_user_reg"><br><br>
    </div>
    <div class="field">
    <input type="number" placeholder="Shto id e countries" id="id_countries" name="id_countries"><br><br>
    </div>
    <div class="field">
    <input type="number" placeholder="Shto id e hotels" id="id_hotels" name="id_hotels"><br><br>
    </div>
    <div class="field">
    <input type="number" placeholder="Shto id e company_fly" id="id_company_fly" name="id_company_fly"><br><br>
    </div>
    <div class="field">
    <input type="text" placeholder="Shto user_name" id="user_name" name="user_name"><br><br>
    </div>
    <button type="submit" class="btn">Add</button><br><br>
</form>
</div>
</div>

    <!-- review section starts -->
    <section class="reviews">
        <h1 class="heading-title">clients reviews</h1>
        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic-1.png" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint delectus eos molestiae quaerat earum, 
                            temporibus laudantium nisi obcaecati similique dignissimos repudiandae quo alias hic tempora quas 
                            expedita officiis fugiat laborum?</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic-2.png" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint delectus eos molestiae quaerat earum, 
                            temporibus laudantium nisi obcaecati similique dignissimos repudiandae quo alias hic tempora quas 
                            expedita officiis fugiat laborum?</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic-3.png" alt="">
                        <h3>john deo</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint delectus eos molestiae quaerat earum, 
                            temporibus laudantium nisi obcaecati similique dignissimos repudiandae quo alias hic tempora quas 
                            expedita officiis fugiat laborum?</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- review section ends -->

    <!-- swiper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>


<?php

include "book-db.php";

$sql = "SELECT * FROM booking";
$sql2 = "SELECT * FROM orders";
$sql3 = "SELECT * FROM hotels";
$sql4 = "SELECT * FROM countries";
$sql5 = "SELECT * FROM user_reg";
$sql6 = "SELECT * FROM company_fly";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela1' style='display: none;' class='table_responsive'>
<tr><th>Id_Booking</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Location</th>
<th>Guests</th>
<th>Arrivals</th>
<th>Leaving</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_booking"]."'><td>".$row["id_booking"]."</td>
<td>".$row["names"]."</td>
<td>".$row["email"]."</td>
<td>".$row["phone"]."</td>
<td>".$row["address"]."</td>
<td>".$row["location"]."</td>
<td>".$row["guests"]."</td>
<td>".$row["arrivals"]."</td>
<td>".$row["leaving"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht(".$row["id_booking"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

echo "<br>";

$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela2' style='display: none;' class='table_responsive'>
<tr><th>Id_Ordres</th>
<th>Id_Booking</th>
<th>Id_user_reg</th>
<th>Id_countries</th>
<th>Id_hotels</th>
<th>Id_company_fly</th>
<th>User_name</th>
<th>Total_Price</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_orders"]."'><td>" . $row["id_orders"] . "</td>
<td>".$row["id_booking"]."</td>
<td>".$row["id_user_reg"]."</td>
<td>".$row["id_countries"]."</td>
<td>".$row["id_hotels"]."</td>
<td>".$row["id_company_fly"]."</td>
<td>".$row["user_name"]."</td>
<td>".$row["total_price"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht2(".$row["id_orders"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

echo "<br>";

$result = mysqli_query($conn, $sql3);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela3' style='display: none;' class='table_responsive'>
<tr><th>Id_Hotels</th>
<th>Name_Hotels</th>
<th>Offer</th>
<th>Price_Hotel</th>
<th>Code_City</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_hotels"]."'><td>" . $row["id_hotels"] . "</td>
<td>".$row["name_hotels"]."</td>
<td>".$row["offer"]."</td>
<td>".$row["price_hotel"]."</td>
<td>".$row["codCity"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht(".$row["id_hotels"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

echo "<br>";


$result = mysqli_query($conn, $sql4);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela4' style='display: none;' class='table_responsive'>
<tr><th>Id_Countries</th>
<th>Name_Countries</th>
<th>Price_Countries</th>
<th>Id_Company_Fly</th>
<th>Id_Hotels</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_countries"]."'><td>" . $row["id_countries"] . "</td>
<td>".$row["name_countries"]."</td>
<td>".$row["price_countries"]."</td>
<td>".$row["id_company_fly"]."</td>
<td>".$row["id_hotels"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht(".$row["id_countries"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

echo "<br>";

$result = mysqli_query($conn, $sql5);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela5' style='display: none;' class='table_responsive'>
<tr><th>Id_User</th>
<th>Name_User</th>
<th>Username</th>
<th>Password</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_user_reg"]."'><td>" . $row["id_user_reg"] . "</td>
<td>".$row["name_user_reg"]."</td>
<td>".$row["username_user_reg"]."</td>
<td>".$row["password"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht(".$row["id_user_reg"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

echo "<br>";

$result = mysqli_query($conn, $sql6);

if (mysqli_num_rows($result) > 0) {

echo "<table border = 1 id='tabela6' style='display: none;' class='table_responsive'>
<tr><th>Id_Company_Fly</th>
<th>Name_Company_Fly</th>
<th>Destination</th>
<th>Contract</th>
<th>Price_Fly</th>";
while($row = mysqli_fetch_assoc($result)) {
echo "<tr id='rreshti-".$row["id_company_fly"]."'><td>" . $row["id_company_fly"] . "</td>
<td>".$row["name_company_fly"]."</td>
<td>".$row["destination"]."</td>
<td>".$row["contract"]."</td>
<td>".$row["price_fly"]."</td>
<td><button class='fshi-btn' onclick='fshiRresht(".$row["id_company_fly"].")'>Delete</button></td>";
}
echo "</table>";
} else {
echo "No results found.";
}

?>



<script>
function fshiRresht(id_booking) {
  fetch("fshi_booking.php", {
    method: "POST",
    body: new URLSearchParams({ id_booking }),
  })
    .then((response) => response.text())
    .then((text) => {
      console.log(text);
      if (text.includes("sukses")) {
        const rreshti = document.getElementById("rreshti-" + id_booking);
        rreshti.remove();
      } else {
        alert("Ndodhi një gabim gjatë fshirjes së rreshtit.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Ndodhi një gabim gjatë fshirjes së rreshtit.");
    });
}

function fshiRresht2(id_orders) {
  fetch("fshi_orders.php", {
    method: "POST",
    body: new URLSearchParams({ id_orders }),
  })
    .then((response) => response.text())
    .then((text) => {
      console.log(text);
      if (text.includes("sukses")) {
        const rreshti = document.getElementById("rreshti-" + id_orders);
        rreshti.remove();
      } else {
        alert("Ndodhi një gabim gjatë fshirjes së rreshtit.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Ndodhi një gabim gjatë fshirjes së rreshtit.");
    });
}

</script>
</body>
</html>
