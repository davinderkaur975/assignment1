<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
    <h1>Orders</h1>
    <a href="orderDetails.php">Add a new order</a>

    <?php
    //Step 1: connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Step 2: create a SQL command
    $sql = "SELECT * FROM orders";

    //Step 3: prepare the SQL command
    $cmd = $conn->prepare($sql);

    //Step 4: execute and store the results
    $cmd->execute();
    $orders = $cmd->fetchAll();
    //Step 5: disconnect from the db
    $conn = null;

    //create a table and display the results
    echo '<table class="table table-striped table-hover">
                <tr><th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Province</th>
                    <th>Order</th></tr>';
    foreach($orders as $order)
    {
        echo '<tr><td>'.$order['firstName'].'</td>
                        <td>'.$order['lastName'].'</td>
                        <td>'.$order['email'].'</td>
                        <td>'.$order['address'].'</td>
                        <td>'.$order['province'].'</td>
                        <td>'.$order['item'].'</td></tr>';
    }
    echo '</table>';
    ?>
</body>
<!--Latest jQuery -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- custom script -->
<script src="js/app.js"></script>
</html>
