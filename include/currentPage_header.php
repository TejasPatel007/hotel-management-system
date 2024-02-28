<?php include('header.php') ?>
<?php
$withExt = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$curPageName = str_replace('.php', '', $withExt);
?>