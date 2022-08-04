<?php include __DIR__ . "\header.php";?>

<h1>Test</h1>

<?php
    if (!empty($_SESSION['id'])) {
        echo "<a href='signout'>Déconnexion</a>";
    }
?>
