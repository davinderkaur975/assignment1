<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Orders....</title>
</head>
<body>
<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $item = $_POST['item'];


echo 'firstNmae: '.$firstName.'<br />';
    echo 'lastName: '.$lastName.'<br />';
    echo 'email: '.$email.'<br />';

    //Step 1: Connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Step 2: create the SQL command to INSERT a record
        $sql = "INSERT INTO orders (firstName, lastName, email, address, province, item) 
                VALUES (:firstName,:lastName,:email, :address, :province, :item);";

//Step 3: Prepare the SQL command and bind the arguments to prevent SQL injection
$cmd = $conn->prepare($sql);
$cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 30);
$cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 30);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
$cmd->bindParam(':address', $address, PDO::PARAM_STR, 40);
$cmd->bindParam(':province', $province, PDO::PARAM_STR, 30);
$cmd->bindParam(':item', $item, PDO::PARAM_STR, 30);


//Step 4: execute
$cmd->execute();

//Step 5: disconnec
//t from the database
$conn = null;

//Step 6: redirect to the albums page
header('location:orders.php');

?>

</body>
</html>
