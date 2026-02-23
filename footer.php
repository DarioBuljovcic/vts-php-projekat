    </main>
    <footer>
        <div class="container">
            <p>&copy; <?= date('Y'); ?> Gourmet Restoran. Sva prava zadržana.</p>
            <p>Subotica, Srbija | <a href="admin/index.php">Admin Panel</a></p>
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
                        // Don't close the menu if clicking the dropdown button
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
