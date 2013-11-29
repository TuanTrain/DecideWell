<?php
    
    // lets this file read $stock variable from other form
    global $stock;
    
    // formats stock price to 4 decimal points
    number_format($stock["price"], 4);

    // reports stock price
    print("The price for a share of " . $stock["name"] . " (" . $stock["symbol"] . ") is " . $stock["price"] . ".");

?>
