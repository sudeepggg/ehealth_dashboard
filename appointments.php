<?php
include 'db.php';
$appointments = $pdo->query("SELECT * FROM appointments ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointments</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f5f6fa;
      display: flex;
    }

    .sidebar {
      width: 220px;
      background: #2f3542;
      color: white;
      padding: 20px;
      height: 100vh;
    }

    .sidebar h2 {
      color: #f0932b;
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin-bottom: 15px;
    }

    .sidebar ul li a {
      background: #57606f;
      color: white;
      display: block;
      padding: 10px;
      border-radius: 5px;
      text-decoration: none;
    }

    .sidebar ul li a:hover {
      background: #747d8c;
    }

    .main {
      flex-grow: 1;
      padding: 40px;
    }

    .main h1 {
      color: #2f3542;
    }

    a.button {
      display: inline-block;
      background: #f97316;
      color: white;
      padding: 10px 16px;
      text-decoration: none;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }

    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }

    th {
      background: #f1f2f6;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    .action-buttons a {
      margin-right: 10px;
      text-decoration: none;
      font-weight: bold;
    }

    .edit {
      color: #2980b9;
    }

    .delete {
      color: #e74c3c;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>eHEALTH</h2>
    <ul>
      <li><a href="dashboard.php">🏠 Dashboard</a></li>
      <li><a href="patients.php">🧑‍⚕️ Patients</a></li>
      <li><a href="appointments.php">📅 Appointments</a></li>
      <li><a href="applications.php">📄 Applications</a></li>
    </ul>
  </div>

  <div class="main">
    <h1>Appointments</h1>
    <a class="button" href="add_appointment.php">+ Add Appointment</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Date</th>
          <th>Time</th>
          <th>Symptoms</th>
          <th>Age</th>
          <th>Doctor</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($appointments as $a): ?>
        <tr>
          <td><?= $a['id'] ?></td>
          <td><?= htmlspecialchars($a['patient_name']) ?></td>
          <td><?= $a['phone'] ?></td>
          <td><?= $a['email'] ?></td>
          <td><?= $a['gender'] ?></td>
          <td><?= $a['appointment_date'] ?></td>
          <td><?= $a['time_of_visit'] ?></td>
          <td><?= htmlspecialchars($a['symptoms']) ?></td>
          <td><?= $a['age'] ?></td>
          <td><?= htmlspecialchars($a['doctor']) ?></td>
          <td class="action-buttons">
            <a class="edit" href="edit_appointment.php?id=<?= $a['id'] ?>">Edit</a>
            <a class="delete" href="delete_appointment.php?id=<?= $a['id'] ?>" onclick="return confirm('Delete this appointment?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
