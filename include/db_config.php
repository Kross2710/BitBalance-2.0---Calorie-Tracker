<?php
// $host = 'talsprddb02.int.its.rmit.edu.au';
// $dbname = 'COSC3046_2502_G20';
// $username = 'COSC3046_2502_G20';
// $password = 'd9BeT2X7NUi9';
// $port = 3306;

// XAMPP localhost settings
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec("SET time_zone = '+07:00';");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Gemini API key (this should be kept secret in a real application, but is included here for demonstration purposes)
// Should be put in .env file in production
define('GEMINI_API_KEY', 'EXAMPLE_API_KEY');

?>