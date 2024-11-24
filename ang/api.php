<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1); // Display errors

$conn = new PDO('mysql:host=localhost;dbname=crud_app', 'root', '');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $stmt = $conn->query("SELECT * FROM items");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        // Debugging: Check received data
        if (!$data) {
            echo json_encode(['error' => 'No data received']);
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
        $stmt->execute([$data->name, $data->description]);
        echo json_encode(['id' => $conn->lastInsertId()]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$data->name, $data->description, $data->id]);
        echo json_encode(['updated' => true]);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->execute([$data->id]);
        echo json_encode(['deleted' => true]);
        break;

    default:
        http_response_code(405);
        break;
}

?>