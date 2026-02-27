<?php 
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = "Hvala vam na poruci! Naš tim će vas kontaktirati u najkraćem roku.";
}
include 'header.php'; 
?>

<div class="container" style="padding: 40px 0;">
    <h2>Kontaktirajte nas</h2>
    
    <div class="form-container">
        <?php if ($msg): ?>
            <div class="alert alert-success"><?= $msg ?></div>
        <?php endif; ?>
        
        <div style="margin-bottom: 30px; text-align: center;">
            <p><strong>Mesto:</strong> 24000 Subotica, Srbija</p>
            <p><strong>Telefon:</strong> +381 61 22 55625</p>
            <p><strong>Email:</strong> buljovcicdario@gmail.com</p>
        </div>

        <form action="#" method="post">
            <div class="form-group">
                <label for="ime">Ime i prezime</label>
                <input type="text" id="ime" name="ime" required>
            </div>
            <div class="form-group">
                <label for="email">Email adresa</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="poruka">Poruka</label>
                <textarea id="poruka" name="poruka" required></textarea>
            </div>
            <button type="submit" class="btn-primary" style="width: 100%;">Pošalji poruku</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
