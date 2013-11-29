<?php

    // configuration
    require("../includes/config.php"); 

    // gets data from user's history of buys and sells
    $historys = query("SELECT * FROM history WHERE id = ? ORDER BY time DESC", $_SESSION["id"]);
    
    // makes sure the user has bought/sold stock already
    if (empty($historys))
    {
        apologize("Go buy some stock!");
    }
    
    // renders history table, passing in the history data
    render("history_form.php", ["historys" => $historys, "title" => "History"]);

?>


