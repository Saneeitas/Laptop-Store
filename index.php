<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Nunito+Sans" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>The Laptop Store!</title>

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }

        html {
            font-size: 62.5%;
            box-sizing: border-box;
        }

        body {
            padding: 6rem 4rem 10rem;
            line-height: 1.7;
            font-family: "Nunito Sans", sans-serif;
            color: #555;
            min-height: 100vh;
            background: linear-gradient(to bottom right, #67b26f, #4ca2cd);
        }

        h1 {
            font-family: "Bungee Inline", sans-serif;
            font-weight: 400;
            font-size: 6rem;
            color: white;
            transform: skewY(-5deg);
            margin-bottom: 6rem;
            text-align: center;
            position: relative;
            word-spacing: 3px;
        }

        h1::before {
            content: '';
            display: block;
            height: 65%;
            width: 58%;
            position: absolute;
            top: 105%;
            left: 50%;
            background: linear-gradient(to bottom, #67b26f, #4ca2cd);
            opacity: .8;
            z-index: -1;
            transform: skewY(370deg) translate(-50%, -50%);
        }

        .container {
            width: 110rem;
            margin: 0 auto;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 6rem;
        }

        .card {
            background: white;
            box-shadow: 0 3rem 6rem 1rem rgba(0, 0, 0, 0.25);
        }

        .card__hero {
            position: relative;
        }

        .card__hero::before {
            content: '';
            display: block;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-image: linear-gradient(to right bottom, #67b26f, #4ca2cd);
            opacity: .3;
        }

        .card__img {
            width: 100%;
            display: block;
        }

        .card__name {
            background: linear-gradient(to right, #67b26f, #4ca2cd);
            padding: 1.3rem .8rem;
            font-family: "Bungee Inline", sans-serif;
            font-weight: 400;
            font-size: 2rem;
            color: white;
            margin-bottom: 2rem;
            text-align: center;
            word-spacing: 1px;
        }

        .card__detail {
            font-size: 1.6rem;
            padding: 1.5rem 3rem;
            display: flex;
            align-items: center;
        }

        .card__detail:first-of-type {
            border-bottom: 1px solid #eee;
        }

        .card__footer {
            display: flex;
            margin-top: 1.5rem;
        }

        .card__price {
            flex: 0 0 50%;
            background-color: #eee;
            border-top: 1px solid #e1e1e1;
            padding: 1.25rem;
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
        }

        .card__link:link,
        .card__link:visited {
            flex: 0 0 50%;
            background-color: #5aaa9d;
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            padding: 1.25rem 1rem;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .3s;
        }

        .card__link:hover,
        .card__link:active {
            background-color: #67b26f;
        }

        .emoji-left {
            font-size: 2rem;
            margin-right: 1rem;
        }

        .emoji-right {
            font-size: 2rem;
            margin-left: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>The Laptop Store!</h1>
        <?php
            //displaying the products from database
            $sql = "SELECT * FROM products ORDER BY id DESC";
            $query = mysqli_query($connection,$sql);
            while($result = mysqli_fetch_assoc($query)) { 
            //Looping through the col for multiples product
        ?>
        <div class="cards-container">
        <?php
         $id = $result["id"]; 
         $sql2 = "SELECT * FROM products WHERE id = '$id'";
         $query2 = mysqli_query($connection,$sql2);
         $result2 = mysqli_fetch_assoc($query2)
        ?>
            <figure class="card" style="width: 300px;">
                <div class="card__hero">
                    <img src="<?php echo $result["image"]; ?>" alt="" class="card__img">
                </div>
                <h2 class="card__name"><?php echo $result["productName"]; ?></h2>
                <p class="card__detail"><span class="emoji-left">🖥</span><?php echo $result["screen"]; ?></p>
                <p class="card__detail"><span class="emoji-left">🧮</span> <?php echo $result["cpu"]; ?></p>
                <div class="card__footer">
                    <p class="card__price">$<?php echo $result["price"]; ?></p>
                    <a href="view-product.php?<?php $id ?>=<?php echo $result["id"]; ?>" class="card__link">Check it out <?php echo $id ?><span class="emoji-right">👉</span></a>
                </div>
            </figure>
       <?php
        }
    ?>
 </div> 
</div>
</body>

</html>