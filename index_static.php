<?php include 'header.php'; ?>
<?php

// Mock functions to avoid requiring functions.php which connects to DB
function clean_input_static($data)
{
    if (is_null($data))
        return "";
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$stolovi = array(
        array('id' => 1, 'naziv' => 'Romantični separe za dvoje', 'kapacitet' => 2, 'opis' => 'Ušuškan kutak sa prigušenim svetlom, savršen za parove.'),
        array('id' => 2, 'naziv' => 'Porodični sto pored prozora', 'kapacitet' => 4, 'opis' => 'Prostran sto sa prelepim pogledom na gradski trg.'),
        array('id' => 3, 'naziv' => 'Okrugli sto za prijatelje', 'kapacitet' => 6, 'opis' => 'Idealan za druženja i manje proslave u krugu najbližih.'),
        array('id' => 4, 'naziv' => 'VIP loža - Zlatna soba', 'kapacitet' => 8, 'opis' => 'Ekskluzivni separe sa premium uslugom i potpunom privatnošću.'),
        array('id' => 5, 'naziv' => 'Baštenski sto - Terasa', 'kapacitet' => 4, 'opis' => 'Uživajte na svežem vazduhu u našoj prelepoj bašti.'),
        array('id' => 6, 'naziv' => 'Barski sto za parove', 'kapacitet' => 2, 'opis' => 'Visoki sto sa pogledom na otvorenu kuhinju.')
);
?>

<section class="hero animate__animated animate__fadeIn">
    <div class="container">
        <h1 class="animate__animated animate__slideInDown">Vrhunsko kulinarsko iskustvo (Static Demo)</h1>
        <p class="animate__animated animate__fadeInUp animate__delay-1s">Rezervišite svoj sto na vreme i uživajte u nezaboravnim ukusima u prijatnom, modernom ambijentu našeg restorana.</p>
        <p class="animate__animated animate__fadeInUp animate__delay-1s date-highlight">Danas je: <?php echo date("d.m.Y."); ?></p>
        <div class="animate__animated animate__zoomIn animate__delay-1s">
            <a href="rezervacija.php" class="btn-primary">Rezerviši odmah</a>
            <a href="pretraga.php" class="btn-secondary ml-10">Pretraži slobodne stolove</a>
        </div>
    </div>
</section>

<section class="container">
    <div class="text-center mb-5">
        <h2 class="animate__animated animate__fadeInUp">Naša ponuda stolova (Test Podaci)</h2>
        <p class="text-secondary">Prikazujemo fiktivne podatke jer baza nije povezana.</p>
    </div>
    <div class="grid">
        <?php
foreach ($stolovi as $sto) {
    echo '<div class="card animate__animated animate__fadeInUp">';
    echo '<h3>' . htmlspecialchars($sto['naziv']) . '</h3>';
    echo '<div class="capacity"><i class="fas fa-users"></i> Kapacitet: ' . htmlspecialchars($sto['kapacitet']) . ' osobe</div>';
    echo '<p>' . htmlspecialchars($sto['opis']) . '</p>';
    echo '<a href="rezervacija.php?sto_id=' . $sto['id'] . '" class="btn-secondary">Odaberi</a>';
    echo '</div>';
}
?>
    </div>
</section>

<?php include 'footer.php'; ?>
