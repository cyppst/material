<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> รับอุปกรณ์
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
            <form autocomplete="off" action="confirm.php" method="POST">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>สแกน Barcode</label>
                                <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/barcode.php'; ?>

                                <small class="form-text text-muted" id="text-barcode">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>


        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>วัน/เวลา</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>จำนวน</th>
                            <th>ผู้ทำรายการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $logs = ORM::for_table('log')
                            ->join('user', 'user.id = log.user_id')
                            ->join('equipment', 'equipment.id = log.item_id')->find_many();
                        foreach ($logs as $log) {
                            ?>
                            <tr>
                                <td scope="row"><?= $log->datetime ?></td>
                                <td><?= $log->name ?></td>
                                <td><?= $log->amount ?></td>
                                <td><?= $log->fullname ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
