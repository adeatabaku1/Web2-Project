<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK NOW</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="bokk.css">
    <link rel = "stylesheet" href = "style.css">
    <script>
function calculateReturnDate() {
  var startDate = document.getElementById('start-date').value;
  var returnDate = new Date(startDate);
  returnDate.setDate(returnDate.getDate() + 5);

  var formattedReturnDate = formatDate(returnDate);
  document.getElementById('return-date').textContent = formattedReturnDate;

  // Update the hidden input value
  document.getElementById('hidden-return-date').value = formattedReturnDate;
}
function formatDate(date) {
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (day < 10) {
    day = '0' + day;
  }

  if (month < 10) {
    month = '0' + month;
  }

  return day + '-' + month + '-' + year;
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

<div class = "heading" style = "background:url(images/book.png)">
    <h1 style="color: #fff;">TRAVEL WITH US!</h1>
    <style>
        h1 {
            opacity: 0.8;   
        }

        .heading {
            opacity: 0.8;
        }
    </style>
</div>

<section class="booking"> 

    <!-- <h1 class="heading-title">book your trip!</h1> -->
    <form action="book_form_php.php" method="post" class="book-forma" autocomplete="on">
     	<h2>You can book here!</h2>
        <style>
            h2 {
                color: black;
            }
        </style>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <span class="element">
          <!-- <label>Name</label> -->
          <?php if (isset($_GET['names'])) { ?>
               <input type="text" 
                      name="names"
                      id="names" 
                      placeholder="Name"
                      value="<?php echo $_GET['names']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="names"
                      id="names" 
                      placeholder="Name">
          <?php }?>

          <!-- <label>Email</label> -->
          <?php if (isset($_GET['email'])) { ?>
               <input type="email" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>">
          <?php }else{ ?>
               <input type="email" 
                      name="email"
                      id="email" 
                      placeholder="Email">
          <?php }?>


     	<!-- <label>Phone</label> -->
        <?php if (isset($_GET['phone'])) { ?>
     	<input type="number" 
                 name="phone" 
                 id="phone"
                 placeholder="Phone"
                 value="<?php echo $_GET['phone']; ?>">
        <?php }else{ ?>
               <input type="text" 
                      name="phone"
                      id="phone" 
                      min="1"
                      placeholder="Phone">
        <?php }?>

        <!-- <label>Address</label> -->
        <select  class="io"
                 name="address" 
                 id="address"
                >
                <option>Prishtinë</option>
                <option>Mitrovicë</option>
                <option>Pejë</option>
                <option>Prizeren</option>
                <option>Ferizaj</option>
                <option>Gjilan</option>
                <option>Gjakovë</option>
                <option>Podujevë</option>
                <option>Vushtrri</option>
                <option>Suharekë</option>
                <option>Rahovecë</option>
                <option>Drenas</option>
                <option>Lipjan</option>
                <option>Malishevë</option>
                <option>Kamenicë</option>
                <option>Viti</option>
                <option>Deçan</option>
                <option>Istog</option>
                <option>Klinë</option>
                <option>Skenderaj</option>
                <option>Dragash</option>
                <option>Fushë Kosovë</option>
                <option>Kaçanik</option>
                <option>Shtime</option>
                <option>Obiliq</option>
                <option>Leposaviq</option>
                <option>Graçanicë</option>
                <option>Han i Elezit</option>
                <option>Zveqan</option>
                <option>Shtërpcë</option>
                <option>Novobërdë</option>
                <option>Zubin Potok</option>
                <option>Junik</option>
                <option>Mamusha</option>
                <option>Ranillug</option>
                <option>Kllokoti</option>
                <option>Parteshi</option>
        </select>

        <!-- <label>Location</label> -->
        <select  class="io"
                 name="location" 
                 id="location"
                >
                <option>Agra & INDIA</option>
                        <option>New York & USA</option>
                        <option>London & UK</option>
                        <option>Paris & FRANCE</option>
                        <option>Cairo & EGYPT</option>
                        <option>Berlin & GERMANY</option>
                        <option>Istanbul & TURKEY</option>
                        <option>Rome & ITALY</option>
                        <option>Tokyo & JAPAN</option>
                        <option>Lisbon & PORTUGAL</option>
                        <option>Barcelona & SPAIN</option>
                        <option>Honolulu & HAWAII</option>
                        <option>Venice & ITALY</option>
                        <option>Singapore & SINGAPORE</option>
                        <option>Toronto & CANADA</option>
                        <option>Sydney & AUSTRALIA</option>
                        <option>Lima & PERU</option>
                        <option>Beijing & CHINA</option>
        </select>

        <!-- <label>Guests</label> -->
        <?php if (isset($_GET['guests'])) { ?>
     	<input type="number" 
                 name="guests" 
                 id="guests"
                 placeholder="Guests"
                 value="<?php echo $_GET['guests']; ?>">
        <?php }else{ ?>
               <input type="number" 
                      name="guests"
                      id="guests" 
                      placeholder="Guests">
        <?php }?>

        <!-- <label>Arrivals</label> -->
        <?php if (isset($_GET['arrivals'])) { ?>
     	<input type="date" 
                 name="arrivals" 
                 id="start-date" 
                 onchange="calculateReturnDate()"
                 placeholder="Arrivals"
                 pattern="\d{4}-\d{2}-\d{2}"
                 value="<?php echo $_GET['arrivals']; ?>">
        <?php }else{ ?>
               <input type="date" 
                      name="arrivals"
                      id="start-date"  
                      onchange="calculateReturnDate()"
                      placeholder="Arrivals"
                      pattern="\d{4}-\d{2}-\d{2}">
        <?php }?>

        <p style="font-size: 2rem">Leaving</p>
        <span id="return-date" style="font-size: 2rem"></span>
        <input type="hidden" name="return-date" id="hidden-return-date" pattern="\d{4}-\d{2}-\d{2}">
                
          </span>
          <button type="submit" class="btn">Book</button>
        <a href="info.html" class="btn" >Pay</a>
        <button onclick="window.print()" class="btn print">Print</button>

        </div>
    </form>
</section> 
<style>
    .print{
        margin-left:11px;
    }
    .btn:hover, button:hover {
    background: #6A5ACD; 
    transform: translateY(-3px); 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
    }

    .btn:active, button:active {
        transform: translateY(-1px); 
    }
</style>
        
<script>
// This function can be called when the button is clicked
function goBack() {
    history.back();
}
</script>

</div>
    <style>
    .btn:hover, button:hover {
    background: #6A5ACD;
    transform: translateY(-3px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn:active, button:active {
        transform: translateY(-1px); 
    }
</style>
    </form>
</section> 



<!--booking section ends-->


    <!-- footer section start -->
    <section class="footer" style = "background:url(images/Footer-Background-Image.png) no-repeat">
        <div class = "box-container">
            <div class = "box">
                <h3>Quick Links</h3>
            <a href = "home.php"><i class = "fas fa-angle-right"></i>HOME</a>
            <a href = "about.php"><i class = "fas fa-angle-right"></i>ABOUT</a>
            <a href = "FAQ.php"><i class = "fas fa-angle-right"></i>FAQ</a>
            <a href = "book.php"><i class = "fas fa-angle-right"></i>BOOK</a>
            <a href = "contact.php"><i class = "fas fa-angle-right"></i>CONTACT</a>
            </div>

            <div class = "box">
                <h3>Extra Links</h3>
            <a href = "contact.php"><i class = "fas fa-angle-right"></i>Ask Questions</a>
            <a href = "about.php"><i class = "fas fa-angle-right"></i>About Us</a>
            <a href = "private.php"><i class = "fas fa-angle-right"></i>Privacy Policy</a>
            <a href = "public.php"><i class = "fas fa-angle-right"></i>Terms and Conditions</a>
            </div> 

            <div class = "box">
                <h3>Contact Info</h3>
                <a href = "#"><i class = "fas fa-phone"></i>+383 49 889 778</a>
                <a href = "#"><i class = "fas fa-phone"></i>+383 49 889 778</a>
                <a href = "contact.php"><i class = "fas fa-envelope"></i>maxtravel@gmail.com</a>
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

         <div class = "credit">Created by <span>max travel</span> | all rights reserved! |</div>
    </section>

    <!-- footer section ends -->




    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- custom js file link -->
<script src ="script.js"></script> 
<!-- <script src="validation.js"></script> -->

</body>
</html>


