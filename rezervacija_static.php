<?php
$success_msg = '';
$error_msg = '';

$stolovi_data = array(
    array('id' => 1, 'naziv' => 'Romantični separe za dvoje', 'kapacitet' => 2),
    array('id' => 2, 'naziv' => 'Porodični sto pored prozora', 'kapacitet' => 4),
    array('id' => 3, 'naziv' => 'Okrugli sto za prijatelje', 'kapacitet' => 6),
    array('id' => 4, 'naziv' => 'VIP loža - Zlatna soba', 'kapacitet' => 8),
    array('id' => 5, 'naziv' => 'Baštenski sto - Terasa', 'kapacitet' => 4),
    array('id' => 6, 'naziv' => 'Barski sto za parove', 'kapacitet' => 2)
);

function clean_input_static($data) {
    if (is_null($data)) return "";
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sto_id = (int)$_POST['sto_id'];
    $ime_prezime = clean_input_static($_POST['ime_prezime']);
    $email = clean_input_static($_POST['email']);
    $telefon = clean_input_static($_POST['telefon']);
    $datum_vreme = clean_input_static($_POST['datum_vreme']);
    $broj_osoba = (int)$_POST['broj_osoba'];

    if(empty($ime_prezime) || empty($email) || empty($telefon) || empty($datum_vreme) || $sto_id <= 0 || $broj_osoba <= 0){
        $error_msg = "Molimo popunite sva obavezna polja (obeležena zvezdicom *).";
    } else {
        $success_msg = "<strong>USPEŠNA SIMULACIJA!</strong> Hvala vam, " . htmlspecialchars($ime_prezime) . ". Vaša rezervacija je (fiktivno) primljena za termin " . htmlspecialchars($datum_vreme) . ". Budući da je ovo demo verzija bez baze, podaci nisu sačuvani.";
    }
}

$selected_sto_id = isset($_GET['sto_id']) ? (int)$_GET['sto_id'] : 0;
$selected_datum = isset($_GET['datum_vreme']) ? htmlspecialchars($_GET['datum_vreme']) : date('Y-m-d\TH:i', strtotime('+1 day 19:00'));
$selected_osobe = isset($_GET['osobe']) ? (int)$_GET['osobe'] : 2;
?>
<?php include 'header.php'; ?>

<div class="container" style="padding: 40px 0;">
    <div class="text-center mb-5">
        <h2 class="animate__animated animate__fadeInDown">Rezervacija stola (Static Demo)</h2>
        <p class="text-secondary">Popunite formu da vidite simulaciju rezervacije.</p>
    </div>
    
    <div class="form-container animate__animated animate__fadeInUp">
        <?php if ($success_msg): ?>
            <div class="alert alert-success animate__animated animate__bounceIn"><?= $success_msg ?></div>
        <?php endif; ?>
        <?php if ($error_msg): ?>
            <div class="alert alert-error animate__animated animate__shakeX"><?= $error_msg ?></div>
        <?php endif; ?>
        
        <form action="rezervacija_static.php" method="POST">
            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                <div class="form-group">
                    <label for="sto_id">Izaberite sto (Test Podaci) *</label>
                    <select id="sto_id" name="sto_id" required>
                        <option value="">-- Odaberite sto --</option>
                        <?php
                        foreach ($stolovi_data as $sto) {
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
                    <label for="ime_prezime">Vaše ime i prezime *</label>
                    <input type="text" id="ime_prezime" name="ime_prezime" required placeholder="Npr. Marko Marković">
                </div>
                <div class="form-group">
                    <label for="email">Email adresa *</label>
                    <input type="email" id="email" name="email" required placeholder="primer@email.com">
                </div>
                <div class="form-group">
                    <label for="telefon">Broj telefona *</label>
                    <input type="tel" id="telefon" name="telefon" required placeholder="Npr. +381 60 1234567">
                </div>
            </div>
            <div class="form-group">
                <label for="zahtev">Poseban zahtev (opciono)</label>
                <textarea id="zahtev" name="zahtev" rows="3" placeholder="Npr. dečija stolica, proslava rođendana, alergije..."></textarea>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 20px; padding: 15px;">Potvrdi rezervaciju (SIMULACIJA)</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
