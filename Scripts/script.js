/*
    File     : script.js
    Project  : PROG2001 - Final Project
    P        : Ahmed Almoune
    Date     : 12/7/2024
    Summary  :
        This is the JavaScript file containing all of the clien-side code thats's needed for the SET Pizza Shop.
*/

//-----------------------------------------------------------------------------------------------------------------------------------global

/* constants */
const customerDetailsForm = document.getElementById('customerDetailsForm');
const toppingsList = document.querySelectorAll('input[type="checkbox"]');


window.addEventListener('load', addEventListeners); //ensure the page is fully loaded before adding evet listeners
/*
    Method  : addEventListeners()
    Summary : this method adds all the event listeners needed.
*/
function addEventListeners() 
{
    if (document.title === "SET Pizza Shop") //page 1
    {
        customerDetailsForm.addEventListener('submit', validateCustomerDetailsForm);
    }
    else if (document.title === "Customize Order") //page 2
    {
        toppingsList.forEach(function(topping)
        {
            topping.addEventListener('change', calculateTotalCost)
        });
    }
}

//-----------------------------------------------------------------------------------------------------------------------------------page-1

/*
    Method  : validateCustomerDetailsForm()
    Summary : this method validates that the customer name is in the correct format.
    Params  : 
        event = the event that called this function.
*/
function validateCustomerDetailsForm(event) 
{
    document.getElementById('usageMessage').textContent = ""; //clear usage message 
    let customerName = document.getElementById('customerNameBox').value;

    let validName = new RegExp("^([A-Z]|[a-z])+ ([A-Z]|[a-z])+$"); //this regex accepts the format <firstname> <lastname> with no spaces in
                                                                   //the names. It's very strict in that regard

    if (!validName.test(customerName))
    {
        document.getElementById('usageMessage').textContent = "Invalid format, please enter first-name, last-name seperated by a space.";
        event.preventDefault();
    }
}

//-----------------------------------------------------------------------------------------------------------------------------------page-2

/*
    Method  : invalidPageCall()
    Summary : this method is called when the page was called inccorectly. it prevents php errors.
*/
function invalidPageCall()
{
    document.querySelectorAll('h1, p, input, ul').forEach(function(element)
    {
       element.style.display="none";
    });

    document.querySelector('p').style.display="block";
    document.querySelector('p').textContent = "Pleace go through welcomePage.php first.";
}

/*
    Method  : calculateTotalCost()
    Summary : this method is called whenever the order is customized (e.g. new topping added); it makes a call to the server to retreive the 
    new price and updates the page accordingly.
*/
function calculateTotalCost()
{
    /* keep track of toppings selected by the customer */
    let selectedToppings = [];
    toppingsList.forEach(function(topping)
    {
        if (topping.checked)
        {
            selectedToppings.push(topping.value);
        }
    });


    let reuqest = {
        toppings: selectedToppings
    }

    /* make the call to the server */
    $.ajax({
        type:         "POST",
        url:          "calculatePrice.php",
        data:         JSON.stringify(reuqest),
        contentType:  "application/json; charset=utf-8",
        dataType:     "json",
        success: function (response) 
        {
            document.getElementById('cost').textContent = `Total cost: ${response.totalCost}$`;
        },
        error: function (xhr, status, error) 
        {
            console.error("Error: " + error);
        }
    });
}