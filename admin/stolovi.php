<?php 
require_once '../functions.php';

$msg = '';

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (delete_sto($id)) {
        $msg = "Sto je uspesno obrisan.";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $naziv = clean_input($_POST['naziv']);
    $kapacitet = (int)$_POST['kapacitet'];
    $opis = clean_input($_POST['opis']);
    
    if (add_sto($naziv, $kapacitet, $opis)) {
        $msg = "Novi sto je uspesno dodat.";
    }
}

$stolovi = get_all_stolovi();
?>
<?php include 'header.php'; ?>

<h2>Upravljanje Stolovima</h2>

<?php if ($msg): ?>
    <div class="alert alert-success"><?= $msg ?></div>
<?php endif; ?>

<div class="d-flex-responsive gap-40">
    <div class="flex-2">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Kapacitet</th>
                        <th>Opis</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stolovi as $s): ?>
                    <tr>
                        <td class="text-center"><?= $s['id'] ?></td>
                        <td><?= htmlspecialchars($s['naziv']) ?></td>
                        <td class="text-center"><?= $s['kapacitet'] ?></td>
                        <td><?= htmlspecialchars($s['opis']) ?></td>
                        <td class="action-links">
                            <a href="stolovi_edit.php?id=<?= $s['id'] ?>" class="action-edit">Izmeni</a>
                            <a href="?action=delete&id=<?= $s['id'] ?>" class="action-delete" onclick="return confirm('Brisanjem stola brisu se i sve rezervacije za njega! Da li ste sigurni?');">Obrisi</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($stolovi)): ?>
                    <tr><td colspan="5" style="text-align:center;">Nema stolova.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="flex-1">
        <div class="form-container" style="padding: 25px;">
            <h3>Dodaj novi sto</h3>
            <form action="stolovi.php" method="POST" style="margin-top: 20px;">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label>Naziv</label>
                    <input type="text" name="naziv" required>
                </div>
                <div class="form-group">
                    <label>Kapacitet u osobama</label>
                    <input type="number" name="kapacitet" min="1" required>
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea name="opis" rows="3"></textarea>
                </div>
                <button type="submit" class="btn-primary" style="width: 100%;">Dodaj sto</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
