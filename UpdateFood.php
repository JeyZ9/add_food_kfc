<?php
    require "Connect.php";
    $sql_select = 'select * from tbl_menu';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <div class="">
        <h1>Create Food</h1>
        <form action="UpdateFood.php" method="POST">
            <div class="">
                <label for="foodID">ID</label>
                <input type="text" placeholder="foodID" name="foodID" id="foodID" />
            </div>

            <div class="">
                <label for="foodName">Name</label>
                <input type="text" placeholder="foodName" name="foodName" id="foodName" />
            </div>

            <div class="">
                <label for="Description">Description</label>
                <input type="text" placeholder="foodDescription" name="foodDescription" id="Description" />
            </div>

            <div class="">
                <label for="Price">Price</label>
                <input type="number" placeholder="foodPrice" name="foodPrice" id="Price"/>
            </div>

            <div class="">
                <label for="MenuID">MenuID</label>
                <!-- <input type="text" placeholder="MenuID" name="MenuID" id="MenuID" /> -->
                <select name='MenuID'>
                    <?php while ($row = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value='<?php echo $row['menuID'] ?>'>
                        <?php echo $row['menuName'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="">
                <button>Submit</button>
            </div>

        </form>
    </div>
</body>
</html>

<?php
try{
    if(isset($_POST["foodID"]) && isset($_POST["foodName"]) && isset($_POST['MenuID'])):
        try{
            require 'Connect.php';
            echo 'Connect Success';
        }catch(Exception $e){
            echo 'Connect Error '.$e->getMessage();
        }

        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tbl_food SET foodName = :foodName, foodDescription = :foodDescription, foodPrice = :foodPrice, MenuID = :MenuID WHERE foodID = :foodID";
        $stmt = $conn -> prepare($sql);
        $stmt -> bindParam(':foodID', $_POST['foodID']);
        $stmt -> bindParam(':foodName', $_POST['foodName']);
        $stmt -> bindParam(':foodDescription', $_POST['foodDescription']);
        $stmt -> bindParam(':foodPrice', $_POST['foodPrice']);
        $stmt -> bindParam(':MenuID', $_POST['MenuID']);
        if ($stmt->execute()) :
            $message = 'Suscessfully add new customer';
        else :
            $message = 'Fail to add new customer';
        endif;
        echo $message;
    
        $conn = null;

    endif;
}catch(PDOException $e) {
    $message = 'Error! = '. $e -> getMessage();
}
?>