<?php
require 'db.php';

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];
        
        // Get farmer ID if user is farmer
        if ($user['user_type'] == 'farmer') {
            $stmt = $pdo->prepare("SELECT farmer_id FROM farmers WHERE user_id = ?");
            $stmt->execute([$user['id']]);
            $farmer = $stmt->fetch();
            $_SESSION['farmer_id'] = $farmer['farmer_id'];
        }
        
        return true;
    }
    return false;
}

function logout() {
    session_unset();
    session_destroy();
}

function registerUser($username, $email, $password, $userType) {
    global $pdo;
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword, $userType]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function registerFarmer($userId, $name, $aadhaar, $mobile, $address, $village, $district, $state, $pincode) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("INSERT INTO farmers (user_id, name, aadhaar, mobile, address, village, district, state, pincode) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $name, $aadhaar, $mobile, $address, $village, $district, $state, $pincode]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}
?>