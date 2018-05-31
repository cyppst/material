<?php
if (!session_id()) @session_start();


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/student/include/head.php';
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-page"></i> Blank Page</h1>
            <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">Create a beautiful dashboard</div>
            </div>
        </div>
    </div>
</main>
<?php include 'include/foot.php'; ?>

