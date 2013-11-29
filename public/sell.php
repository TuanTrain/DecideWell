<?php

    // configuration
    require("../includes/config.php"); 

    

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // makes sure user selects a stock they own
        if (empty($_POST["symbol"]))
        {
            apologize("Please select a stock to sell.");
        }
        
        // looks up stock data on Yahoo
        $stock = lookup($_POST["symbol"]);
        
        // finds how many shares the user have
        $share = query("SELECT shares FROM portfolios WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
            
        // pays user for all their stocks at current market value
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $stock["price"] * $share[0]["shares"], $_SESSION["id"]);
        
        // updates the history table
        query("INSERT INTO history(id, transaction, time, symbol, shares, price) VALUES(?, 'SELL', NOW(), ?, ?, ?)", 
            $_SESSION["id"], $_POST["symbol"], $share[0]["shares"], $stock["price"]);
    
        // removes the stocks from user's portfolio
        query("DELETE FROM portfolios WHERE id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
    
        // redirect to portfolio
        redirect("/");      
       
    }
    
    // if form not yet submitted
    else
    {
        // gets user's stock data
        $stock_datas = query("SELECT symbol FROM portfolios WHERE id = ?", $_SESSION["id"]);
   
        // initialized array for symbols
        $symbols = [];
        
        // gets array of only uppercase symbols of stocks the user own
        foreach ($stock_datas as $stock_data)
        {
            $symbols[] = strtoupper($stock_data["symbol"]);
        }
        
        // render sell stock page, passing in the symbols that the user has to sell
        render("sell_form.php", ["symbols" => $symbols, "title" => "Sell Stock"]);
    }
?>


