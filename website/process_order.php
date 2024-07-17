<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];

    $stmt = $conn->prepare("INSERT INTO orders (address, product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $address, $productName, $productPrice, $productImage);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Method not allowed";
}

$conn->close();
?>
