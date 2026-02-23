<?php
/**
 * db.php - Konekcija sa MySQL bazom podataka
 */

$host = 'localhost';
$dbname = 'it';
$username = 'root'; // Promeni po potrebi
$password = ''; // Promeni po potrebi

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Podesavamo PDO error mod na exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Podesavamo default fetch mod
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    die("Greška pri povezivanju sa bazom podataka: " . $e->getMessage());
}
?>
