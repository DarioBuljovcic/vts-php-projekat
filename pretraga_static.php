<?php include 'header.php'; ?>
<?php
// Test podaci
$stolovi_data = array(
    array('id' => 1, 'naziv' => 'Romantični separe za dvoje', 'kapacitet' => 2, 'opis' => 'Ušuškan kutak sa prigušenim svetlom, savršen za parove.'),
    array('id' => 2, 'naziv' => 'Porodični sto pored prozora', 'kapacitet' => 4, 'opis' => 'Prostran sto sa prelepim pogledom na gradski trg.'),
    array('id' => 3, 'naziv' => 'Okrugli sto za prijatelje', 'kapacitet' => 6, 'opis' => 'Idealan za druženja i manje proslave u krugu najbližih.'),
    array('id' => 4, 'naziv' => 'VIP loža - Zlatna soba', 'kapacitet' => 8, 'opis' => 'Ekskluzivni separe sa premium uslugom i potpunom privatnošću.'),
    array('id' => 5, 'naziv' => 'Baštenski sto - Terasa', 'kapacitet' => 4, 'opis' => 'Uživajte na svežem vazduhu u našoj prelepoj bašti.'),
    array('id' => 6, 'naziv' => 'Barski sto za parove', 'kapacitet' => 2, 'opis' => 'Visoki sto sa pogledom na otvorenu kuhinju.')
);

function search_slobodni_stolovi_static($kapacitet, $stolovi) {
    if ($kapacitet <= 0) return $stolovi;
    $results = array();
    foreach ($stolovi as $sto) {
        if ($sto['kapacitet'] >= $kapacitet) {
            $results[] = $sto;
        }
    }
    return $results;
}
?>

<div class="container" style="padding: 40px 0;">
    <div class="text-center mb-5">
        <h2 class="animate__animated animate__fadeInDown">Pretraga slobodnih stolova (Static Demo)</h2>
        <p class="text-secondary">Isprobajte pretragu na testnim podacima.</p>
    </div>
    
    <div class="form-container" style="margin-bottom: 40px;">
        <form action="pretraga_static.php" method="GET" class="animate__animated animate__fadeIn">
            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <div class="form-group">
                    <label for="kapacitet">Broj osoba</label>
                    <input type="number" id="kapacitet" name="kapacitet" min="1" max="20" required value="<?= isset($_GET['kapacitet']) ? (int)$_GET['kapacitet'] : 2 ?>">
                </div>
                <div class="form-group">
                    <label for="datum_vreme">Datum i vreme</label>
                    <input type="datetime-local" id="datum_vreme" name="datum_vreme" required value="<?= isset($_GET['datum_vreme']) ? htmlspecialchars($_GET['datum_vreme']) : date('Y-m-d\TH:i', strtotime('+1 day 19:00')) ?>">
                </div>
            </div>
            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 20px;">Prikaži slobodne stolove</button>
        </form>
    </div>

    <div id="results" class="animate__animated animate__fadeIn">
        <?php
        $kapacitet = isset($_GET['kapacitet']) ? (int)$_GET['kapacitet'] : 0;
        $datum_vreme = isset($_GET['datum_vreme']) ? $_GET['datum_vreme'] : '';
        
        $slobodni_stolovi = search_slobodni_stolovi_static($kapacitet, $stolovi_data);
        
        if ($kapacitet > 0 && !empty($datum_vreme)) {
            $dateObj = DateTime::createFromFormat('Y-m-d\TH:i', $datum_vreme);
            if ($dateObj) {
                echo '<h3 class="mb-5">Rezultati pretrage za ' . htmlspecialchars($dateObj->format('d.m.Y. u H:i')) . '</h3>';
            }
        } else {
            echo '<h3 class="mb-5">Dostupni stolovi (svi test podaci)</h3>';
        }
        
        if (count($slobodni_stolovi) > 0) {
            echo '<div class="grid">';
            foreach ($slobodni_stolovi as $sto) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($sto['naziv']) . '</h3>';
                echo '<div class="capacity"><i class="fas fa-users"></i> Kapacitet: ' . htmlspecialchars($sto['kapacitet']) . ' osobe</div>';
                echo '<p>' . htmlspecialchars($sto['opis']) . '</p>';
                echo '<a href="rezervacija_static.php?sto_id=' . $sto['id'] . '&datum_vreme=' . urlencode($datum_vreme) . '&osobe=' . ($kapacitet > 0 ? $kapacitet : $sto['kapacitet']) . '" class="btn-secondary">Odaberi ovaj sto</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">Nažalost, nema slobodnih stolova u test podacima za traženi broj osoba.</div>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>
