<?php 
require_once '../functions.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];
$rezervacija = get_rezervacija_by_id($id);
$msg = '';

if (!$rezervacija) {
    die("Rezervacija ne postoji.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sto_id = (int)$_POST['sto_id'];
    $ime_prezime = clean_input($_POST['ime_prezime']);
    $email = clean_input($_POST['email']);
    $telefon = clean_input($_POST['telefon']);
    $datum_vreme = clean_input($_POST['datum_vreme']);
    $broj_osoba = (int)$_POST['broj_osoba'];
    $zahtev = clean_input($_POST['zahtev']);
    $status = clean_input($_POST['status']);
    
    $dateObj = DateTime::createFromFormat('Y-m-d\TH:i', $datum_vreme);
    if ($dateObj) {
        $formatted_date = $dateObj->format('Y-m-d H:i:s');
        if (update_rezervacija($id, $sto_id, $ime_prezime, $email, $telefon, $formatted_date, $broj_osoba, $zahtev, $status)) {
            $msg = "Rezervacija je uspešno ažurirana.";
            $rezervacija = get_rezervacija_by_id($id);
        }
    } else {
        $msg = "Neispravan format datuma.";
    }
}
?>
<?php include 'header.php'; ?>

<h2>Izmena Rezervacije #<?= $id ?></h2>

<div class="form-container" style="margin-top: 30px;">
    <?php if ($msg): ?>
        <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>
    
    <form action="rezervacije_edit.php?id=<?= $id ?>" method="POST">
        <div class="form-group">
            <label>Sto</label>
            <select name="sto_id" required>
                <?php
                $stolovi = get_all_stolovi();
                foreach($stolovi as $sto) {
                    $selected = ($sto['id'] == $rezervacija['sto_id']) ? 'selected' : '';
                    echo "<option value='{$sto['id']}' {$selected}>{$sto['naziv']} (Osoba: {$sto['kapacitet']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Ime i prezime</label>
            <input type="text" name="ime_prezime" value="<?= htmlspecialchars($rezervacija['ime_prezime']) ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($rezervacija['email']) ?>" required>
        </div>
        <div class="form-group">
            <label>Telefon</label>
            <input type="text" name="telefon" value="<?= htmlspecialchars($rezervacija['telefon']) ?>" required>
        </div>
        <div class="form-group">
            <label>Datum i vreme</label>
            <?php 
            $dt = new DateTime($rezervacija['datum_vreme']);
            $html_dt = $dt->format('Y-m-d\TH:i');
            ?>
            <input type="datetime-local" name="datum_vreme" value="<?= $html_dt ?>" required>
        </div>
        <div class="form-group">
            <label>Broj osoba</label>
            <input type="number" name="broj_osoba" value="<?= $rezervacija['broj_osoba'] ?>" min="1" required>
        </div>
        <div class="form-group">
            <label>Zahtev</label>
            <textarea name="zahtev" rows="3"><?= htmlspecialchars($rezervacija['zahtev'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" required>
                <option value="na_cekanju" <?= $rezervacija['status'] == 'na_cekanju' ? 'selected' : '' ?>>Na čekanju</option>
                <option value="odobrena" <?= $rezervacija['status'] == 'odobrena' ? 'selected' : '' ?>>Odobrena</option>
                <option value="odbijena" <?= $rezervacija['status'] == 'odbijena' ? 'selected' : '' ?>>Odbijena</option>
            </select>
        </div>
        
        <button type="submit" class="btn-primary">Sačuvaj izmene</button>
        <a href="index.php" class="btn-secondary" style="margin-left: 10px;">Nazad</a>
    </form>
</div>

<?php include 'footer.php'; ?>
