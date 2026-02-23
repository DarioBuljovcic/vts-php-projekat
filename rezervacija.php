<?php
require_once 'functions.php';

$success_msg = '';
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sto_id = (int)$_POST['sto_id'];
    $ime_prezime = clean_input($_POST['ime_prezime']);
    $email = clean_input($_POST['email']);
    $telefon = clean_input($_POST['telefon']);
    $datum_vreme = clean_input($_POST['datum_vreme']);
    $broj_osoba = (int)$_POST['broj_osoba'];
    $zahtev = clean_input($_POST['zahtev']);

    if(empty($ime_prezime) || empty($email) || empty($telefon) || empty($datum_vreme) || $sto_id <= 0 || $broj_osoba <= 0){
        $error_msg = "Molimo popunite sva obavezna polja.";
    } else {
        $dateObj = DateTime::createFromFormat('Y-m-d\TH:i', $datum_vreme);
        if ($dateObj) {
            $formatted_date = $dateObj->format('Y-m-d H:i:s');
            
            if (add_rezervacija($sto_id, $ime_prezime, $email, $telefon, $formatted_date, $broj_osoba, $zahtev)) {
                $success_msg = "Vaša rezervacija je uspešno poslata! Status vaše rezervacije je 'na čekanju' dok admin ne potvrdi.";
            } else {
                $error_msg = "Došlo je do greške prilikom čuvanja rezervacije. Pokušajte ponovo.";
            }
        } else {
            $error_msg = "Neispravan format datuma i vremena.";
        }
    }
}

// Pre-populacija iz URL-a
$selected_sto_id = isset($_GET['sto_id']) ? (int)$_GET['sto_id'] : 0;
$selected_datum = isset($_GET['datum_vreme']) ? htmlspecialchars($_GET['datum_vreme']) : '';
$selected_osobe = isset($_GET['osobe']) ? (int)$_GET['osobe'] : '';
?>
<?php include 'header.php'; ?>

<div class="container" style="padding: 40px 0;">
    <h2>Rezervacija stola</h2>
    
    <div class="form-container">
        <?php if ($success_msg): ?>
            <div class="alert alert-success"><?= $success_msg ?></div>
        <?php endif; ?>
        <?php if ($error_msg): ?>
            <div class="alert alert-error"><?= $error_msg ?></div>
        <?php endif; ?>
        
        <form action="rezervacija.php" method="POST">
            <div class="form-group">
                <label for="sto_id">Izaberite sto *</label>
                <select id="sto_id" name="sto_id" required>
                    <option value="">-- Odaberite sto --</option>
                    <?php
                    $stolovi = get_all_stolovi();
                    foreach ($stolovi as $sto) {
                        $selected = ($sto['id'] == $selected_sto_id) ? 'selected' : '';
                        echo '<option value="' . $sto['id'] . '" ' . $selected . '>';
                        echo htmlspecialchars($sto['naziv']) . ' (Osoba: ' . $sto['kapacitet'] . ')';
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="datum_vreme">Datum i vreme *</label>
                <input type="datetime-local" id="datum_vreme" name="datum_vreme" required value="<?= $selected_datum ?>">
            </div>
            <div class="form-group">
                <label for="broj_osoba">Broj osoba *</label>
                <input type="number" id="broj_osoba" name="broj_osoba" min="1" max="20" required value="<?= $selected_osobe ?>">
            </div>
            <div class="form-group">
                <label for="ime_prezime">Ime i prezime *</label>
                <input type="text" id="ime_prezime" name="ime_prezime" required>
            </div>
            <div class="form-group">
                <label for="email">Email adresa *</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefon">Broj telefona *</label>
                <input type="tel" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="zahtev">Poseban zahtev (opciono)</label>
                <textarea id="zahtev" name="zahtev" placeholder="Npr. dečija stolica, alergije na hranu..."></textarea>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%;">Potvrdi rezervaciju</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
