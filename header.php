<input type="checkbox" id="check">
    <nav>
        <a href="Homepage.php"><img src="images/logo.png" alt="logo" class="logo"></a>
    <form action="Category-display-page.php" method="post">
        <div class="search_box">
            <input type="search" placeholder="Search entire store here" name="text">

            <button name="search"><span class="fa fa-search"></span></button>
        </div>
        </form>
        <ol>
            <li><a href="Wishlistpage.php" class="Hover-btn"><i class="fa-regular fa-heart"></i> Wishlist</a></li>
            <li><a href="Addtocart.php" class="Hover-btn"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
            <?php
            if(isset($_SESSION['user']) && isset($_SESSION['email']) && $_SESSION['role'] == 'USER'){
                echo '<li><a href="Customer-edit-profile.php" class="Hover-btn"><i class="fa-solid fa-user"></i>Profile</a></li>';
                echo '<li><a href="./logout.php" class="Hover-btn"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</a></li>';
            }else{
            ?>
            <li><a href="Login/login.php" class="Hover-btn"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
            <?php
            }
            ?>
            <li><a href="order-history.php" class="Hover-btn"><i class="fa-solid fa-cart-shopping"></i>Order</a></li>

            
        </ol>
       
    </nav>