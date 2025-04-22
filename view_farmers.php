<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer List</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background: url('addfar1.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .table-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      border-radius: 16px;
      padding: 30px;
      width: 90%;
      max-width: 1000px;
      color: #fff;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: 600;
      color: #ffffff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      color: #ffffff;
    }

    th {
      background-color: rgba(76, 175, 80, 0.8);
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    tr:hover {
      background-color: rgba(76, 175, 80, 0.2);
    }

    @media (max-width: 768px) {
      .table-container {
        padding: 20px 15px;
      }

      table, th, td {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<div class="table-container">
  <h2>Farmer List</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Land Area (acres)</th>
      <th>Village</th>
      <th>Aadhaar</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM farmers");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['land_area']}</td>
                <td>{$row['village']}</td>
                <td>{$row['aadhaar']}</td>
              </tr>";
    }
    ?>
  </table>
</div>

</body>
</html>