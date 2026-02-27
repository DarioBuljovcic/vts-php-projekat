<?php include 'header.php'; ?>

<section class="hero animate__animated animate__fadeIn">
    <div class="container">
        <div class="hero-badge animate__animated animate__fadeInDown"> Dobrodošli</div>
        <h1 class="animate__animated animate__slideInDown">Dario<br><span>Buljovčić</span></h1>
        <p class="animate__animated animate__fadeInUp animate__delay-1s">
            Student informacionih tehnologija | Web developer | Programer
        </p>
        <p class="animate__animated animate__fadeInUp animate__delay-1s date-display">
            <i class="fas fa-calendar-alt"></i> Danas je: <strong><?php echo date("d.m.Y."); ?></strong>
        </p>
        <div class="hero-btns animate__animated animate__zoomIn animate__delay-1s">
            <a href="projekti.php" class="btn-primary">Moji projekti</a>
            <a href="student.php" class="btn-secondary">O studentu</a>
        </div>
    </div>
</section>

<section class="container section-pad">
    <h2 class="animate__animated animate__fadeInUp">Šta radim?</h2>
    <div class="grid3">
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-code"></i></div>
            <h3>Web razvoj</h3>
            <p>Izrada web aplikacija koristeći moderne tehnologije kao što su HTML5, CSS3, JavaScript i PHP.</p>
        </div>
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-database"></i></div>
            <h3>Baze podataka</h3>
            <p>Projektovanje i upravljanje relacionim bazama podataka – MySQL, normalizacija, SQL upiti.</p>
        </div>
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-mobile-alt"></i></div>
            <h3>Responsive dizajn</h3>
            <p>Stranice koje izgledaju savršeno na svim uređajima – od mobilnih telefona do desktop ekrana.</p>
        </div>
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-terminal"></i></div>
            <h3>Algoritmi</h3>
            <p>Rešavanje programerskih problema, algoritmi pretrage i sortiranja, analiza složenosti.</p>
        </div>
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-shield-alt"></i></div>
            <h3>Sigurnost</h3>
            <p>Osnove sajber bezbednosti, prevencija SQL injekcija, XSS napada i bezbedno upravljanje sesijama.</p>
        </div>
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
            <h3>Kontinualno učenje</h3>
            <p>Uvek u toku sa najnovijim tehnologijama i trendovima u IT industriji.</p>
        </div>
    </div>
</section>

<section class="cta-section animate__animated animate__fadeIn">
    <div class="container text-center">
        <h2>Zainteresovani za saradnju?</h2>
        <p>Slobodno mi se javite – uvek sam otvoren za nove projekte i izazove.</p>
        <a href="kontakt.php" class="btn-primary">Pišite mi</a>
    </div>
</section>

<?php include 'footer.php'; ?>
