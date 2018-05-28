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
            <h1><i class="fa fa-dashboard"></i> คืนอุปกรณ์
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
                            <form id="in" action="confirm.php" method="POST">
                                <div class="tile">
                                    <script src="/assets/js/plugins/barcode-scanner.js"></script>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="barcode">สแกนบัตรนักศึกษา <i class="fas fa-barcode"></i>
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
    <div class="tile">
        <h3 class="tile-title">รายการยืมอุปกรณ์</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>วัน / เวลาที่ยืม</th>
                    <th>ชื่ออุปกรณ์</th>
                    <th>จำนวน</th>
                    <th>ดำเนินการ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        <td><?= Date::createFromTimeString($row->datetime)->add('543 years')->format('l j F Y H:i:s') ?></td>
                        <td><?= $row->equipment_id ?></td>
                        <td><?= $row->amount ?></td>
                        <td>

                            <button type="button" class="btn btn-primary"
                                    data-name="<?= $row->name ?>" href="return.php?id=<?= $row->id ?>"
                                    onclick="confirmReturn(<?= $row->id ?>)">
                                คืนอุปกรณ์
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>

</main>

<script type="text/javascript">
    function confirmReturn(id) {
        let name = event.target.getAttribute('data-name');

        swal({
            title: 'ยืนยัน',
            text: 'การคืน ' + name + 'หรือไม่?',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            alert('aa');
            window.location = "/manage/equipment/return/return.php?id=" + id;

        }, function (dismiss) {
            return false;
        })
    }
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
