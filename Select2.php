<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    try{
        require 'Connect.php';
    }
    catch(Exception $e){
        throw new Exception($e->getMessage());
    }

    $sql = 'SELECT tbl_orders_detail.OrderID, tbl_customer.firstName,tbl_customer.customerID, tbl_orders.dates,tbl_food.foodID, tbl_food.foodName, tbl_menu.menuName, tbl_orders_detail.quantity FROM tbl_orders_detail
            inner join tbl_orders on tbl_orders_detail.OrderID = tbl_orders.orderID
            inner join tbl_food on tbl_orders_detail.foodID = tbl_food.foodID
            inner join tbl_menu on tbl_food.MenuID = tbl_menu.menuID
            inner join tbl_customer on tbl_orders.customerID = tbl_orders.customerID
            Order By firstName DESC';
    $stmt = $conn->prepare($sql);
    // echo $stmt;
    $stmt->execute();
?>

    <table border='1px'>
        <tr>
            <th>OrderID</th>
            <th>firstName</th>
            <th>dates</th>
            <th>foodName</th>
            <th>menuName</th>
            <th>quantity</th>
        </tr>
        <?php while($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td>
                <?php echo $result["OrderID"]; ?>
            </td>
            <td>
                <a class="" href='Customer.php?customerID=<?php echo $result['customerID']?>'>
                    <?php echo $result["firstName"]; ?>
                </a>
            </td>
            <td>
                <?php echo $result["dates"]; ?>
            </td>
            <td>
                <a href="Food.php?foodID=<?php echo $result['foodID'] ?>">
                    <?php echo $result["foodName"]; ?>
                </a>
            </td>
            <td>
                <?php echo $result["menuName"]; ?>
            </td>
            <td>
                <?php echo $result["quantity"]; ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>