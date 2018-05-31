<!-- Start Barcode Input -->
<script src="/assets/js/plugins/jquery-barcodeListener.js"></script>
<script>
    $('body').barcodeListener().on('barcode.valid', function (e, barcode) {
        $('#barcode').val(barcode);

        <?php if (basename($_SERVER['PHP_SELF']) !== 'create.php') :?>
        $('form').submit();
        <?php endif;?>

    })
</script>
<input type="text"
       class="form-control" name="barcode" id="barcode"
       oninvalid="this.setCustomValidity('กรุณาสแกน Barcode หรือกรอกรหัครุภัณฑ์')"
       required readonly>
<!-- End Barcode Input -->