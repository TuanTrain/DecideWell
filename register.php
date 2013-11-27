<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure user provides username
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        
        // make sure user provides password
        if (empty($_POST["password"]))
        {
            apologize("You must create a password.");
        }
        
        // make sure user provides password confirmation
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Make sure your passwords match.");
        }
        
        // creates a row for the user in the users SQL table
        $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        
        // make sure SQL update was completed
        if ($result === false)
        {
            apologize("Your username is taken!");
        }
        
        // logs user in automatically upon successful registration
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        redirect("/");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register for an account"]);
    }

?>
