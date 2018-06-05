<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-page"></i> เบิกวัสดุ
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
                <form autocomplete="no" action="confirm.php" method="POST">
                    <div class="tile">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="barcode">สแกน Barcode <i class="fas fa-barcode"></i>
                                                </label>
                                                <?php
                                                include $_SERVER['DOCUMENT_ROOT'] . '/include/barcode.php';
                                                include $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                </form>
            </div>

            <?php
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'update.php'):
            session_start();
            require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php';
            $sth = $pdo->query("SELECT  m.name material_name, t.name type_name, amount FROM material_history AS h
LEFT JOIN material AS m ON h.material_id = m.id
LEFT JOIN material_type AS t ON m.type_id = t.id");
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="row">
                <div class="col">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th class="text-center">วัันที่/เวลา</th>
                            <th class="text-center">Barcode</th>
                            <th class="text-center">ชื่อครุภัณฑ์</th>
                            <th class="text-center">ชระเภท</th>
                            <th class="text-center">จำนวน</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($result as $row => $link): ?>
                            <tr>
                                <td><?= $link['datetime'] ?></td>
                                <td><?= $link['barcode'] ?></td>
                                <td><?= $link['material_type'] ?></td>
                                <td><?= $link['amount'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </main>
    <script src="/assets/js/plugins/jquery-barcodeListener.js"></script>
    <script>
        $('body').barcodeListener().on('barcode.valid', function (e, barcode) {
            $('#barcode').val(barcode);
            $('form').submit();

        })
    </script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>