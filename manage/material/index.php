<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/dataTable.php';
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> ข้อมูลวัสดุ</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
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
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>บาร์โค๊ด</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>ประเภท</th>
                            <th>ดำเนินการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $materials = ORM::for_table('material')
                            ->table_alias('m')
                            ->select('m.*')
                            ->select('t.name', 'type_name')
                            ->select('u.name', 'unit_name')
                            ->join('material_type', array('m.type_id', '=', 't.id'), 't')
                            ->join('unit', array('m.unit_id', '=', 'u.id'), 'u')
                            ->find_many();
                        $i = 1;
                        foreach ($materials as $material): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $material['barcode'] ?></td>
                                <td><?= $material['name'] ?></td>
                                <td><?= $material['type_name'] . '/' . $material['unit_name'] ?></td>
                                <td>

                                    <div class="btn-group">

                                        <button href="#imageUrl" data-id="/uploads/material/<?= $material['image'] ?>"
                                                data-detail="<?= $material['detail'] ?>"
                                                class="btn btn-info openModalDetail thumbnail" data-toggle="modal"><i
                                                    class="fa fa-info"></i> ข้อมูล
                                        </button>


                                        <button type="button" data-id="<?= $material['id'] ?>"
                                                class="btn btn-primary edit"><i class="fa fa-edit"></i>แก้ไข
                                        </button>
                                        <button class="btn btn-danger btn-sm delete"
                                                data-id="<?= $material['id'] ?>"
                                                data-name="<?= $material['name'] ?>"><i class="fa fa-trash"></i>ลบ
                                        </button>
                                    </div>
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
<div class="modal fade" id="imageUrl" tabindex="-1" role="dialog" aria-labelledby="imageUrlLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดวัสดุ</h4>
            </div>
            <div class="modal-body">
                <img id="img" width="200" class="img-responsive" src="" alt="">
                <p class="detail" id="detail"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger center-block" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Thai.json"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'เพิ่มรายการใหม่',
                    className: "btn btn-primary",
                    action: function () {
                        window.location.href = "create.php";
                    }
                }
            ],

        });

        $(document).on("click", ".openModalDetail", function () {
            var imageId = $(this).data('id');
            var detail = $(this).data('detail');
            document.getElementById("detail").innerHTML = detail;
            $(".modal-body #img").attr("src", imageId);

        });


        $("button.edit").click(function () {
            let id = $(this).data('id');
            window.location.href = 'edit.php?id=' + id;
        });

        $("button.delete").click(function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            swal({
                title: 'กรุณายืนยันการลบ',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then(function () {
                window.location.href = 'delete.php?id=' + id;
            });
        });


    });


</script>