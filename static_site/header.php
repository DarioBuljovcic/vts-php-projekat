<?php
session_start();
$css_file = 'assets/css/style.css';
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Dario Buljovčić">
    <meta name="description" content="Lični portfolio i internet prezentacija studenta informacionih tehnologija Darija Buljovčića.">
    <meta name="robots" content="index, follow">
    <title>Dario.dev | Portfolio</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $css_file; ?>">
</head>
<body>
    <div class="nav-overlay" id="nav-overlay"></div>
    <header>
        <div class="container">
            <nav>
                <a href="index.php" class="logo">DARIO<span>.DEV</span></a>
                <ul class="nav-links" id="nav-links">
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="student.php">Student</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropbtn">Više ▾</a>
                        <div class="dropdown-content">
                            <a href="o-meni.php">O meni</a>
                            <a href="projekti.php">Projekti</a>
                            <a href="vestine.php">Veštine</a>
                            <a href="blog.php">Blog</a>
                            <a href="linkovi.php">Linkovi</a>
                            <a href="kontakt.php">Kontakt</a>
                        </div>
                    </li>
                    <li class="mobile-only"><a href="kontakt.php" class="btn-primary">Kontakt</a></li>
                </ul>
                <div class="nav-right">
                    <a href="kontakt.php" class="btn-primary desktop-only">Kontakt</a>
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
