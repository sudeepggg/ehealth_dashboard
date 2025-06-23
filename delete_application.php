<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
  $stmt = $pdo->prepare("DELETE FROM applications WHERE id = ?");
  $stmt->execute([$id]);
}

header('Location: applications.php');
exit();
?>