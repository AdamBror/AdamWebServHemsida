<?php

$servername = "Adam_Server";
$username = "Adam";
$password = "1234";
$dbname = "genetics";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}


$sql = "CREATE TABLE IF NOT EXISTS alleler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
)";
$conn->query($sql);


function insertProduct($name, $description, $price) {
    global $conn;
    $sql = "INSERT INTO alleler (name, description, price) VALUES ('$name', '$description', $price)";
    return $conn->query($sql);
}


function getProducts() {
    global $conn;
    $sql = "SELECT * FROM alleler";
    $result = $conn->query($sql);

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}


$conn->close();
?>
