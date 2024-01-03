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
        if(isset($_GET['customerID'])){
            $strCustomerID = $_GET['customerID'];
        }
        try{
            require 'Connect.php';
        }
        catch(Exception $e){
            echo 'Error => '.$e->getMessage().'';
        }

        $sql = 'SELECT * From tbl_customer where customerID = :customerID';
        // $params = array($strCustomerID);
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customerID', $strCustomerID);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>
                CustomerID
            </th>
            <td>
                <?php echo $result['customerID'] ?>
            </td>
        </tr>
        <tr>
            <th>
                firstName
            </th>
            <td>
                <?php echo $result['firstName'] ?>
            </td>
        </tr>
        <tr>
            <th>
                surName
            </th>
            <td>
                <?php echo $result['surname'] ?>
            </td>
        </tr>
        <tr>
            <th>
                subDistrict
            </th>
            <td>
                <?php echo $result['subDistrict'] ?>
            </td>
        </tr>
        <tr>
            <th>
                district
            </th>
            <td>
                <?php echo $result['district'] ?>
            </td>
        </tr>
        <tr>
            <th>
                province
            </th>
            <td>
                <?php echo $result['province'] ?>
            </td>
        </tr>
        <tr>
            <th>
                zipCode
            </th>
            <td>
                <?php echo $result['zipcode'] ?>
            </td>
        </tr>
    </table>
</body>
</html>