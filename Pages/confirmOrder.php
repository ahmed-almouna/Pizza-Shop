<?php session_start(); ?>
<!--
    File     : confirmOrder.php
    Project  : Pizza Shop
    P        : Ahmed Almoune
    Date     : 12/7/2024
    Summary  :
        This file shows the customer their order details and allows them to confim or cancel it.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Confirm Order</title>
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
                $customerFirstName = strtok($customerName, ' ');

                if (isset($_SESSION['totalCost']))
                {
                    $totalCost = $_SESSION['totalCost'];
                }

                if (isset($_POST['toppings']))
                {
                    $selectedToppings = $_POST['toppings'];
                }
            }
            else
            {
                echo '<script type="text/javascript"> window.onload = function() { invalidPageCall(); }; </script>';
            } 
        ?>

        <div class="orderingBox">
            <!-- header -->
            <div>
                <h1 class="heading" id="header">Pizza Shop</h1>
            </div>

            <form id="orderConfirmForm" method="post" action="thankYou.php">
                <!-- show order details -->
                <div> 
                    <P class="inputArea"> Ciao <?php echo($customerFirstName) ?>, your order is 1 large pizza. <br><br> </P>

                    <p class="inputArea">Your order's toppings are:</p>
                    <ul>
                        <li>Cheese</li>
                        <li>Souce</li>
                        <?php
                            if (!empty($selectedToppings))
                            {
                                foreach ($selectedToppings as $topping) 
                                {
                                    echo '<li>' . htmlspecialchars($topping) . '</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>

                <!-- show cost -->
                <div> 
                    <p id="cost">Total cost of your order is: <?php echo $totalCost ?>$ </p>
                </div>
                
                <!-- ask for confirmation -->
                <input class="confirmButton" type="submit" value="Confirm" name="action" />
                <input class="cancelButton" type="submit" value="Cancel" name="action" />
            </form> 
        </div>
    </body>
</html>