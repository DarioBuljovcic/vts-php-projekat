<?php 
require_once '../functions.php';

if (!isset($_GET['id'])) {
    header('Location: stolovi.php');
    exit;
}

$id = (int)$_GET['id'];
$sto = get_sto_by_id($id);
$msg = '';

if (!$sto) {
    die("Sto ne postoji.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naziv = clean_input($_POST['naziv']);
    $kapacitet = (int)$_POST['kapacitet'];
    $opis = clean_input($_POST['opis']);
    
    if (update_sto($id, $naziv, $kapacitet, $opis)) {
        $msg = "Sto je uspešno ažuriran.";
        $sto = get_sto_by_id($id);
    }
}
?>
<?php include 'header.php'; ?>

<h2>Izmena Stola: <?= htmlspecialchars($sto['naziv']) ?></h2>

<div class="form-container" style="margin-top: 30px;">
    <?php if ($msg): ?>
        <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>
    
    <form action="stolovi_edit.php?id=<?= $id ?>" method="POST">
        <div class="form-group">
            <label>Naziv</label>
            <input type="text" name="naziv" value="<?= htmlspecialchars($sto['naziv']) ?>" required>
        </div>
        <div class="form-group">
            <label>Kapacitet</label>
            <input type="number" name="kapacitet" value="<?= $sto['kapacitet'] ?>" min="1" required>
        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea name="opis" rows="4"><?= htmlspecialchars($sto['opis']) ?></textarea>
        </div>
        <button type="submit" class="btn-primary">Sačuvaj izmene</button>
        <a href="stolovi.php" class="btn-secondary" style="margin-left: 10px;">Nazad na stolove</a>
    </form>
</div>

<?php include 'footer.php'; ?>
