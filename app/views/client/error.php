<?php
$title = "ОШИБКА 404";
ob_start(); 
?>

<div class="container">
    <br><br><br>
    <h1>
        ИЗВИНИТЕ, НЕПРАВИЛЬНЫЙ АДРЕС. :)
    </h1>
    <h2 class="center">ОШИБКА 404</h2>
    <br><br><br>
</div>

<?php
$content = ob_get_clean();
include_once(__DIR__ . '/../layout.php');

?>
