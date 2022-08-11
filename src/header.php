<?php
    include __DIR__ . "\head.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

?>

<header>
    <h1>Header</h1>
</header>