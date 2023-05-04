<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="Css/cart.css" />
    <link rel="stylesheet" href="Css/style.css" />

    <!-- Bootstrap scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
      integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
      crossorigin="anonymous"
    ></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="./Css/wishlist.css" />
  </head>
  <body>
    <input type="checkbox" id="check" />
    <nav>
      <a href="Homepage.php"><img src="images/logo.png" alt="logo" class="logo"></a>
      <div class="search_box">
        <input type="search" placeholder="Search entire store here" />
        <span class="fa fa-search"></span>
      </div>
      <ol>
        <li>
          <a href="Wishlistpage.php" class="Hover-btn"
            ><i class="fa-regular fa-heart"></i> Wishlist</a
          >
        </li>
        <li>
          <a href="Addtocart.php" class="Hover-btn"
            ><i class="fa-solid fa-cart-shopping"></i> Cart</a
          >
        </li>
        <li>
          <li><a href="Login/login.php" class ="Hover-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>

        </li>
        <li>
          <select name="categories-dropdown" id="categories">
            <option selected disabled value="">Categories</option>
            <option value="">Bakery</option>
            <option value="">Butcher</option>
            <option value="">Green Grocer</option>
            <option value="">Fish Monger</option>
            <option value="">Delicatessen</option>
          </select>
        </li>
      </ol>
      <label for="check" class="bar">
        <span class="fa fa-bars" id="bars"></span>
        <span class="fa fa-times" id="times"></span>
      </label>
    </nav>

    <div class="cart-page-container">
      <div class="header-text">
        <h1 class="cart-page-text"><b>Checkout</b></h1>
      </div>


      <div class="info-1">
        <div class="profile info">
          <div class="flexing1">
        <i class="fa-solid fa-user fa-beat"></i>
        <p>Customer's name</p>
        </div>
        </div>
      </div>
        <br>
  
       
      <div class="cart-checkout-container">
        <div>
          <div class="cart-items-container">
            <div class="cart-page-item">
              <div class="cart-page-desc-container">
                <div class="cart-page-img">
                  <img src="images/fish.jpg" alt="product-img" />
                </div>
                <div class="cart-page-desc">
                  <div class="cart-page-item-name">
                    <h5 class="cart-page-item-text">1Kg Fresh Fish</h5>
                  </div>

                  <div class="cart-page-description">
                    <p class="cart-page-desc-text">
                      Fresh and best quality fish in the town
                    </p>
                  </div>
                  <div class="cart-page-instock">
                    <p class="cart-page-instock-text">In stock</p>
                  </div>
                  <div class="wrapper">
                    <input
                      type="number"
                      min="0"
                      max="100"
                      class="num"
                      value="1"
                      
                    />
                  </div>
                 
                </div>
              </div>
              <div class="cart-page-priceinfo">
                <i class="fa-solid fa-trash"></i>
                <p class="price-info">
                  <s>$ 10</s>&nbsp;$5 <br />
                  Discount applied : $5
                </p>
              </div>
            </div>
            <div class="cart-page-item">
              <div class="cart-page-desc-container">
                <div class="cart-page-img">
                  <img src="images/fish.jpg" alt="product-img" />
                </div>
                <div class="cart-page-desc">
                  <div class="cart-page-item-name">
                    <h5 class="cart-page-item-text">1Kg Fresh Fish</h5>
                  </div>

                  <div class="cart-page-description">
                    <p class="cart-page-desc-text">
                      Fresh and best quality fish in the town
                    </p>
                  </div>
                  <div class="cart-page-instock">
                    <p class="cart-page-instock-text">In stock</p>
                  </div>
                  <div class="wrapper">
                    <input
                      type="number"
                      min="0"
                      max="100"
                      class="num"
                      value="1"
                    />
                  </div>
                 
                </div>
              </div>
              <div class="cart-page-priceinfo">
                <i class="fa-solid fa-trash"></i>
                <p class="price-info">
                  <s>$ 10</s>&nbsp;$5 <br />
                  Discount applied : $5
                </p>
              </div>
            </div>
          </div>
          <div class="cart-bottom-container">
            <div class="flex">
              <h3><b>Safe & easy shopping</h3></b><br>
            </div><br>
            <div class="flex">
              <h5><i class="fa-solid fa-truck"></i> Pick-up Date And Time</h5>
              <i class="fa-solid fa-chevron-down"></i></p><br>
            </div>
            <form action="/action_page.php">
              <p> Day</p>
              <input type="button" id="Sun" name="Day" value="Sun">
              <input type="button" id="Mon" name="Day" value="Mon">
              <input type="button" id="Tue" name="Day" value="Tue">
              <input type="button" id="Wed" name="Day" value="Wed">
              <input type="button" id="Thu" name="Day" value="Thu">
              <input type="button" id="Fri" name="Day" value="Fri">
              <input type="button" id="Sat" name="Day" value="Sat"><br>
            <form action="/action_page.php"><br>
              <p> Time Slot</p>
              <input type="radio" id="10am - 1pm" name="Time slot" value="10am - 1pm">
              <label for="10am - 1pm">10am - 1pm</label><br>
              <input type="radio" id="1pm - 4pm" name="Time slot" value="1pm - 4pm">
              <label for="1pm - 4pm">1pm - 4pm</label><br>
              <input type="radio" id="4pm - 7pm" name="Time slot" value="4pm - 7pm">
              <label for="4pm - pm">4pm - 7pm</label><br>
            <div class="flex">
              <h5><br>
                <i class="fas fa-map-marker-alt"></i> Location
              </h5>
              <p><br><i class="fa-solid fa-chevron-down"></i></p><br>
            </div>
            <p>Suburb Cleckhddersfax,65,Ilamo,Uk</p>
            <li><a href="#" class=" ">Change</a></li><br>
            <div class="flex">
              <h5>
                <i class="fa-regular fa-credit-card"></i> Convenient payment
                method
              </h5>
              <p><i class="fa-solid fa-chevron-down"></i></p><br>
            </div>
            <input type="radio" id="Paypal" name="Paypal" value="Paypal">
            <i class="fa-brands fa-paypal fa-beat-fade"></i>
              <label for="Paypal">Paypal</label><br>
          </div>
          
          <button class="btn btn1 ok">Continue</button> 
         
        <form>
 
         
        
         
        <br>
        <br>
          <p>By Clicking Continue,"I confirm that I am aware and accept that <br>I am obiliged
            to pay for my order.I accept the terms and conditions<br> and conditions and confirm that I have read the Privacy policy.
          </p>
  </form>
        </div>
        <div class="checkout-container">
          <h5>Summary</h5>
          <div class="summary-info">
            <div class="items-in-cart">
              <p>Items in the cart</p>
              <p>$ 20</p>
            </div>
            <div class="discount-in-cart">
              <p>Discount Applied</p>
              <p>$ -10</p>
            </div>
            <div class="price-info">
              <p>Total</p>
              <p>$ 10</p>
            </div>
            <button class="btn btn1">Buy Now</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Subscribe Handlebar -->

    <div class="Subscribe-handlebar">
      <div class="updates">
        <h6 class="big-text">Dont miss out any updates<br /></h6>
        <p class="short-text">
          Subscribe to Huddersfax mart. Get the latest product updates and
          <br />special offers delivered right to your inbox.
        </p>
      </div>
      <div class="Email-placeholder">
        <input
          type="email"
          id="email"
          name="myGeeks"
          placeholder="Enter your Email"
          class="Email-place"
        />
        <a href="#" class="Subscribe-text"> Subscribe</a> <br /><br />
      </div>
    </div>

    <!-- footer -->
    <div class="footer-container">
      <div class="Contact-row">
        <div class="Needhelp-text">Need Help?</div>
        <div class="middle">
          <a href="Contact-us-page.php"><button class="btn btn1">Contact Us</button></a>
        </div>
      </div>

      <div class="Links">
        <ol>
          <li><a href="Homepage.php" class="links-btn">Home</a></li>
          <li><a href="#" class="links-btn">Bakery</a></li>
          <li><a href="#" class="links-btn">Butchers</a></li>
          <li><a href="#" class="links-btn">Greengrocer</a></li>
          <li><a href="#" class="links-btn">Fishmonger</a></li>
          <li><a href="#" class="links-btn">Delicatessen</a></li>
        </ol>
      </div>

      <div class="policies Links">
        <ol>
          <li><a href="#" class="links-btn">Refund Policy</a></li>
          <li><a href="#" class="links-btn">Return Policy</a></li>
          <li><a href="#" class="links-btn">Payments</a></li>
        </ol>
      </div>
      <div class="Huddersfax-mart Links">
        <ol>
          <li><a href="About-us.php" class="links-btn">About us</a></li>
          <li><a href="#" class="links-btn">Terms of Service</a></li>
          <li><a href="#" class="links-btn">Privacy policy</a></li>
        </ol>
      </div>
      <div class="map">
        <p>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7891502642515!2d-1.7842727793207414!3d53.64438949499016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487962132bcdb7bb%3A0x653c3a498c896a17!2sHuddersfield%2C%20UK!5e0!3m2!1sen!2snp!4v1681277576705!5m2!1sen!2snp"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="hudder-map"
          ></iframe>
        </p>
      </div>
    </div>
  </body>
</html>