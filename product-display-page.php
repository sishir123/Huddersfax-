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

    <!-- Csslink -->
    <link rel="stylesheet" href="./Css/style.css" />
    <link rel="stylesheet" href="./Css/Product-display.css" />

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
          <a href="Login/login.php" class="Hover-btn"
            ><i class="fa-solid fa-right-to-bracket"></i> Login</a
          >
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

    <!-- Product-display-container -->
    <div class="product-display-whole-container">
      <div class="category-container">
        <span>All Products</span>
        <span class="category"
          ><i class="fa-solid fa-chevron-right right-icon"></i>Fish</span
        >
        <span class="sub-category"
          ><i class="fa-solid fa-chevron-right right-icon"></i>Fish Monger</span
        >
      </div>
      <div class="product-display-container">
        <div class="product-display-img-container">
          <img src="images/fish.jpg" alt="product-img" />
          <div class="review-rating">
            <h3>Reviews</h3>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
        </div>
        <div class="product-description">
          <div class="product-item-name">
            <p>
              <strong> 1Kg fish </strong>
            </p>
          </div>
          <div class="product-item-desc">
            Fresh and best quality fish in the town
          </div>
          <div class="product-item-price">
            $5 &nbsp; &nbsp;<s> $10 </s> &nbsp; -50%
          </div>
          <div class="product-rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <div class="product-stock-checker">Stock available : 10</div>
          <div class="product-add-to-cart">
            <button class="btn btn1">
              <i class="fa-solid fa-cart-shopping">Add to cart</i>
            </button>
          </div>
          <div class="flex-horizontal">
            <p>Available</p>
            <p>Within 3-4 days</p>
          </div>
          <div class="product-features">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias,
            suscipit.<br />
          </div>
          <ul class="desc-list">
            <li>
              <i class="fa-solid fa-check"></i> Lorem ipsum dolor sit amet.
            </li>
            <li>
              <i class="fa-solid fa-check"></i> Lorem ipsum dolor sit amet.
            </li>
            <li>
              <i class="fa-solid fa-check"></i> Lorem ipsum dolor sit amet.
            </li>
          </ul>
        </div>
      </div>
      <div class="promos-container">
        <div class="promos-img">
          <img
            src="images/promos-img.jpg"
            alt="promo-img"
            class="promocode-img"
          />
        </div>
      </div>
    </div>
    <!-- Subscribe Handlebar -->

    <div class="Subscribe-handlebar">
      <div class="updates">
        <h6 class="big-text">Dont miss out any updated<br /></h6>
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
        <a href="#" class="Subscribe-text"> Subscribe</a>
        <br /><br />
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
          <li><a href="#" class="links-btn">About us</a></li>
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
