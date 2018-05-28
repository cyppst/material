<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
<script src="/assets/js/plugins/barcode-scanner.js"></script>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> ยืมอุปกรณ์
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form id="in" action="confirm.php" method="POST">
                <input type="hidden" name="equipment_id" id="equipment_id">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="barcode">แสกน Barcode <i class="fas fa-barcode"></i>
                                </label>
                                <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                <input class="form-control" name="barcode" type="text"  value="<?= get_input('barcode') ?>" data-barcode-scanner-target
                                       readonly>

                            </div>
                        </div>
                    </div>

                </div>
            </form>
            </form>
        </div>
    </div>

</main>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
