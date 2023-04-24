
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Huddersfax Mart</title>

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
                <li><a href="Wishlistpage.php" class ="Hover-btn"><i class="fa-regular fa-heart"></i> Wishlist</a></li>
                <li><a href="Addtocart.php" class ="Hover-btn"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                <li><a href="Login/index.php" class ="Hover-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                <li>

                    <select name="categories-dropdown" id="categories">
                        <option selected disabled value="">Categories</option >
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

        <!-- Banners -->
        <div class="Banner">
            <img src="images/Banner-img2.png" alt="image">
        </div>

        <!-- Text -->
        <div class="About-products">
            <div class="heading-text">
                <h1>Our Best Selling Products</h1>
            </div>
            <div class="down-text">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Eius sunt magni est nulla cum eum consequuntur cupiditate
                    molestias nemo esse dolore ullam odio itaque illo, maiores
                    suscipit nobis reiciendis, consequatur accusamus commodi?
                    Minima molestiae qui autem quis, enim eos doloremque libero
                    blanditiis debitis labore nesciunt ab, ipsam facilis,
                    tempore nihil!</p>
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

       <!-- Featured Products -->

        <p class="featured-text">Featured</p>
        <div class="featured-product-container">
            <div class="featured-products">

                <div class="card">
                    <img src="images/c.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Bakery</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Croissant</h6>
                    <p class="price">$Price : $4 &nbsp;&nbsp;&nbsp;<S>$5</S></p>
                    <p>Fresh and well made crossiant in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">
                
                <div class="card">
                    <a href="product-display-page.php"><img src="images/fish.jpg" alt="crossiant-img"
                        style="width:100%"></a>
                    
                    <div class="in-stock flex-verticle"><h6><B>Fish Monger</B>
                        </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>1 kg Fresh Fish</h6>
                    <p class="price">$Price : $8 &nbsp;&nbsp;&nbsp;<S>$10</S></p>
                    <p>Fresh and best quality fish in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/chicken.png" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Butcher</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Chicken</h6>
                    <p class="price">$Price : $7 &nbsp;&nbsp;&nbsp;<S>$9</S></p>
                    <p>Fresh and best quality chicken in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/lettuce.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Healthy vegetable
                                pvt.ltd</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Fresh Lettuce</h6>
                    <p class="price">$Price : $2 &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>Fresh lettuce in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Highlight -->
        <p class="featured-text">Category Highlight</p>

        <div class="Category-highlight">
            <div class="category-title">
                <ol>
                    <li><a href="#">All products</a></li>
                    <li><a href="#">Bakery</a></li>
                    <li><a href="#">Butchers</a></li>
                    <li><a href="#">Green Grocer</a></li>
                    <li><a href="#">Fish Monger</a></li>
                    <li><a href="#">Delicatessen</a></li>
                </ol>
            </div>
        </div>

        <!-- Category-product -->
        <div class="featured-product-container">
            <div class="featured-products">
                <div class="card">
                    <img src="images/lettuce.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Healthy vegetable
                                pvt.ltd</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Fresh Lettuce</h6>
                    <p class="price">$Price : $2 &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>Fresh lettuce in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/c.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Bakery</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Croissant</h6>
                    <p class="price">$Price : $4 &nbsp;&nbsp;&nbsp;<S>$5</S></p>
                    <p>Fresh and well made crossiant in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/fish.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Fish Monger</B>
                        </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>1 kg Fresh Fish</h6>
                    <p class="price">$Price : $8 &nbsp;&nbsp;&nbsp;<S>$10</S></p>
                    <p>Fresh and best quality fish in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/chicken.png" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Butcher</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Chicken</h6>
                    <p class="price">$Price : $7 &nbsp;&nbsp;&nbsp;<S>$9</S></p>
                    <p>Fresh and best quality chicken in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-product-container">
            <div class="featured-products">

                <div class="card">
                    <img src="images/ramen.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Delicatessen</B>
                        </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Ramen</h6>
                    <p class="price">$Price : $4 &nbsp;&nbsp;&nbsp;<S>$5</S></p>
                    <p>Tasty and well cooked ramen.</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/c.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Bakery</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Croissant</h6>
                    <p class="price">$Price : $4 &nbsp;&nbsp;&nbsp;<S>$5</S></p>
                    <p>Fresh and well made crossiant in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/chicken.png" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Butcher</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Chicken</h6>
                    <p class="price">$Price : $7 &nbsp;&nbsp;&nbsp;<S>$9</S></p>
                    <p>Fresh and best quality chicken in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
            </div>
            <div class="featured-products">

                <div class="card">
                    <img src="images/lettuce.jpg" alt="crossiant-img"
                        style="width:100%">
                    <div class="in-stock flex-verticle"><h6><B>Healthy vegetable
                                pvt.ltd</B> </h6>
                        <p class="instock-text"> In Stock </p></div>
                    <h6>Fresh Lettuce</h6>
                    <p class="price">$Price : $2 &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                    <p>Fresh lettuce in the town</p>
                    <div class="flex-verticle">
                        <button class="btn btn1">Add to cart</button>
                        <p class="addtocart-icon"><a href="#"><i
                                    class="fa-regular fa-heart black"></i></a></p>
                    </div>
                </div>
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
                    <li> <a href="About-us.php" class="links-btn">About us</a> </li>
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
        </html>
        
    
