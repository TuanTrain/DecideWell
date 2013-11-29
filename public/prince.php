<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // makes sure user give a positve value
        if($_POST["amount"] <= 0)
        {
            apologize("The Nigerian Prince scoffs at your request");
        }
    
        // adds wanted cash to user's current cash
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);
        
        // redirect to portfolio
        redirect("/");
    }
    
    else
    {
        // else render form
        render("prince_form.php", ["title" => "Nigerian Bank Account"]);
    }

?>
