<script>
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
        }).then(result => {
            if (result.value) {
                window.location.href = 'delete.php?id=' + id;

            } else {
                // handle dismissals
                // result.dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
            }
        })
    });
</script>