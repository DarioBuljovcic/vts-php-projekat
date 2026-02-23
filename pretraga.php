<?php include 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<div class="container" style="padding: 40px 0;">
    <h2>Pretraga slobodnih stolova</h2>
    
    <div class="form-container" style="margin-bottom: 40px;">
        <form action="pretraga.php" method="GET">
            <div class="form-group">
                <label for="kapacitet">Broj osoba</label>
                <input type="number" id="kapacitet" name="kapacitet" min="1" max="20" required value="<?= isset($_GET['kapacitet']) ? (int)$_GET['kapacitet'] : 2 ?>">
            </div>
            <div class="form-group">
                <label for="datum_vreme">Datum i vreme</label>
                <input type="datetime-local" id="datum_vreme" name="datum_vreme" required value="<?= isset($_GET['datum_vreme']) ? htmlspecialchars($_GET['datum_vreme']) : '' ?>">
            </div>
            <button type="submit" class="btn-primary" style="width: 100%;">Pretraži</button>
        </form>
    </div>

    <?php
    if (isset($_GET['kapacitet']) && isset($_GET['datum_vreme']) && !empty($_GET['datum_vreme'])) {
        $kapacitet = (int)$_GET['kapacitet'];
        $datum_vreme = $_GET['datum_vreme'];
        
        $dateObj = DateTime::createFromFormat('Y-m-d\TH:i', $datum_vreme);
        if ($dateObj) {
            $formatted_date = $dateObj->format('Y-m-d H:i:s');
            $slobodni_stolovi = search_slobodni_stolovi($kapacitet, $formatted_date);
            
            echo '<h3>Rezultati pretrage za ' . htmlspecialchars($dateObj->format('d.m.Y. u H:i')) . '</h3>';
            
            if (count($slobodni_stolovi) > 0) {
                echo '<div class="grid" style="margin-top: 20px;">';
                foreach ($slobodni_stolovi as $sto) {
                    echo '<div class="card">';
                    echo '<h3>' . htmlspecialchars($sto['naziv']) . '</h3>';
                    echo '<div class="capacity">👩‍🍳 Kapacitet: ' . htmlspecialchars($sto['kapacitet']) . ' osobe</div>';
                    echo '<p>' . htmlspecialchars($sto['opis']) . '</p>';
                    echo '<a href="rezervacija.php?sto_id=' . $sto['id'] . '&datum_vreme=' . urlencode($datum_vreme) . '&osobe=' . $kapacitet . '" class="btn-secondary">Rezerviši ovaj sto</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p>Nažalost, nema slobodnih stolova za traženi broj osoba i vreme.</p>';
            }
        } else {
            echo '<p class="alert alert-error">Nevalidan format datuma i vremena.</p>';
        }
    }
    ?>
</div>

<?php include 'footer.php'; ?>
