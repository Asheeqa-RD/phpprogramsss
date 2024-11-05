<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Visited</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['lastVisit']))
            echo "Last visited on ".$_COOKIE['lastVisit'];
        else
            echo "First Visit";

        $lastVisit = date("Y-m-d H:i:s");
        setcookie("lastVisit", $lastVisit, time() + 60*60*24)
    ?>
</body>
</html>