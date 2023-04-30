<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Huddersfax Mart/ Thankyou</title>

        <!-- Bootstrap -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
            crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="Css/style.css">

        <!-- Bootstrap scripts -->
        <script
            src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
            crossorigin="anonymous"></script>

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link
            href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap"
            rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
    <body>
        <input type="checkbox" id="check">
        <nav>
            <a href="Homepage.php"><img src="images/logo.png" alt="logo" class="logo"></a>
            <div class="search_box">
                <input type="search" placeholder="Search entire store here">
                <span class="fa fa-search"></span>
            </div>
            <ol>
                <li><a href="Wishlistpage.php"><i class="fa-regular fa-heart"></i>Wishlist</a></li>
                <li><a href="Addtocart.php"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
                <li><a href="Login/login.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                <li>

                    <select name="cars" id="cars">
                        <option selected disabled value="">Categories</option>
                        <option value="">Bakery</option>
                        <option value="">Butcher</option>
                        <option value="">Green Grocer</option>
                        <option value="">Fish Monger</option>
                        <option value="">Delicatessen</option>
                    </select></li>
            </ol>
            <label for="check" class="bar">
                <span class="fa fa-bars" id="bars"></span>
                <span class="fa fa-times" id="times"></span>
            </label>
        </nav>

        <!-- Thanks you msg Section -->

        <div class="thankyou_section">
            <div class="text-1">
                <h1>Thank you</h1>
            </div>
            <div class="text-2">
                <h3>Your order has been completed successfully</h3>
            </div>
            <div class="footer-text">
            <div class="tik-img">
                <img src="images/ticked.png" alt="ticked-img" class="ticked-img">
            </div>
            <div class="text-3">
                <h3>An email receipt, including all details about your order, has been sent to the email address you provided.
                    Please keep it for your records.
                </h3>
            </div>
        </div>
        <div class="homepage-button">
            <a href="Homepage.php" button type="button"  class="btn btn1">Homepage</button></a>
        </div>

        </div>

       

        <!-- Promos -->

        <div class="promos-container">
           
          
            <div class="promos-img">
                <img src="images/promos-img.jpg" alt="promo-img"
                    class="promocode-img">
            
                <img src="images/fresh-fruit-stalls.jpg" alt="shop-now"
                    class="shop-now">
        </div>

           
        </div>
       

<!-- Subscribe Handlebar -->

<div class="Subscribe-handlebar">
    <div class="updates">
        <h6 class="big-text">Dont miss out any updated<br></h6>
        <p class="short-text">Subscribe to Huddersfax mart. Get the
            latest product updates
            and <br>special offers delivered right to your inbox.</p>
    </div>
    <div class="Email-placeholder">
        <input type="email" id="email" name="myGeeks"
            placeholder="Enter your Email" class="Email-place">
            <a href="#" class="Subscribe-text"> Subscribe</a> <BR><br>
    </div>
</div>

        <!-- footer -->
        <div class="footer-container">
            <div class="Contact-row">
                <div class="Needhelp-text">
                    Need Help?
                </div>
                <div class="middle">
                    <a href="Contact-us-page.php"><button class="btn btn1">Contact Us</button></a>
                    
                  </div>
            </div>

            <div class="Links">
                <ol>
                    <li> <a href="Homepage.php" class="links-btn">Home</a> </li>
                    <li> <a href="#" class="links-btn">Bakery</a> </li>
                    <li> <a href="#" class="links-btn">Butchers</a> </li>
                    <li> <a href="#" class="links-btn">Greengrocer</a> </li>
                    <li> <a href="#" class="links-btn">Fishmonger</a> </li>
                    <li> <a href="#" class="links-btn">Delicatessen</a> </li>

                </ol>
            </div>

            <div class="policies Links">
                <ol>
                    <li> <a href="#" class="links-btn">Refund Policy</a> </li>
                    <li> <a href="#" class="links-btn">Return Policy</a> </li>
                    <li> <a href="#" class="links-btn">Payments</a> </li>
                </ol>
            </div>
            <div class="Huddersfax-mart Links">
                <ol>
                    <li> <a href="#" class="links-btn">About us</a> </li>
                    <li> <a href="#" class="links-btn">Terms of Service</a> </li>
                    <li> <a href="#" class="links-btn">Privacy policy</a> </li>
                    
                </ol>
            </div>
            <div class="map">
                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="hudder-map"></iframe></p>
            </div>


        </div>
    </body>
    <head>
