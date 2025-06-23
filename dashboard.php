<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>eHealth Dashboard</title>
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
      margin-bottom: 20px;
    }
    .sidebar ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
      background: #57606f;
      padding: 10px;
      display: block;
      border-radius: 5px;
    }
    .sidebar ul li a:hover {
      background: #747d8c;
    }

    .main {
      flex-grow: 1;
      padding: 40px;
    }

    .main h1 {
      color: #333;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin-bottom: 20px;
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
    <h1>Welcome to eHealth Dashboard</h1>
    <div class="card">
      <p>Use the sidebar to manage your patients, appointments, and view the hospital event calendar.</p>
      <p>This platform helps healthcare institutions streamline clinical workflows efficiently and effectively.</p>
    </div>
  </div>

</body>
</html>
