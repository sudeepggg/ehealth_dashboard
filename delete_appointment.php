<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
  $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
  $stmt->execute([$id]);
}

header('Location: appointments.php');
exit();
?>