<?php
$dir = str_replace('\\', '/', __DIR__);
$htpasswd_path = $dir . '/.htpasswd';

$htaccess_content = 'AuthType Basic
AuthName "Zasticena zona"
AuthUserFile "' . $htpasswd_path . '"
Require valid-user';

file_put_contents('.htaccess', $htaccess_content);
file_put_contents('.htpasswd', 'admin:$apr1$A4a7P1rT$G8C7N2oPZb9tFf7Iwq5Lz0');

echo "<h2>Uspešno!</h2>";
echo "<p>Fajlovi <strong>.htaccess</strong> i <strong>.htpasswd</strong> su ispravno generisani prema Vašoj putanji na disku.</p>";
echo "<p>Upisana putanja: <code>" . $htpasswd_path . "</code></p>";
echo "<p>Sada se možete ulogovati klikom ovde: <a href='index.php'>Nazad na Admin Panel</a></p>";
echo "<p><strong>User:</strong> admin <br> <strong>Password:</strong> admin123</p>";
?>
