<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Scheme</title>
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

    .form-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      border-radius: 16px;
      padding: 30px 25px;
      width: 90%;
      max-width: 500px;
      color: #fff;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 20px;
      font-size: 26px;
    }

    select, input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      background-color: rgba(255,255,255,0.15);
      color: #fff;
      backdrop-filter: blur(3px);
      transition: all 0.3s ease;
    }

    select::placeholder, input::placeholder {
      color: #ddd;
    }

    select:focus, input:focus {
      outline: none;
      border: 1px solid #4CAF50;
      background-color: rgba(255,255,255,0.25);
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background-color: #45a049;
      transform: scale(1.02);
    }

    .message {
      position: fixed;
      top: 20px;
      right: 20px;
      background: #4CAF50;
      color: white;
      padding: 12px 18px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      z-index: 1000;
    }

    @media (max-width: 768px) {
      .form-container {
        padding: 20px;
      }

      select, input, button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO schemes (farmer_id, scheme_name, year, amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isid", $_POST['farmer_id'], $_POST['scheme_name'], $_POST['year'], $_POST['amount']);
    $stmt->execute();
    echo '<div class="message" id="notification">✅ Scheme added successfully!</div>';
}
?>

<div class="form-container">
  <h2>Add Scheme to Farmer</h2>
  <form method="post">
    <select name="farmer_id" required>
      <option disabled selected>Select Farmer</option>
      <?php
      $res = $conn->query("SELECT id, name FROM farmers");
      while ($row = $res->fetch_assoc()) {
          echo "<option value='{$row['id']}'>{$row['name']}</option>";
      }
      ?>
    </select>
    <input name="scheme_name" placeholder="Scheme Name" required>
    <input name="year" type="number" placeholder="Year" required>
    <input name="amount" type="number" step="0.01" placeholder="Amount" required>
    <button type="submit">Add Scheme</button>
  </form>
</div>

<script>
  window.onload = function () {
    const notification = document.getElementById("notification");
    if (notification) {
      setTimeout(() => {
        notification.style.display = "none";
      }, 3000);
    }
  };
</script>

</body>
</html>