<!--
    File     : welcomePage.php
    Project  : PROG2001 - Final Project
    P        : Ahmed Almoune
    Date     : 12/7/2024
    Summary  :
        This file is first page in the SET Pizza Shop website. It is a landing page where the user enters their name and proceed to 
        customizing a pizza.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SET Pizza Shop</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link type="image/gif" rel="shortcut icon" href="../Images/pizzaSliceLogo.png" />
        <link rel="stylesheet" href="../Styles/style.css" />
        <script src="../Scripts/script.js" defer></script>
    </head>

    <body>
        <div class="orderingBox">
            <!-- SET header -->
            <div>
                <h1 class="heading">SET Pizza Shop</h1>
            </div>

            <form id="customerDetailsForm" method="post" action="customizePizza.php">
                <!-- enter customer name -->
                <div> 
                    <label class="inputArea" for="customerNameBox">Please enter your name:</label>
                    <input id="customerNameBox" name="customerName" type="text" placeholder="first-name last-name"/>
                    <p id="usageMessage" class="invalidInput"></p>
                </div>

                <!-- submit customer info -->
                <input class="submitButton" type="submit" value="Continue" />
            </form> 
        </div>
    </body>
</html>