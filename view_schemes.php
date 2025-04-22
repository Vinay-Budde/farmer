<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Beneficiary Schemes</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: url('scheme.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .content {
      width: 90%;
      max-width: 950px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-radius: 20px;
      padding: 35px;
      color: #fff;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.98);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(2px);
      color: #fff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 12px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      text-align: center;
    }

    th {
      background-color: rgba(76, 175, 80, 0.5);
      color: white;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.05);
    }

    tr:hover {
      background-color: rgba(144, 238, 144, 0.2);
      transition: background-color 0.3s ease;
    }

    .table-heading {
      font-size: 24px;
      font-weight: 600;
      text-align: center;
      padding: 18px;
      color: #fff;
      background-color: rgba(76, 175, 80, 0.3);
      backdrop-filter: blur(2px);
      border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    @media (max-width: 768px) {
      .content {
        padding: 20px;
      }

      .table-heading {
        font-size: 18px;
        padding: 14px;
      }

      th, td {
        font-size: 14px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<div class="content">
  <table>
    <tr>
      <td class="table-heading" colspan="5">Beneficiary Schemes</td>
    </tr>
    <tr>
      <th>ID</th>
      <th>Farmer</th>
      <th>Scheme</th>
      <th>Year</th>
      <th>Amount</th>
    </tr>
    <?php
    $result = $conn->query("SELECT schemes.id, name, scheme_name, year, amount FROM schemes JOIN farmers ON farmers.id = schemes.farmer_id");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['scheme_name']}</td>
                <td>{$row['year']}</td>
                <td>₹" . number_format($row['amount'], 2) . "</td>
              </tr>";
    }
    ?>
  </table>
</div>

</body>
</html>