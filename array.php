<html>
<body>
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
        $names = array('Aswin', 'Arjun','Manu', 'Arjun', 'Dravid', 'Binu', 'Aswin', 'Manuel', 'Eren');
        $val = $_POST['choice'];

        switch ($val) {
            case "display":
                foreach ($names as $name)
                    echo "<br>" . htmlspecialchars($name);
                break;
            case "sort":
                sort($names);
                foreach ($names as $name)
                    echo "<br>" . htmlspecialchars($name);
                break;
            case "dupli":
                $uarray = array_unique($names);
                foreach ($uarray as $value)
                    echo "<br>" . htmlspecialchars($value);
                break;
            case "pop":
                array_pop($names);
                foreach ($names as $name)
                    echo "<br>" . htmlspecialchars($name);
                break;
            case "rev":
                $revarr = array_reverse($names);
                foreach ($revarr as $value)
                    echo "<br>" . htmlspecialchars($value);
                break;
            case "search":
                $searchTerm = trim($_POST['searchTerm']);
                $position = array_search($searchTerm, $names, true);
                if ($position !== false) {
                    echo "<br/><br/>Position of '{$searchTerm}': " . $position;
                } else {
                    echo "<br/><br/> name not found";
                }
                break;
        }
    }
    ?>
</body>
</html>