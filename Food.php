<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,th,td{
            border: 1px solid;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['foodID'])){
            $strFoodID = $_GET['foodID'];
        }
        try{
            require 'Connect.php';
        }
        catch(Exception $e){
            echo 'Error => '.$e->getMessage().'';
        }

        $sql = 'SELECT *, tbl_menu.menuID From tbl_food
        inner join tbl_menu on tbl_food.MenuID = tbl_menu.menuID
        where foodID = :foodID';
        // $params = array($strCustomerID);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':foodID', $strFoodID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>
                foodID
            </th>
            <td>
                <?php echo $result['foodID'] ?>
            </td>
        </tr>
        <tr>
            <th>
                foodName
            </th>
            <td>
                <?php echo $result['foodName'] ?>
            </td>
        </tr>
        <tr>
            <th>
                foodDescription
            </th>
            <td>
                <?php echo $result['foodDescription'] ?>
            </td>
        </tr>
        <tr>
            <th>
                foodPrice
            </th>
            <td>
                <?php echo $result['foodPrice'] ?>
            </td>
        </tr>
        <tr>
            <th>
                MenuName
            </th>
            <td>
                <?php echo $result['menuName'] ?>
            </td>
        </tr>
    </table>
</body>
</html>