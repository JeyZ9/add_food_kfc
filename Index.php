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

    $sql = 'select * from food';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>

    <table border='1px'>
        <tr>
            <th>รหัสอาหาร</th>
            <th>รายการอาหาร</th>
            <th>ราคา</th>
        </tr>
        <?php while($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td>
                    <?php echo $result["R_ID"]; ?>
            </td>
            <td>
                <a href="Detail.php?R_ID=<?php echo $result['R_ID'] ?>">
                    <?php echo $result["R_name"]; ?>
                </a>
                
            </td>
            <td>
                <?php echo $result["R_many"]; ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>