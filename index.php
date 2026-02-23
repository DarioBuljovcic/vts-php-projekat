<?php include 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<section class="hero animate__animated animate__fadeIn">
    <div class="container">
        <h1 class="animate__animated animate__slideInDown">Vrhunsko kulinarsko iskustvo</h1>
        <p class="animate__animated animate__fadeInUp animate__delay-1s">Rezervišite svoj sto na vreme i uživajte u nezaboravnim ukusima u prijatnom, modernom ambijentu našeg restorana.</p>
        <p class="animate__animated animate__fadeInUp animate__delay-1s date-highlight">Danas je: <?php echo date("d.m.Y."); ?></p>
        <div class="animate__animated animate__zoomIn animate__delay-1s">
            <a href="rezervacija.php" class="btn-primary">Rezerviši odmah</a>
            <a href="pretraga.php" class="btn-secondary ml-10">Pretraži slobodne stolove</a>
        </div>
    </div>
</section>

<section class="container">
    <h2 class="animate__animated animate__fadeInUp">Naša ponuda stolova</h2>
    <div class="grid">
        <?php
$stolovi = get_all_stolovi();
if (count($stolovi) > 0) {
    foreach ($stolovi as $sto) {
        echo '<div class="card animate__animated animate__fadeInUp">';
        echo '<h3>' . htmlspecialchars($sto['naziv']) . '</h3>';
        echo '<div class="capacity"> Kapacitet: ' . htmlspecialchars($sto['kapacitet']) . ' osobe</div>';
        echo '<p>' . htmlspecialchars($sto['opis']) . '</p>';
        echo '<a href="rezervacija.php?sto_id=' . $sto['id'] . '" class="btn-secondary">Odaberi</a>';
        echo '</div>';
    }
}
else {
    echo '<p>Trenutno nema dostupnih stolova u bazi.</p>';
}
?>
    </div>
</section>

<?php include 'footer.php'; ?>
