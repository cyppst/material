<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> ออกรายงานe</h1>
            <p>การเบิกวัสดุประจำเดือน</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <?php
    if (isset($_GET['month'])):
        ?>
        <div class="alert alert-info" role="alert">
            <strong> Heads up!</strong><?php var_dump($_GET); ?>
        </div>
    <?php
    endif;
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">วัสดุ</div>
                <div class="tile-body">
                    <form action="/report/material/summary.php" method="get">
                        <input type="month" name="month" id="month">
                        <button type="submit" class="btn btn-primary">
                            ออกรายงาน
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">อุปกรณ์</div>

                <div class="tile-body">
                    <form action="/report/equipment/summary.php" method="get">
                        <input type="month" name="month" id="month">
                        <button type="submit" class="btn btn-primary">
                            ออกรายงาน
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</main>
<link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/css/MonthPicker.min.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="/assets/js/MonthPicker.min.js"></script>
<script>
    // Create an inline menu by calling
    // .MonthPicker(); on a <div> or <span> tag.
    $("#month-year").MonthPicker({
        SelectedMonth: '04/' + new Date().getFullYear(),
        OnAfterChooseMonth: function (selectedDate) {
            // Do something with selected JavaScript date.
            // console.log(selectedDate);
        }
    });
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>

