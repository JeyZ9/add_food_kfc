<?php
$serverName = 'localhost';
$userName = 'root';
$userPassword = '';
$dbname = 'kfc2';

try {
    $conn = new PDO(
        "mysql:host=$serverName;dbname=$dbname",
        $userName, $userPassword
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'You are now connected to the database!';

} catch (PDOException $e) {
    echo 'Sorry! You cannot connect to the database: ' . $e->getMessage();
}
?>