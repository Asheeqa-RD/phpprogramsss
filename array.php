<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Array Operations</h1>
        <form method="post">
            <input type="radio" name="choice" value="display"> Display Array<br />
            <input type="radio" name="choice" value="sort"> Sorted Array<br />
            <input type="radio" name="choice" value="dupli"> Without Duplicate<br />
            <input type="radio" name="choice" value="pop"> Delete Last<br />
            <input type="radio" name="choice" value="rev"> Array Reverse<br />
            <input type="radio" name="choice" value="search"> Array Search<br /><br />
            <input type="text" name="searchTerm" placeholder="Enter name to search" /><br /><br />
            <input type="submit">
        </form>

        <?php
        if ($_POST) {
            $names = array('Aswin', 'Arjun', 'Manu', 'Arjun', 'Dravid', 'Binu', 'Aswin', 'Manuel', 'Eren');
            $val = $_POST['choice'];

            function displayArray($array) {
                foreach ($array as $index => $value) {
                    echo "<br>" . ($index + 1) . ". " . htmlspecialchars($value);
                }
            }

            switch ($val) {
                case "display":
                    displayArray($names);
                    break;
                case "sort":
                    sort($names);
                    displayArray($names);
                    break;
                case "dupli":
                    $uarray = array_unique($names);
                    displayArray($uarray);
                    break;
                case "pop":
                    array_pop($names);
                    displayArray($names);
                    break;
                case "rev":
                    $revarr = array_reverse($names);
                    displayArray($revarr);
                    break;
                case "search":
                    $searchTerm = trim($_POST['searchTerm']);
                    $position = array_search($searchTerm, $names, true);
                    if ($position !== false) {
                        echo "<br/><br/>Position of '{$searchTerm}': " . ($position + 1);
                    } else {
                        echo "<br/><br/>Name not found";
                    }
                    break;
            }
        }
        ?>
    </div>
</body>
</html>
