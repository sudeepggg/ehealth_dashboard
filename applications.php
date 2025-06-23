<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Hospital Event Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
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
      text-align: center;
      background: #2f3542;
      color: white;
      padding: 20px;
      margin: 0 -40px 20px -40px;
      border-radius: 0 0 10px 10px;
    }

    #calendar {
      max-width: 1000px;
      margin: 0 auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
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
    <h1>Hospital Appointment Calendar</h1>
    <div id="calendar"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 600,
        events: 'load_events.php'
      });
      calendar.render();
    });
  </script>

</body>
</html>
