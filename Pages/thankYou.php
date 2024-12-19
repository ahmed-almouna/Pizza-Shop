<?php session_start(); ?>
<!--
    File     : thankYou.php
    Project  : PROG2001 - Final Project
    P        : Ahmed Almoune
    Date     : 12/7/2024
    Summary  :
        This file thanks the customer and informs them wether they chose to confim or cancel the order.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thank You</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link type="image/gif" rel="shortcut icon" href="../Images/pizzaSliceLogo.png" />
        <link rel="stylesheet" href="../Styles/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../Scripts/script.js" defer></script>
    </head>

    <body>
       <?php
            /* ensure a customer's name is in the session; otherwise show error message */
            if (isset($_SESSION['customerName']))
            {
                $customerName = $_SESSION['customerName'];
                $customerAction = $_POST['action'];

                unset($_SESSION['customerName']); //clear session variables
            }
            else
            {
                echo '<script type="text/javascript"> window.onload = function() { invalidPageCall(); }; </script>';
            } 
        ?>

        <div class="orderingBox">
            <!-- SET header -->
            <div>
                <h1 class="heading" id="header">SET Pizza Shop</h1>
            </div>


            <!-- thank you message -->
            <div> 
                <P class="inputArea"> Thank you <?php echo $customerName ?>, your order was <?php echo $customerAction ?>ed. </P>
            </div>
        </div>
    </body>
</html>