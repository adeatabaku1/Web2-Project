<?php
session_start();

class Continent {
    public $name;
    public $packages;  // This will be an associative array

    public function __construct($name) {
        $this->name = $name;
        $this->packages = array();
    }

    public function addPackage($package) {
        $this->packages[$package->id] = $package;
    }

    public function intro() {
        echo "<h2>Welcome to the continent of {$this->name}</h2>";
        echo "<p>It includes packages such as: ";
        foreach ($this->packages as $id => $package) {
            echo $package->name . ", ";
        }
        echo "</p>";
    }

    // Standard sort
    public function sortPackages() {
        sort($this->packages);
    }

    // Reverse sort
    public function rsortPackages() {
        rsort($this->packages);
    }

    // Associative sort by value
    public function asortPackages() {
        asort($this->packages);
    }

    // Associative sort by key
    public function ksortPackages() {
        ksort($this->packages);
    }

    // Reverse associative sort by value
    public function arsortPackages() {
        arsort($this->packages);
    }

    // Reverse associative sort by key
    public function krsortPackages() {
        krsort($this->packages);
    }
}

class Package extends Continent {
    protected $id;
    public $name;
    public $price;
    public $originalPrice;
    public $days;
    public $imageUrl;

    public function __construct($id, $name, $price, $originalPrice, $days, $imageUrl) {
        parent::__construct($name); // Call the constructor of the parent class
        $this->id = $id;
        $this->price = $price;
        $this->originalPrice = $originalPrice;
        $this->days = $days;
        $this->imageUrl = $imageUrl;
    }

    public function intro() {
    
        echo "<div class='box'>";
    
       
        echo "<div class='image'><img src='{$this->imageUrl}' alt='{$this->name}'></div>";
    
        
        echo "<div class='content'>";
    
       
        echo "<h3>{$this->name}</h3>";
    
       
        echo "<p><strong><b>\${$this->price}</b></strong> <span style='text-decoration: line-through;'>\${$this->originalPrice}</span></p>";
    
        
        echo "<div class='price' style='font-size: larger;'><b>{$this->days} DAYS</b></div>";
    
        
        echo "<a href='offert.php?package_id={$this->id}' class='btn'>See more</a>";
    
        
        echo "<a href='book_form.php?location=" . urlencode($this->name) . "' class='btn'>Book now</a>";
    
       
        echo "</div>";
    
        
        echo "</div>";
    }
    
}

// Example Usage:
$europe = new Continent("Europe");
$packages = [
    ['id' => 1, 'name' => 'Paris & FRANCE', 'price' => 800, 'originalPrice' => 1000, 'days' => 7, 'imageUrl' => 'images/paris-france.jpg'],
    ['id' => 2, 'name' => 'New-York & USA', 'price' => 3200, 'originalPrice' => 3550, 'days' => 7, 'imageUrl' => 'images/new-york-usa.jpg'],
    ['id' => 3, 'name' => 'Rome & ITALY', 'price' => 600, 'originalPrice' => 860, 'days' => 7, 'imageUrl' => 'images/rome-italy.jpg'],
    ['id' => 4, 'name' => 'London & UK', 'price' => 500, 'originalPrice' => 750, 'days' => 7, 'imageUrl' => 'images/london-uk.jpg'],
    ['id' => 5, 'name' => 'Tokyo & JAPAN', 'price' => 1280, 'originalPrice' => 1650, 'days' => 7, 'imageUrl' => 'images/tokyo-japan.jpg'],
    ['id' => 6, 'name' => 'Lisbon & PORTUGAL', 'price' => 900, 'originalPrice' => 1250, 'days' => 7, 'imageUrl' => 'images/lisbon-portugal.jpg'],
    ['id' => 7, 'name' => 'Barcelona & SPAIN', 'price' => 1000, 'originalPrice' => 1500, 'days' => 7, 'imageUrl' => 'images/barcelona-spain.jpg'],
    ['id' => 8, 'name' => 'Honolulu & HAWAII', 'price' => 2200, 'originalPrice' => 2950, 'days' => 7, 'imageUrl' => 'images/honolulu-hawaii.jpg'],
    ['id' => 9, 'name' => 'Istanbul & TURKEY', 'price' => 400, 'originalPrice' => 550, 'days' => 7, 'imageUrl' => 'images/istanbul-turkey.jpg'],
    ['id' => 10, 'name' => 'Berlin & GERMANY', 'price' => 600, 'originalPrice' => 850, 'days' => 7, 'imageUrl' => 'images/berlin-germany.jpg'],
    ['id' => 11, 'name' => 'Cairo & EGYPT', 'price' => 1200, 'originalPrice' => 1750, 'days' => 7, 'imageUrl' => 'images/cairo-egypt.jpg'],
    ['id' => 12, 'name' => 'Agra & INDIA', 'price' => 1350, 'originalPrice' => 1850, 'days' => 7, 'imageUrl' => 'images/agra-india.jpg'],
    ['id' => 13, 'name' => 'Venice & ITALY', 'price' => 670, 'originalPrice' => 780, 'days' => 7, 'imageUrl' => 'images/venice-italy.jpg'],
    ['id' => 14, 'name' => 'Singapore & SINGAPORE', 'price' => 1600, 'originalPrice' => 1800, 'days' => 7, 'imageUrl' => 'images/singapore-singapore.jpg'],
    ['id' => 15, 'name' => 'Toronto & CANADA', 'price' => 4500, 'originalPrice' => 5500, 'days' => 7, 'imageUrl' => 'images/toronto-canada.jpg'],
    ['id' => 16, 'name' => 'Sydney & AUSTRALIA', 'price' => 4500, 'originalPrice' => 5120, 'days' => 7, 'imageUrl' => 'images/sydney-australia.jpg'],
    ['id' => 17, 'name' => 'Lima & PERU', 'price' => 1500, 'originalPrice' => 2250, 'days' => 7, 'imageUrl' => 'images/lima-peru.jpg'],
    ['id' => 18, 'name' => 'Beijing & CHINA', 'price' => 2200, 'originalPrice' => 2950, 'days' => 7, 'imageUrl' => 'images/beijing-china.jpg']
];


foreach ($packages as $package) {
    $europe->addPackage(new Package($package['id'], $package['name'], $package['price'], $package['originalPrice'], $package['days'], $package['imageUrl']));
}

if (isset($_POST['sort'])) {
    $europe->sortPackages();
} elseif (isset($_POST['rsort'])) {
    $europe->rsortPackages();
} elseif (isset($_POST['asort'])) {
    $europe->asortPackages();
} elseif (isset($_POST['ksort'])) {
    $europe->ksortPackages();
} elseif (isset($_POST['arsort'])) {
    $europe->arsortPackages();
} elseif (isset($_POST['krsort'])) {
    $europe->krsortPackages();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACKAGE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel = "stylesheet" href = "style.css">
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
<?php 
session_start(); // Ensure the session is started

// Check if the user is logged in and set the appropriate link
$loginLink = !isset($_SESSION['username_user_reg']) ? 'login.php' : 'logout.php';
$linkText = !isset($_SESSION['username_user_reg']) ? 'Login' : 'Logout';
?>

<nav class="navbar23">
    <a href="<?php echo $loginLink; ?>"><?php echo $linkText; ?></a>
</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>
<!-- header section ends -->

<div class = "heading" style = "background:url(images/package.jpg)">
    <h1>PACKAGES</h1>
</div>


    <!-- package section starts -->
    <section class="packages">
        <h1 class="heading-title" style="color:var(--light-bg)">top destinations</h1>
        <div class="box-container">
            <?php
            foreach ($europe->packages as $package) {
                $package->intro();
            }
            ?>
        </div>
    </section>
    <!-- package section ends -->


    <div class="sort-buttons" style="margin-top:1px; margin-bottom: 20px;">
    <form method="post">
        <button type="submit" name="sort">Sort A-Z</button>
        <button type="submit" name="rsort">Sort Z-A</button>
        <button type="submit" name="asort">Asort A-Z</button>
        <button type="submit" name="ksort">Ksort A-Z</button>
        <button type="submit" name="arsort">Arsort Z-A</button>
        <button type="submit" name="krsort">Krsort Z-A</button>
    </form>
</div>
<style>
   .sort-buttons {
    margin-top: 20px;
    text-align: center; /* Center align the content */
}

.sort-buttons button {
    margin-right: 10px;
    padding: 8px 16px;
    background-color:darkslategray;
    border: none;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.sort-buttons button:hover {
    background-color:cadetblue;
}

</style>

<!-- package section ends -->


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
<script src ="script.js"></script>
</body>
</html>