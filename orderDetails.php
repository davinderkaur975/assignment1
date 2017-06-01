<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
    <main class=""container>
        <h1>Order Details</h1>
<!--        set action attribute for form-->
        <form method="post" action="saveOrders.php">
<!--        saving the input taken from user    -->
            <fieldset class="form-group">
                <div>
                <label for="firstName" class="col-sm-1">First Name: *</label>
                <input name="firstName" id="firstName" type="text" required placeholder="First Name" />
                </div>
            </fieldset>
            <fieldset class="form-group">
                <div>
                <label for="lastName" class="col-sm-1">Last Name: *</label>
                <input name="lastName" id="lastName" type="text" required placeholder="last name" />
                </div>
            </fieldset>
            <fieldset class="form-group">
                <div>
                <label for="email" class="col-sm-1">Email: *</label>
                <input name="email" id="email" type="email" required placeholder="Email" />
                </div>
            </fieldset>
            <fieldset class="form-group">
                <div>
                <label for="address" class="col-sm-1">Address: *</label>
                <input name="address" id="address" type="text" required placeholder="Address" />
                </div>
            </fieldset>
            <fieldset class="form-group">
                <label for="province" class="col-sm-1">Province: *</label>
                <select name="province" id="province">
            <?php
            //Step 1- connect to the DB
            $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Step 2- create the SQL statement
            $sql = "SELECT * FROM province";
            //Step 3- prepare & execute the SQL statement
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $province = $cmd->fetchAll();
            //Step 4- loop over the results to build the list with <option> </option>
            foreach ($province as $province)
            {

                echo '<option>' . $province['province'] . '</option>';

            }
            //Step 5- disconnect from the database
            $conn = null;

            ?>
              </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="item" class="col-sm-1">Order: *</label>
                <select name="item" id="item">
                    <?php
                    //Step 1- connect to the DB
                    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200361589','gc200361589', 'RUxpI_An__');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //Step 2- create the SQL statement
                    $sql = "SELECT * FROM item";
                    //Step 3- prepare & execute the SQL statement
                    $cmd = $conn->prepare($sql);
                    $cmd->execute();
                    $item = $cmd->fetchAll();
                    //Step 4- loop over the results to build the list with <option> </option>
                    foreach ($item as $item)
                    {

                        echo '<option>' . $item['item'] . '</option>';

                    }
                    //Step 5- disconnect from the database
                    $conn = null;

                    ?>
                </select>
            </fieldset>
            <button class="btn btn-success col-sm-offset-1">Save order</button>
        </form>
    </main>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"> </script>

</html>
