<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
  $stmt = $pdo->prepare("DELETE FROM patients WHERE id = ?");
  $stmt->execute([$id]);
}

header('Location: patients.php');
exit();
?>