<?php
/**
 * functions.php - PHP funkcije za manipulaciju podacima
 */

require_once 'db.php';

// --- STOLOVI ---

function get_all_stolovi()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM stolovi ORDER BY kapacitet ASC");
    return $stmt->fetchAll();
}

function get_sto_by_id($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM stolovi WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_sto($naziv, $kapacitet, $opis)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO stolovi (naziv, kapacitet, opis) VALUES (?, ?, ?)");
    return $stmt->execute([$naziv, $kapacitet, $opis]);
}

function update_sto($id, $naziv, $kapacitet, $opis)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE stolovi SET naziv = ?, kapacitet = ?, opis = ? WHERE id = ?");
    return $stmt->execute([$naziv, $kapacitet, $opis, $id]);
}

function delete_sto($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM stolovi WHERE id = ?");
    return $stmt->execute([$id]);
}

function search_slobodni_stolovi($kapacitet, $datum_vreme)
{
    global $pdo;
    // Tražimo stolove koji ispunjavaju kapacitet i NISU rezervisani u tom terminu (+/- 2 sata preklapanje vizuelno, radi jednostavnosti odbacujemo sve koji su zauzeti tad)
    $sql = "
        SELECT s.* 
        FROM stolovi s
        WHERE s.kapacitet >= :kapacitet
        AND s.id NOT IN (
            SELECT r.sto_id 
            FROM rezervacije r 
            WHERE r.status != 'odbijena' 
            AND (r.datum_vreme <= DATE_ADD(:datum_vreme, INTERVAL 2 HOUR) AND DATE_ADD(r.datum_vreme, INTERVAL 2 HOUR) >= :datum_vreme2)
        )
        ORDER BY s.kapacitet ASC
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'kapacitet' => $kapacitet,
        'datum_vreme' => $datum_vreme,
        'datum_vreme2' => $datum_vreme
    ]);
    return $stmt->fetchAll();
}

// --- REZERVACIJE ---

function get_all_rezervacije()
{
    global $pdo;
    $stmt = $pdo->query("
        SELECT r.*, s.naziv AS sto_naziv 
        FROM rezervacije r 
        JOIN stolovi s ON r.sto_id = s.id 
        ORDER BY r.datum_vreme DESC
    ");
    return $stmt->fetchAll();
}

function get_rezervacija_by_id($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM rezervacije WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_rezervacija($sto_id, $ime_prezime, $email, $telefon, $datum_vreme, $broj_osoba, $zahtev)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO rezervacije (sto_id, ime_prezime, email, telefon, datum_vreme, broj_osoba, zahtev) VALUES (?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$sto_id, $ime_prezime, $email, $telefon, $datum_vreme, $broj_osoba, $zahtev]);
}

function update_rezervacija_status($id, $status)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE rezervacije SET status = ? WHERE id = ?");
    return $stmt->execute([$status, $id]);
}

function update_rezervacija($id, $sto_id, $ime_prezime, $email, $telefon, $datum_vreme, $broj_osoba, $zahtev, $status)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE rezervacije SET sto_id = ?, ime_prezime = ?, email = ?, telefon = ?, datum_vreme = ?, broj_osoba = ?, zahtev = ?, status = ? WHERE id = ?");
    return $stmt->execute([$sto_id, $ime_prezime, $email, $telefon, $datum_vreme, $broj_osoba, $zahtev, $status, $id]);
}

function delete_rezervacija($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM rezervacije WHERE id = ?");
    return $stmt->execute([$id]);
}

/** Sanitize input */
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
