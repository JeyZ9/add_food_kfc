<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_GET['R_ID'])){
        $strR_ID = $_GET['R_ID'];
    }
    try{
        require 'Connect.php';
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    $sql = 'SELECT *,N_name from food inner join menu ON menu.N_ID = food.N_ID where R_ID = ?';
    $params = array($strR_ID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table border="1px">
        <tr>
            <th>รหัสอาหาร</th>
            <td>
                <?php echo $result['R_ID'] ?>
            </td>
        </tr>
        <tr>
            <th>ชื่ออาหาร</th>
            <td>
                <?php echo $result['R_name'] ?>
            </td>
        </tr>
        <tr>
            <th>รายละเอียด</th>
            <td>
                <?php echo $result['R_Description'] ?>
            </td>
        </tr>
        <tr>
            <th>เมนู</th>
            <td>
                <?php echo $result['N_name'] ?>
            </td>
        </tr>
        <tr>
            <th>ราคา</th>
            <td>
                <?php echo $result['R_many'] ?>
            </td>
        </tr>
    </table>
</body>
</html>