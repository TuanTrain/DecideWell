<?php

    // configuration
    require("../includes/config.php"); 

    // get arrays with symbols and shares the user owns
    $positions = query("SELECT priority, rank FROM priorities WHERE id = ?", $_SESSION["id"]);
    
    // render portfolio, which makes a table with the stock positions array and the cash amount it is passed
    render("priorities_form.php", ["positions" => $positions, "title" => "Priorities"]);

?>
