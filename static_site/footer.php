    </main>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="logo">DARIO<span>.DEV</span></div>
                    <p>Student Informacionih Tehnologija.</p>
                </div>
                <div class="footer-links">
                    <h4>Stranice</h4>
                    <ul>
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="student.php">Student</a></li>
                        <li><a href="o-meni.php">O meni</a></li>
                        <li><a href="projekti.php">Projekti</a></li>
                        <li><a href="vestine.php">Veštine</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="linkovi.php">Linkovi</a></li>
                        <li><a href="kontakt.php">Kontakt</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Kontakt</h4>
                    <p><i class="fas fa-envelope"></i> buljovcicdario@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Subotica, Srbija</p>
                    <div class="footer-socials">
                        <a href="https://github.com" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                        <a href="https://linkedin.com" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y'); ?> Dario Buljovčić. Sva prava zadržana.</p>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const burger = document.getElementById('burger');
            const nav = document.getElementById('nav-links');
            const overlay = document.getElementById('nav-overlay');
            const body = document.body;

            const toggleMenu = () => {
                nav.classList.toggle('nav-active');
                burger.classList.toggle('toggle');
                overlay.classList.toggle('nav-active');
                body.classList.toggle('nav-open');
            };

            const closeMenu = () => {
                nav.classList.remove('nav-active');
                burger.classList.remove('toggle');
                overlay.classList.remove('nav-active');
                body.classList.remove('nav-open');
            };

            if(burger && nav && overlay) {
                burger.addEventListener('click', toggleMenu);
                overlay.addEventListener('click', closeMenu);

                const navLinks = document.querySelectorAll('.nav-links a');
                navLinks.forEach(link => {
                    link.addEventListener('click', (e) => {
                        if (link.classList.contains('dropbtn')) {
                            link.parentElement.classList.toggle('active');
                            return;
                        }
                        closeMenu();
                    });
                });
            }
        });
    </script>
</body>
</html>
