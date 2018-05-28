<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> เบิกวัสดุ
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>
    <div class="row">
        <div class="col">
            <?php get_message(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="in" action="confirm.php" method="POST">
                <input type="hidden" name="material_id" id="material_id">
                <div class="tile">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="in" action="confirm.php" method="POST">
                                <div class="tile">
                                    <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="barcode">แสกน Barcode <i class="fas fa-barcode"></i>
                                                </label>
                                                <input class="form-control" name="barcode" type="text" data-barcode-scanner-target
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
            </form>
        </div>
    </div>

                </div>
            </form>
            </form>
        </div>
    </div>

</main>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
