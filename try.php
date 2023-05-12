<?php
 $conn = oci_connect('HUDDERSFAXMART1', 'Sishir_12345', '//localhost/xe');
 $SQLI = "SELECT * FROM PRODUCT";
 $queeryok = oci_parse($conn, $SQLI); //Check whether shop is there or not
 oci_execute($queeryok);



 while ($value = oci_fetch_array($queeryok)){
    // $product_name = $value['PRODUCT_NAME'];


echo '
<div class="featured-products">
            <div class="card">
                <img src="images/lettuce.jpg" alt="crossiant-img" style="width:100%">
                <div class="in-stock flex-verticle">
                    <h6><B>Healthy vegetable
                            pvt.ltd</B> </h6>
                    <p class="instock-text"> In Stock </p>
                </div>
                <h6>'.$value['PRODUCT_NAME'].'</h6>
                <p class="price">$Price : $2 &nbsp;&nbsp;&nbsp;<S>$3.30</S></p>
                <p>Fresh lettuce in the town</p>
                <div class="flex-verticle">
                    <button class="btn btn1">Add to cart</button>
                    <p class="addtocart-icon"><a href="#"><i class="fa-regular fa-heart black"></i></a></p>
                </div>
            </div>
        </div>
        ';
      }

        ?>