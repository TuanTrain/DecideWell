<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure user provides username
        if (empty($_POST["Priority1"]) && empty($_POST["Priority2"]) && empty($_POST["Priority3"])
            && empty($_POST["Priority4"]) && empty($_POST["Priority5"]))
        {
            apologize("Please provide at least one priority");
        }
        
        for ($i=1; $i<=5; $i++)
        {
            if (!empty($_POST["Priority$i"]))
            {
                // remove old priority of this rank
                query("DELETE FROM priorities WHERE id = ? AND rank = $i", $_SESSION["id"]);
                
                // creates a row for the priority in the priority SQL table
                $result = query("INSERT INTO priorities (id, priority, rank) VALUES(?, ?, $i)", $_SESSION["id"], $_POST["Priority$i"]);
                
                // make sure SQL update was completed
                if ($result === false)
                {
                    apologize("An error occured. Please try again");
                }
            }
        }
        redirect("priorities.php");
        
    }
    else
    {
        // else render form
        render("registration_form.php", ["title" => "Registration"]);
    }

?>
