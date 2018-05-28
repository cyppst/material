<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> เพิ่มอุปกรณ์
            </h1>
            <!--            <p>Start a beautiful journey here</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="barcode" class="form-group">
                                <label for="barcode">แสกน Barcode <i class="fas fa-barcode"></i>
                                </label>
                                <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                <input class="form-control" name="barcode" type="text"
                                       value="<?= get_input('barcode') ?>" data-barcode-scanner-target
                                       readonly>
                                <small class="form-text text-muted" id="text-barcode">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="no_barcode"
                                               id="no_barcode"
                                               value="true">
                                        ไม่มี Barcode
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">name</label>
                                <input class="form-control" id="name" name="name"
                                       value="<?= get_input('name') ?>"
                                       type="text"
                                       placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">รายละเอียด</label>
                                <textarea class="form-control" name="detail" rows="4"
                                          placeholder="Enter your Detail" required><?= get_input('detail') ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                                <input type="file" class="form-control" name="pictures" accept="image/*"/>
                            </div>

                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">เพิ่ม</button>
                    </div>

            </form>

        </div>
    </div>

</main>
<script type="text/javascript">
    $(function () {
        $("#no_barcode").click(function () {
            if ($(this).is(":checked")) {
                $("#barcode").hide();
            } else {
                $("#barcode").show();
            }
        });
    });
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
