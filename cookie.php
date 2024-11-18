<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Visited</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .center {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="center">
        <?php
            if(isset($_COOKIE['lastVisit']))
                echo "Last visited on ".$_COOKIE['lastVisit'];
            else
                echo "First Visit";

            $lastVisit = date("Y-m-d H:i:s");
            setcookie("lastVisit", $lastVisit, time() + 60*60*24);
        ?>
    </div>
</body>
</html>
