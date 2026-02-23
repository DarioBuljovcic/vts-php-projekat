<?php
session_start();
// Admin folder
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmet | Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/brutalist.css">

</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">GOURMET ADMIN</div>
                <ul class="nav-links">
                    <li><a href="../index.php" target="_blank">Prikaži sajt</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container py-40">
            <div class="admin-nav">
                <a href="index.php">Sve Rezervacije</a>
                <a href="stolovi.php">Upravljanje Stolovima</a>
            </div>
