<!DOCTYPE html>
<html lang="en">
<head>

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

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addOrders.css">
    <link rel="stylesheet" href="table.css">
    <title>Add Orders</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Button Styles */
.btn {
    display: inline-block;
    padding: 12px 24px;
    margin: 20px 0;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
    background: linear-gradient(45deg, #ff6b6b, #f06595);
    border: none;
    border-radius: 8px;
    text-transform: uppercase;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.btn:hover {
    background: linear-gradient(45deg, #f06595, #ff6b6b);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

</style>
</head>
<body>
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

<button type="button" onclick="document.getElementById('tabela1').style.display='block'" class="btn"
>Booking Table</button>
<button type="button" onclick="document.getElementById('tabela2').style.display='block'" class="btn"
>Orders Table</button>
<button type="button" onclick="document.getElementById('tabela3').style.display='block'" class="btn"
>Hotels Table</button>
<button type="button" onclick="document.getElementById('tabela4').style.display='block'" class="btn"
>Countries Table</button>
<button type="button" onclick="document.getElementById('tabela5').style.display='block'" class="btn"
>User Table</button>
<button type="button" onclick="document.getElementById('tabela6').style.display='block'" class="btn"
>Company_Fly Table</button>


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


</body>
</html>