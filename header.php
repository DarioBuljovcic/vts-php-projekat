<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Student">
    <meta name="description" content="Gourmet restoran - vrhunsko kulinarsko iskustvo i rezervacija stolova">
    <meta name="robots" content="index, follow">
    <title>Gourmet | Rezervacija Stolova</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/brutalist.css">
</head>
<body>
    <div class="nav-overlay" id="nav-overlay"></div>
    <header>
        <div class="container">
            <nav>
                <div class="logo">GOURMET.</div>
                <ul class="nav-links" id="nav-links">
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="pretraga.php">Pretraga</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">Više ▾</a>
                        <div class="dropdown-content">
                            <a href="jelovnik.php">Jelovnik</a>
                            <a href="galerija.php">Galerija</a>
                            <a href="o-nama.php">O nama</a>
                            <a href="student.php">Student</a>
                            <a href="kontakt.php">Kontakt</a>
                        </div>
                    </li>
                    <li class="mobile-only"><a href="rezervacija.php" class="btn-primary">Rezerviši sto</a></li>
                </ul>
                <div class="nav-right">
                    <a href="rezervacija.php" class="btn-primary desktop-only">Rezerviši sto</a>
                    <div class="burger" id="burger">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
