<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Bonus Exercise</title>
    <link rel="stylesheet" href="./assets/styles.css"/>
</head>
<body>
    <h1>Name Search with PHP and MySQL</h1>
    <div>
        <div id="container">
            <form action="" method="post">
                Search: <input type="text" placeholder="Search" name="search">
                <input type="submit" name="submit" value="search">
            </form>
        </div>
</div>
</body>
</html>

<?php
        if (isset($_POST["submit"])) {
        $searchValue = $_POST["search"];
        $conn = new mysqli("localhost","root","","directory_db");
        if ($conn->connect_error){
            echo "Connection failed: ". $conn->connect_error;
        } else {

        $sql = "SELECT * FROM customers WHERE first_name OR last_name LIKE '%$searchValue%'";

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['first_name'] . "&nbsp" . $row['last_name'] . "<br>";
        }
        }
    }
?>