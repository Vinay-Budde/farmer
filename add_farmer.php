<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Farmer</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      background: url('addfar1.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 16px;
      padding: 30px 25px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.3);
      animation: floatIn 4s ease-in-out infinite, slideUp 0.6s ease-out;
      transition: all 0.3s ease;
    }

    .form-container:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
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

    @keyframes floatIn {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-5px);
      }
    }

    h2 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 20px;
      animation: fadeIn 0.5s ease-in-out forwards;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid rgba(255, 255, 255, 0.5);
      border-radius: 6px;
      font-size: 15px;
      transition: all 0.3s ease;
      background-color: rgba(255, 255, 255, 0.2);
      color: #fff;
      backdrop-filter: blur(6px);
      animation: fadeIn 0.6s ease forwards;
    }

    input:focus {
      border-color: #a5d6a7;
      background-color: rgba(255, 255, 255, 0.25);
      outline: none;
    }

    input:hover {
      border-color: #66bb6a;
      background-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 2px 6px rgba(76, 175, 80, 0.2);
    }

    input::placeholder {
      color: #e0e0e0;
      transition: color 0.3s ease;
    }

    input:hover::placeholder {
      color: #c8e6c9;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease, letter-spacing 0.2s;
      animation: fadeIn 0.7s ease forwards;
    }
    .view{
      text-align:center;
      padding-top:15px;
      
    }
    button:hover {
      background-color: #45a049;
      transform: scale(1.05);
      letter-spacing: 0.5px;
    }

    .message {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 12px 18px;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      animation: fadeIn 0.3s ease forwards;
    }

    .success {
      background: #4CAF50;
      color: white;
    }

    .error {
      background: #f44336;
      color: white;
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(10px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    input:nth-of-type(1) { animation-delay: 0.3s; }
    input:nth-of-type(2) { animation-delay: 0.5s; }
    input:nth-of-type(3) { animation-delay: 0.7s; }
    input:nth-of-type(4) { animation-delay: 0.9s; }
    button { animation-delay: 1.1s; }

    .error-text {
      color: #ffeb3b;
      font-size: 12px;
      margin-top: -8px;
      margin-bottom: 10px;
      display: none;
    }

  </style>
</head>
<body>

<?php
$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Aadhaar number (exactly 12 digits)
    $aadhaar = $_POST['aadhaar'];
    if (!preg_match('/^\d{12}$/', $aadhaar)) {
        $error = "Aadhaar number must be exactly 12 digits";
    } else {
        // Check if Aadhaar already exists
        $check_stmt = $conn->prepare("SELECT id FROM farmers WHERE aadhaar = ?");
        $check_stmt->bind_param("s", $aadhaar);
        $check_stmt->execute();
        $check_stmt->store_result();
        
        if ($check_stmt->num_rows > 0) {
            $error = "This Aadhaar number is already registered";
        } else {
            // Insert new farmer
            $stmt = $conn->prepare("INSERT INTO farmers (name, land_area, village, aadhaar) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $_POST['name'], $_POST['land'], $_POST['village'], $aadhaar);
            
            if ($stmt->execute()) {
                $success = "✅ Farmer added successfully!";
            } else {
                $error = "Error adding farmer: " . $conn->error;
            }
        }
    }
}
?>

<?php if ($success): ?>
    <div class="message success" id="notification"><?php echo $success; ?></div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="message error" id="notification"><?php echo $error; ?></div>
<?php endif; ?>

<div class="form-container">
  <h2>Add New Farmer</h2>
  <form method="post" id="farmerForm">
    <input name="name" placeholder="Farmer Name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
    <input name="land" type="number" step="0.01" placeholder="Land Area (acres)" required value="<?php echo isset($_POST['land']) ? htmlspecialchars($_POST['land']) : ''; ?>">
    <input name="village" placeholder="Village" required value="<?php echo isset($_POST['village']) ? htmlspecialchars($_POST['village']) : ''; ?>">
    <input name="aadhaar" placeholder="Aadhaar Number (12 digits)" required 
           pattern="\d{12}" title="Aadhaar must be exactly 12 digits"
           value="<?php echo isset($_POST['aadhaar']) ? htmlspecialchars($_POST['aadhaar']) : ''; ?>">
    <div class="error-text" id="aadhaarError">Aadhaar must be exactly 12 digits</div>
    <button type="submit">Submit</button>
    <div class="view">
    <a href="view_farmers.php">View Farmer's Details</a>
    </div>
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

    // Client-side validation for Aadhaar
    const aadhaarInput = document.querySelector('input[name="aadhaar"]');
    const aadhaarError = document.getElementById('aadhaarError');
    
    aadhaarInput.addEventListener('input', function() {
      if (!/^\d{0,12}$/.test(this.value)) {
        this.value = this.value.replace(/[^\d]/g, '').slice(0, 12);
      }
      
      if (this.value.length !== 12 && this.value.length > 0) {
        aadhaarError.style.display = 'block';
      } else {
        aadhaarError.style.display = 'none';
      }
    });

    // Form submission validation
    document.getElementById('farmerForm').addEventListener('submit', function(e) {
      if (aadhaarInput.value.length !== 12) {
        e.preventDefault();
        aadhaarError.style.display = 'block';
        aadhaarInput.focus();
      }
    });
  };
</script>

</body>
</html>