<?php 
require_once '../functions.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];
    
    if ($action === 'delete') {
        if(delete_rezervacija($id)) {
            $msg = "Rezervacija je uspesno obrisana.";
        }
    } elseif ($action === 'approve') {
        update_rezervacija_status($id, 'odobrena');
        $msg = "Rezervacija je odobrena.";
    } elseif ($action === 'reject') {
        update_rezervacija_status($id, 'odbijena');
        $msg = "Rezervacija je odbijena.";
    }
}

$rezervacije = get_all_rezervacije();
?>
<?php include 'header.php'; ?>

<h2>Upravljanje Rezervacijama</h2>

<?php if (isset($msg)): ?>
    <div class="alert alert-success"><?= $msg ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime i prezime</th>
                <th>Kontakt</th>
                <th>Vreme</th>
                <th>Osoba</th>
                <th>Sto</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rezervacije as $r): ?>
            <tr>
                <td class="text-center"><?= $r['id'] ?></td>
                <td><?= htmlspecialchars($r['ime_prezime']) ?></td>
                <td><?= htmlspecialchars($r['telefon']) ?><br><small><?= htmlspecialchars($r['email']) ?></small></td>
                <td><?= date('d.m.Y H:i', strtotime($r['datum_vreme'])) ?></td>
                <td class="text-center"><?= $r['broj_osoba'] ?></td>
                <td><?= htmlspecialchars($r['sto_naziv']) ?></td>
                <td><span class="status-badge status-<?= $r['status'] ?>"><?= ucfirst(str_replace('_', ' ', $r['status'])) ?></span></td>
                <td class="action-links">
                    <?php if($r['status'] === 'na_cekanju'): ?>
                        <a href="?action=approve&id=<?= $r['id'] ?>" class="action-edit" onclick="return confirm('Da li ste sigurni da zelite da odobrite?');">Odobri</a>
                        <a href="?action=reject&id=<?= $r['id'] ?>" class="action-delete" onclick="return confirm('Da li ste sigurni da zelite da odbijete?');">Odbij</a>
                    <?php endif; ?>
                    <a href="rezervacije_edit.php?id=<?= $r['id'] ?>" class="action-edit">Izmeni</a>
                    <a href="?action=delete&id=<?= $r['id'] ?>" class="action-delete" onclick="return confirm('Da li ste sigurni da zelite da obrisete ovu rezervaciju trajno?');">Obrisi</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($rezervacije)): ?>
            <tr><td colspan="8" style="text-align:center;">Nema rezervacija.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
