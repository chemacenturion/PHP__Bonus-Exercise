<!DOCTYPE html>
    <?php
        $conn = new mysqli("localhost","root","","directory_db");

        // write query for all customers
        $sql = "SELECT * FROM customers ORDER BY id";

        // make query and get results
        $result = mysqli_query($conn, $sql);

        // fetch the resulting rows as an array
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

        print_r($customers);
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Bonus Exercise</title>
</head>
<body>
    <h1>customers</h1>
        <div>
            <?php foreach($customers as $customer){ ?>
            <h5><?php echo htmlspecialchars($customer["first_name"]); ?></h5>
        </div>

        <?php } ?>
</body>
</html>