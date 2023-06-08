
<?php
session_start();
$conn = oci_connect('ADMIN', 'Prajwal123#', '//localhost/xe');
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
} else {
    $userId = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../Header/tryheader.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="./searchPage.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="container">
        <div class="cart-container1">
            <?php
            include("../Header/tryheader.php");
            ?>
        </div>

        <div class="searchBody">

            <div class="sort">
                <form method="post" action="">
                    <label>Categories</label>
                    <?php
                    $categorysql = "SELECT * FROM CATEGORY";
                    $categoryqry = oci_parse($conn, $categorysql);
                    oci_execute($categoryqry);
                    echo '<select name="category">';
                    while ($rowcategory = oci_fetch_array($categoryqry, OCI_ASSOC)) {
                        echo '<option value="0" hidden>-------------------</option>';
                        echo '<option value="' . $rowcategory['CATEGORY_ID'] . '">' . $rowcategory['CATEGORY_NAME'] . '</option>';
                    }
                    echo '</select>';
                    oci_close($conn);
                    ?><br>
                    <!-- <div id="to"> -->
                        <label>Price Range: </label><br>
                        from
                        <input type="text" name="from" value="" id="from">
                        to
                        <input type="text" name="to" value="" id="to"><br />
                        <input type="submit" name="subSorting" value="Filter">
                    <!-- </div> -->
                </form>
                <form method="post">
                <label>Sort By SHOP</label>
                    <?php
                    $categorysql = "SELECT * FROM SHOP";
                    $categoryqry = oci_parse($conn, $categorysql);
                    oci_execute($categoryqry);
                    echo '<select name="shop">';
                    while ($rowcategory = oci_fetch_array($categoryqry, OCI_ASSOC)) {
                        echo '<option value="0" hidden>-------------------</option>';
                        echo '<option value="' . $rowcategory['SHOP_ID'] . '">' . $rowcategory['NAME'] . '</option>';
                    }
                    echo '</select>';
                    ?><br>
                    <input type="submit" name="Shop-filter" value="Shop Filter">
                </form>
            </div>
            <div class="searchBox">

                <?php 
                if (isset($_POST['searchbtn'])) {
                    $conn = oci_connect('ADMIN', 'Prajwal123#', '//localhost/xe');
                    $search= $_POST['searchtext'];
                    $searchsql= "SELECT * FROM PRODUCT WHERE NAME LIKE '%$search%'";
                    $searchqry = oci_parse($conn,$searchsql);
                    oci_execute($searchqry);
                    while($searchrow= oci_fetch_array($searchqry)){
                        if($searchrow['STATUS']==1){
                        $cate_id= $searchrow['FK_CATEGORY_ID'];
                        $catsql = "SELECT * FROM CATEGORY WHERE CATEGORY_ID='$cate_id'";
                        $catqry = oci_parse($conn, $catsql);
                        oci_execute($catqry);
                        $rowcat = oci_fetch_array($catqry);
                        $cat_name = $rowcat['CATEGORY_NAME'];
                    ?>
                    
                    <div class="product-card">
                        <div class="badge">
                            20% off
                        </div>
                        <table>
                            <tr>
                                <th colspan="3"><?php echo '<a href="../ProductPage/Productdetail.php?id='.$searchrow['PRODUCT_ID'].'"><img src="../Trader/manageProduct/productImage/' . $searchrow['IMAGE'] . '"></a>'; ?></th>
                            </tr>
                        <?php
                        echo '
                            <tr>
                                <td colspan="3">' .$cat_name. '</td>
                            </tr>
                            <tr>
                                <td colspan="3">' . $searchrow['NAME'] . '</td>
                            </tr>
                            <tr>
                                <td colspan="3">';
                        if ($searchrow['STOCK_AVAILABLE'] >= 5) {
                            echo '<i class="fa-solid fa-check fa-xs" style="color: #11e8a1;"></i>&nbsp;Stock Available';
                        } elseif ($searchrow['STOCK_AVAILABLE'] <= 5 && $searchrow['STOCK_AVAILABLE'] >= 1) {
                            echo '<i class="fa-solid fa-exclamation fa-xs" style="color: #e1ff00;"></i> &nbsp;Less Stock Available';
                        } else {
                            echo '<i class="fa-solid fa-x fa-xs" style="color: #ff0000;"></i>&nbsp;No Stock Available';
                        }
                        echo '</td>
                            </tr>
                            <tr>
                                <td>$' . $searchrow['PRICE'] . '</td>
                                <td><button><a href="../wishlist/addToWish.php?id='.$searchrow['PRODUCT_ID'].'"><i class="fa-solid fa-heart" style="color: #012c32;"></i></a></button></td>
                                <td><button>Buy Now</button></td>
                            </tr>
                        </table>';
                        echo '<div class="add-to-cart">
                        <form method="POST" action="../cart/addTo.php?id='.$searchrow['PRODUCT_ID'].'">
                            <button class="cart-btn" name="addCart">Add-To-Cart</button>
                            </form>
                        </div>
                    </div>
                    ';
                    }
                }
                oci_free_statement($searchqry);
                oci_close($conn);

                }elseif(isset($_POST['subSorting'])){
                    $categoryId= $_POST['category'];
                    // $shopId= $_POST['shop'];
                    $fromprice= $_POST['from'];
                    $toprice= $_POST['to'];
                    if(!empty($categoryId) && empty($fromprice) && empty($toprice)){
                        $displayProduct= "SELECT * FROM PRODUCT JOIN CATEGORY ON CATEGORY.CATEGORY_ID=PRODUCT.FK_CATEGORY_ID WHERE PRODUCT.FK_CATEGORY_ID='$categoryId' AND PRODUCT.STATUS='1'";
                        $displayProductquery= oci_parse($conn,$displayProduct);
                        oci_execute($displayProductquery);
                        while($searchrow=oci_fetch_array($displayProductquery)){
                            $cat_name=$searchrow['CATEGORY_NAME'];

                            include("./product-card.php");
                        }
                    }
                    elseif(empty($categoryId) && !empty($fromprice) && !empty($toprice)){
                        $displayProduct= "SELECT * FROM PRODUCT JOIN CATEGORY ON CATEGORY.CATEGORY_ID=PRODUCT.FK_CATEGORY_ID WHERE PRODUCT.STATUS='1' AND PRODUCT.PRICE BETWEEN $fromprice AND $toprice";
                        $displayProductquery= oci_parse($conn,$displayProduct);
                        oci_execute($displayProductquery);
                        while($searchrow=oci_fetch_array($displayProductquery)){
                            $cat_name=$searchrow['CATEGORY_NAME'];

                            include("./product-card.php");
                        }
                    }
                    elseif(!empty($categoryId) && !empty($fromprice) && !empty($toprice)){
                        $displayProduct= "SELECT * FROM PRODUCT JOIN CATEGORY ON CATEGORY.CATEGORY_ID=PRODUCT.FK_CATEGORY_ID WHERE PRODUCT.FK_CATEGORY_ID='$categoryId' AND PRODUCT.STATUS='1' AND PRODUCT.PRICE BETWEEN $fromprice AND $toprice";
                        $displayProductquery= oci_parse($conn,$displayProduct);
                        oci_execute($displayProductquery);
                        while($searchrow=oci_fetch_array($displayProductquery)){
                            $cat_name=$searchrow['CATEGORY_NAME'];

                            include("./product-card.php");
                        }
                    }else{
                        echo "No data found";
                    }
                }elseif(isset($_POST['Shop-filter'])){
                    $shopId= $_POST['shop'];
                    if(!empty($shopId)){
                        $displayProduct= "SELECT * FROM PRODUCT JOIN CATEGORY ON CATEGORY.CATEGORY_ID=PRODUCT.FK_CATEGORY_ID WHERE PRODUCT.	FK_SHOP_ID='$shopId' AND PRODUCT.STATUS='1'";
                        $displayProductquery= oci_parse($conn,$displayProduct);
                        oci_execute($displayProductquery);
                        while($searchrow=oci_fetch_array($displayProductquery)){
                            $cat_name=$searchrow['CATEGORY_NAME'];

                            include("./product-card.php");
                        }
                    }
                }
                else{
                    $conn = oci_connect('ADMIN', 'Prajwal123#', '//localhost/xe');
                    $searchsql= "SELECT * FROM PRODUCT";
                    $searchqry = oci_parse($conn,$searchsql);
                    oci_execute($searchqry);
                    while($searchrow= oci_fetch_array($searchqry)){
                        if($searchrow['STATUS']==1){
                        $cate_id= $searchrow['FK_CATEGORY_ID'];
                        $catsql = "SELECT * FROM CATEGORY WHERE CATEGORY_ID='$cate_id'";
                        $catqry = oci_parse($conn, $catsql);
                        oci_execute($catqry);
                        $rowcat = oci_fetch_array($catqry);
                        $cat_name = $rowcat['CATEGORY_NAME'];
                        
                        include("./product-card.php");
                    
                    
                    }
                }
                oci_free_statement($searchqry);
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
searchPage.php
Displaying searchPage.php.