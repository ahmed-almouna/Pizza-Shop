<?php session_start(); ?>
<!--
    File     : customizePizza.php
    Project  : Pizza Shop
    P        : Ahmed Almoune
    Date     : 12/7/2024
    Summary  :
        This page allows the customer to cutomize the pizza. It shows the pizzas and toppings a customer can select, and adjusts the order 
        and cost accordingly.
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customize Order</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link type="image/gif" rel="shortcut icon" href="../Images/pizzaSliceLogo.png" />
        <link rel="stylesheet" href="../Styles/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../Scripts/script.js" defer></script>
    </head>

    <body>
       <?php
            /* ensure a customer's name is provided; otherwise show error */
            if (isset($_POST['customerName']))
            {
                /* add name to a session variable and seperate first and last name */
                $customerName = $_POST['customerName'];
                $customerFirstName = strtok($customerName, ' ');
                $_SESSION['customerName'] = $customerName;
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

            <form id="pizzaOrderForm" method="post" action="confirmOrder.php">
                <!-- customize order -->
                <div> 
                    <P class="inputArea"> Ciao <?php echo($customerFirstName) ?>, your order is: 1 large pizza with cheese and souce 
                    (our only menu item). <br><br> </P>

                    <p class="inputArea">Choose more toppings:</p>
                    <ul class="toppingsList">
                        <li class="toppingItems"><input type="checkbox" name="toppings[]" value="Pepperoni"/>Pepperoni</li>
                        <li class="toppingItems"><input type="checkbox" name="toppings[]" value="Mushrooms"/>Mushrooms</li>
                        <li class="toppingItems"><input type="checkbox" name="toppings[]" value="Green Olives"/>Green Olives</li>
                        <li class="toppingItems"><input type="checkbox" name="toppings[]" value="Green Peppers"/>Green Peppers</li>
                        <li class="toppingItems"><input type="checkbox" name="toppings[]" value="Double Cheese"/>Double Cheese</li>
                    </ul>
                </div>

                <!-- show cost -->
                <div> 
                    <p id="cost" class="costArea">Total cost: 10$</p>
                </div>
                
                <!-- submit order details -->
                <input class="submitButton" type="submit" value="Make It!" id="" />
            </form> 
        </div>
    </body>
</html>