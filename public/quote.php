<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure user provides a stock symbol
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        
        // looks up the requested stock
        $stock = lookup($_POST["symbol"]);
        
        // make sure user provides a real stock sybol
        if ($stock == false)
        {
            apologize("You must provide a valid stock symbol.");
        }
        
        // render stock info form 
        render("quote.php", ["title" => "Quote"], $stock["price"]);
        
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Get A Quote"]);
    }

?>
