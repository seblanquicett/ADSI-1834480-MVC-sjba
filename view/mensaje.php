<?php
if (isset($_REQUEST['m'])) {
    $mjs = Conexion::encryptor('decrypt', $_REQUEST['m'] );
?>
    <div class="alert alert-success text-center" id="alert" role="alert">
        <?=$mjs?>
    </div>
<?php
}
?>

<script>
    $("#alert").fadeTo(2000, 500).slideUp(700, function(){
       $("#success-alert").slideUp(500);
});
</script>
