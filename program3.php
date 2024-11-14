 <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $hobby = $_POST['hobby'];
        $qualifications = $_POST['qualifications'];
        $experience = $_POST['experience'];

        echo "<div class='bio-data'>";
        echo "<h2>Bio Data</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Age:</strong> $age</p>";
        echo "<p><strong>Date of Birth:</strong> $dob</p>";
        echo "<p><strong>Father's Name:</strong> $father_name</p>";
        echo "<p><strong>Mother's Name:</strong> $mother_name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Hobby:</strong> $hobby</p>";
        echo "<p><strong>Qualifications:</strong> $qualifications</p>";
        echo "<p><strong>Experience:</strong> $experience</p>";
        echo "</div>";
    }
    ?>