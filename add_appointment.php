<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO appointments (patient_name, phone, email, gender, appointment_date, time_of_visit, symptoms, age, doctor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->execute([
    $_POST['patient_name'],
    $_POST['phone'],
    $_POST['email'],
    $_POST['gender'],
    $_POST['appointment_date'],
    $_POST['time_of_visit'],
    $_POST['symptoms'],
    $_POST['age'],
    $_POST['doctor']
  ]);
  header('Location: appointments.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Appointment</title>
  <style>
    body { font-family: Arial; background: #f5f6fa; padding: 40px; }
    form {
      background: white; padding: 30px; max-width: 700px; margin: auto;
      border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input, select, textarea {
      width: 100%; padding: 10px; margin-top: 5px;
      border: 1px solid #ccc; border-radius: 5px;
    }
    button {
      margin-top: 20px; padding: 12px 20px; background: #f97316; color: white;
      border: none; border-radius: 5px; cursor: pointer;
    }
  </style>
</head>
<body>

<form method="POST">
  <h2>Book Appointment</h2>

  <label>Patient Name</label>
  <input type="text" name="patient_name" required>

  <label>Phone</label>
  <input type="text" name="phone" required>

  <label>Email</label>
  <input type="email" name="email" required>

  <label>Gender</label>
  <select name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>

  <label>Select Date</label>
  <input type="date" name="appointment_date" required>

  <label>Time of Visit</label>
  <input type="time" name="time_of_visit" required>

  <label>Symptoms</label>
  <textarea name="symptoms" rows="3"></textarea>

  <label>Age</label>
  <input type="number" name="age" required>

  <label>Doctor</label>
  <input type="text" name="doctor" required>

  <button type="submit">Submit</button>
</form>

</body>
</html>