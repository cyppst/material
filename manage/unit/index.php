<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> ข้อมูลหน่วยนับ</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="#">ข้อมูลหน่วยนับ</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col">
            <?php get_message(); ?>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <div class="title-header">
                    <a href="create.php" class="btn btn-primary mb-4">เพิ่มรายการ</a>
                </div>

                <div class="tile-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">รหัสหน่วยนับ</th>
                            <th class="text-center">ชื่อหน่วยนับ</th>
                            <th class="text-center">ดำเนินการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $units = ORM::for_table('unit')->find_many();

                        foreach ($units as $unit) :?>
                            <tr>
                                <td><?= $unit['id'] ?></td>
                                <td><?= $unit['name'] ?></td>
                                <td>
                                    <button type="button" data-id="<?= $unit['id'] ?>"
                                            class="btn btn-primary edit"><i class="fa fa-edit"></i>แก้ไข
                                    </button>
                                    <button class="btn btn-danger btn-sm delete"
                                            data-id="<?= $unit['id'] ?>"
                                            data-name="<?= $unit['name'] ?>"><i class="fa fa-trash"></i>ลบ
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $("button.edit").click(function () {
        var id = $(this).data("id");
        window.location.href = 'edit.php?id=' + id;
    });
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/delete.php'; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
