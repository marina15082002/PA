<?php include __DIR__ . "\header.php";?>

<style>
main {
    display: flex;
    width: 100%;
    flex-direction: column;
    align-items: center;
}
</style>
<main>
    <h1><?php echo $lang['TITLE_PRINT_COLLECT']; ?></h1>

    <a href="/PA/<?php echo $language; ?>/addProduct"><?php echo $lang['LINK_ADD_PRODUCT']; ?></a>
    <a href="/PA/<?php echo $language; ?>/"><?php echo $lang['LINK_HOME']; ?></a>
</main>
