<?php
include 'db.php';
header('Content-Type: application/json');
$stmt = $pdo->query("SELECT patient_name AS title, appointment_date AS start FROM appointments");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($events);
?>