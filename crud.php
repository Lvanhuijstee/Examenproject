<?php
session_start();
include('database.php');
header('Content-Type: application/json');

// Get the request data
$data = json_decode(file_get_contents('php://input'), true);

$table = $data['table'];
$operation = $data['operation'];
$id = $data['id'];
$recordData = $data['data'] ?? null;

// Only allow specific tables for security
$allowedTables = ['klant', 'adres']; // Add more tables as needed
if (!in_array($table, $allowedTables)) {
    die(json_encode("Invalid table name"));
}

switch ($operation) {
    case 'update':
        // Update record
        $sql = "UPDATE $table SET ";
        $updates = [];
        foreach ($recordData as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $sql .= implode(", ", $updates);
        $sql .= " WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode("Record updated successfully");
        } else {
            echo json_encode("Error updating record: " . $conn->error);
        }
        break;

    case 'delete':
        $tables = json_decode($data['table'], true);
        $allowedTables = ['klant', 'adres']; // Define allowed tables here

        // Single foreach loop (removed duplicate)
        foreach ($tables as $table) {
            if (!in_array($table, $allowedTables)) {
                echo json_encode("Invalid table name: $table");
                continue; // Skip invalid tables
            }

            $sql = "DELETE FROM $table WHERE id = $id OR klant_id = $id";

            if ($conn->query($sql) === TRUE) {
                echo json_encode("Record deleted from $table successfully");
            } else {
                echo json_encode("Error deleting record from $table: " . $conn->error);
            }
        }
        break;

    default:
        echo json_encode("Invalid operation");
        break;
}
