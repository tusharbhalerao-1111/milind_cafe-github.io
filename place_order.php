<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milind_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if(!isset($data["name"]) || !isset($data["item"]) || !isset($data["price"])) {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
    exit();
}

$name = $conn->real_escape_string($data["name"]);
$phone = $conn->real_escape_string($data["phone"] ?? "");
$address = $conn->real_escape_string($data["address"] ?? "");
$item = $conn->real_escape_string($data["item"]);
$qty = intval($data["qty"]);
$price = floatval($data["price"]);

if($qty <= 0 || $price <= 0) {
    echo json_encode(["status" => "error", "message" => "Invalid quantity or price"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_phone, customer_address, item_name, quantity, total_price, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
$stmt->bind_param("sssssd", $name, $phone, $address, $item, $qty, $price);

if($stmt->execute()) {
    echo json_encode([
        "status" => "success", 
        "message" => "Order Placed Successfully!", 
        "order_id" => $conn->insert_id
    ]);
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Failed to place order: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>