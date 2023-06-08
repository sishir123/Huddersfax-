<?php
include('../session.php');
include('./session-admin.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Huddersfax Mart</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="../Css/style.css" />
    <link rel="stylesheet" href="../Css/trader.css">

    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&family=Ubuntu&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />



    <!-- Inner css -->

    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        body {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            background: #FFE799;

        }

        a {
            text-decoration: none;
            color: black;
            font-size: 22px;
        }
        a:hover {
  color: #013220;
  text-decoration: none;
}

i{
    color: #013220;
  }
  .list-group {
      /* background: rgba(71, 147, 227, 1);
       */
      background: #FFE799;
      height: 100vh;
      margin-top: 5%;

    }

    .list-group-item {
      background: rgba(71, 147, 227, 1);
      border: none;
      height: 70px;
      text-decoration: none;
    }

  a {
      text-decoration: none;
      padding-left: 5px;
      color: #000;
    }
    a:hover{
      font-weight: bold;
      padding-left: 5px;
      text-decoration: none;
    }

        .table {
            height: 300px;
            width: 300px;
            margin-left: 30rem;
        }

        h1 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: black;
            padding: 30px 0;
            font-weight:bolder;
        }

       </style>

</head>

<body>

    <!-- Navbar -->

    <nav>
        <a href="./admin-dash.php"><img src="../images/logo.png" alt="logo" class="logo"></a>
        <ol>
            <li>
                <a href="./Edit profile/admin-edit-profile.php" class="Hover-btn"><i class="fa-solid fa-user"></i> Edit profile</a>
            </li>
            <li>
                <a href="Login/login.php" class="Hover-btn"><i class="fa-solid fa-user"></i> View Profile</a>
            </li>

            <li>
                <a href="../logout.php" class="Hover-btn"><i class="fa-solid fa-arrow-left"></i></i> Logout</a>
            </li>

        </ol>
    </nav>

    <!-- Dashboard -->

    <div class="container">
        <div class="title">
            <h1>Huddersfax Mart Admin Dashboard</h1>
        </div>

        <!-- Side nav -->

        <ul class="list-group">
            <li class="btn btn1"><i class="fa-solid fa-person"></i> <a href="./monitor-customer.php">Monitor Customer</a></li>
            <li class="btn btn1"><i class="fa-solid fa-star"></i> <a href="./monitor-reviews.php">Monitor Reviews</a></li>
            <li class="btn btn1"><i class="fa-solid fa-cube"></i> <a href="./manage-prod-admin.php"> Manage Products</a></li>
            <li class="btn btn1"><i class="fa-solid fa-shop"></i> <a href="./manage-shop.php"> Manage Shops</a></li>
            <li class="btn btn1"><i class="fa-solid fa-person"></i> <a href="./Manage-traders.php"> Manage Traders</a></li>
            <li class="btn btn1"><i class="fa-solid fa-chart-simple"></i> <a href="http://localhost:8080/apex/f?p=102:LOGIN_DESKTOP:9824985360032:::::">Generate Reports </li>
        </ul>
    </div>
</body>

</html>