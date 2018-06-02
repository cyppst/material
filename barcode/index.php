<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/pixie_config.php';
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $result = ORM::for_table('equipment_history')
        ->where('user_id', $_SESSION['user']['id'])
        ->where('status', 'รับอุปกรณ์แล้ว')
        ->where('student_id', $student_id)
        ->find_many();

} else {
    $result = ORM::for_table('equipment_history')
        ->where('user_id', $_SESSION['user']['id'])
        ->where('status', 'รับอุปกรณ์แล้ว')
        ->where('student_id', NULL)
        ->find_many();
}

?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> คืนอุปกรณ์
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="tile">
                    <div class="row">
                        <div class="col-md-12">
                            <form autocomplete="no" action="confirm.php" method="POST">
                                <div class="tile">
                                    <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="barcode"> <i class="fas fa-barcode"></i>
                                                </label>
                                                <input class="form-control" name="student_id" type="text" data-barcode-scanner-target
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
    </div>
    </div>
    <div class="clearfix"></div>


</main>

<
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
