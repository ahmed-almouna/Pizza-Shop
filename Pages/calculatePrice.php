<?php session_start(); ?>
<?php 
    /*
        File     : calculatePrice.php
        Project  : Pizza Shop
        P        : Ahmed Almoune
        Date     : 12/8/2024
        Summary  :
            This file allows hosts the logic needed to calculate the price of the order based on the order details e.g. (pizza size, toppings, etc.). 
    */

    /* handle reuqest */
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);           
    $toppings = $data['toppings'];

    /* array to hold the different toppings offered at the shop and their price */
    $toppingPrices = array(
        "Pepperoni"=>1.50,
        "Mushrooms"=>1.00,
        "Green Olives"=>1.00,
        "Green Peppers"=>1.00,
        "Double Cheese"=>2.25
    );

    $totalCost = 10; //price of a pizza with no extra toppings

    /* update price based on topings selected */
    foreach ($toppings as $topping)
    {
        if (array_key_exists($topping, $toppingPrices))
        {
            $totalCost += $toppingPrices[$topping];
        }
    }

    $_SESSION['totalCost'] = $totalCost;

    /* send response (total cost) */
    echo json_encode(["totalCost" => $totalCost]);
?>

