<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  header('Location: patients.php');
  exit();
}

$stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->execute([$id]);
$patient = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("UPDATE patients SET first_name = ?, last_name = ?, hospital_number = ?, age = ?, diagnosis = ?, diagnosis_other = ?, gender = ? WHERE id = ?");
  $stmt->execute([
    $_POST['first_name'], $_POST['last_name'], $_POST['hospital_number'],
    $_POST['age'], $_POST['diagnosis'], $_POST['diagnosis_other'],
    $_POST['gender'], $id
  ]);
  header('Location: patients.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Patient</title>
  <style>
    body { font-family: Arial; background: #f5f6fa; padding: 40px; }
    form {
      background: white; padding: 30px; max-width: 600px; margin: auto;
      border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, select {
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
  <h2>Edit Patient Record</h2>

  <label>First Name</label>
  <input type="text" name="first_name" value="<?= htmlspecialchars($patient['first_name']) ?>" required>

  <label>Last Name</label>
  <input type="text" name="last_name" value="<?= htmlspecialchars($patient['last_name']) ?>" required>

  <label>Hospital Number</label>
  <input type="text" name="hospital_number" value="<?= htmlspecialchars($patient['hospital_number']) ?>" required>

  <label>Age</label>
  <input type="number" name="age" value="<?= htmlspecialchars($patient['age']) ?>" required>

  <label>Diagnosis</label>
  <input type="text" name="diagnosis" value="<?= htmlspecialchars($patient['diagnosis']) ?>" required>

  <label>Diagnosis (Other)</label>
  <input type="text" name="diagnosis_other" value="<?= htmlspecialchars($patient['diagnosis_other']) ?>">

  <label>Gender</label>
  <select name="gender" required>
    <option value="Male" <?= $patient['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
    <option value="Female" <?= $patient['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
  </select>

  <button type="submit">Update</button>
</form>

</body>
</html>