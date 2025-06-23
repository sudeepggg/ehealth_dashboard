<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  header('Location: applications.php');
  exit();
}

$stmt = $pdo->prepare("SELECT * FROM applications WHERE id = ?");
$stmt->execute([$id]);
$app = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("UPDATE applications SET applicant_name=?, position=?, email=?, phone=?, message=? WHERE id=?");
  $stmt->execute([
    $_POST['applicant_name'],
    $_POST['position'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['message'],
    $id
  ]);
  header('Location: applications.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Application</title>
  <style>
    body { font-family: Arial; background: #f5f6fa; padding: 40px; }
    form {
      background: white; padding: 30px; max-width: 600px; margin: auto;
      border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, textarea {
      width: 100%; padding: 10px; margin-top: 5px;
      border: 1px solid #ccc; border-radius: 5px;
    }
    button {
      margin-top: 20px; padding: 12px 20px; background: #2980b9; color: white;
      border: none; border-radius: 5px; cursor: pointer;
    }
  </style>
</head>
<body>

<form method="POST">
  <h2>Edit Application</h2>

  <label>Applicant Name</label>
  <input type="text" name="applicant_name" value="<?= htmlspecialchars($app['applicant_name']) ?>" required>

  <label>Position</label>
  <input type="text" name="position" value="<?= htmlspecialchars($app['position']) ?>" required>

  <label>Email</label>
  <input type="email" name="email" value="<?= $app['email'] ?>" required>

  <label>Phone</label>
  <input type="text" name="phone" value="<?= $app['phone'] ?>" required>

  <label>Message</label>
  <textarea name="message" rows="4"><?= htmlspecialchars($app['message']) ?></textarea>

  <button type="submit">Update</button>
</form>

</body>
</html>