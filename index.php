<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
    <title>PHP Bonus Exercise</title>
    <link rel="stylesheet" href="./assets/styles.css"/>
</head>
<body>
    <nav class="nav__container">
        <h1>Name Search with PHP and MySQL</h1>
    </nav>
    <div>
        <div class="container__assignment">
            <div class="container__assignment-text">
                <h2>Exercise</h2>
                <p>Build a search page that allows a user to search by first name or last name from the mockdata.sql file and returns the intended results.</p>
                <h3>Expected Outcomes</h3>
                <p>Input: Kyle => Output: Kyle Smith Baton Rouge LA Kyle Bonehill Baton Rouge LA</p>
                <p>Input: Ivashov => Output: Lorri Ivashov San Francisco CA Steve Ivashov San Francisco CA</p>
                <p>Input: Ewen => Output: Ewen Dike Phoenix AZ Steven Ewen Phoenix AZ</p>
            </div>
        </div>
        <div class="container__search">
            <form class="container__search-form" action="" method="post">
                Search: <input type="text" placeholder="Search Names Here" name="search">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div class="container__results">
            <?php
                if (isset($_POST["submit"])) {
                $searchValue = $_POST["search"];
                $conn = new mysqli("localhost","root","","directory_db");
                    if ($conn->connect_error){
                        echo "Connection failed: ". $conn->connect_error;
                    } else {

                        $sql = "SELECT * FROM customers WHERE first_name LIKE '%$searchValue%' OR last_name LIKE '%$searchValue%'";

                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo $row['first_name'] . "&nbsp" . $row['last_name'] . "&nbsp" . $row['city'] . "&nbsp" . $row['state'] . "<br>";
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>