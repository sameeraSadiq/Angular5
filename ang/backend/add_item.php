<?php
header('Content-Type: application/json');

$servername = "localhost"; // Database server
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "crud_app"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the posted data
$data = json_decode(file_get_contents("php://input"), true);

// Debugging: Log received data
if (is_null($data)) {
    echo json_encode(['error' => 'No data received or invalid JSON']);
    exit;
}

// Check if expected fields are set
$name = isset($data['name']) ? $data['name'] : null;
$description = isset($data['description']) ? $data['description'] : null;

// Debugging: Log extracted values
if ($name === null || $description === null) {
    echo json_encode(['error' => 'Missing name or description']);
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $description);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'id' => $stmt->insert_id]); // Return success response
} else {
    echo json_encode(['error' => 'Error: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>