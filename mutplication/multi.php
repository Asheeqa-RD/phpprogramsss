<?php
    if(isset($_POST['number']) && isset($_POST['limit'])){
        $number = intval($_POST['number']);
        $limit = intval($_POST['limit']);  // Access 'limit' from POST data
        $output = "<h3>Multiplication Table for {$number}:</h3><ul>";

        // Loop from 1 to the provided limit
        for($i = 1; $i <= $limit; $i++){
            $result = $number * $i;
            $output .= "<li>{$number} x {$i} = {$result}</li>";
        }

        $output .= "</ul>";
        echo $output;
    }
?>

