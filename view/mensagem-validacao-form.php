<?php if (isset($_SESSION['mensagemValidacao'])): ?>
<div class="alert alert-<?= $_SESSION['tipo_mensagemValidacao']; ?>">
    <?= $_SESSION['mensagemValidacao']; ?>
</div>
<?php
    unset($_SESSION['mensagemValidacao']);
    unset($_SESSION['tipo_mensagemValidacao']);
    endif;
?>