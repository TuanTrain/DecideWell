<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // makes sure shares the user input is a positive int
        if (!preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("You must provide a valid share amount.");
        }
    
        // makes sure the user input a symbol
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        
        // looks up stock data from Yahoo
        $stock = lookup($_POST["symbol"]);
        
        // gets user's cash amount
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // makes sure user has enough money to buy the requested stock
        if ($stock["price"] * $_POST["shares"] >= $cash[0]["cash"])
        {
            apologize("You do not have enough funds to buy this stock.");
        }
        
        // adds the stock shares to the user's portfolio
        query("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
            $_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
        
        // charges the user for the shares
        query("UPDATE users SET cash = cash - ? WHERE id = ?", $stock["price"] * $_POST["shares"], $_SESSION["id"]);
        
        // updates the history table
        query("INSERT INTO history(id, transaction, time, symbol, shares, price) VALUES(?, 'BUY', NOW(), ?, ?, ?)", 
            $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"]);
        
        // redirect to portfolio
        redirect("/");
    }
    
    else
    {
        // else render form
        render("buy_form.php", ["title" => "Buy Stock"]);
    }

?>
