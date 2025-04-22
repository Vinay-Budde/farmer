<?php
require 'includes/config.php';
require 'includes/auth.php';

logout();
header("Location: " . BASE_URL . "/login.php");
exit;
?>