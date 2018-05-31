<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and modular admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">นำเข้าข้อมูลนักศึกษา (.csv)</h3>
                <p>
                <form enctype="multipart/form-data" action="import.php" method="post">
                    File name to import & upload:<br/>
                    <input size='50' type='file' name='filename'><br/>
                    <input type='submit' name='submit' value='Upload'>
                </form>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Compatibility with frameworks</h3>
                <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to
                    it's modular nature it's very easy to incorporate it into any front-end or back-end framework like
                    Angular, React or Laravel.</p>
                <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more
                    details about integrating this theme with various frameworks.</p>
                <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue
                    on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want
                    to contribute to this theme pull requests are always welcome.</p>
            </div>
        </div>
    </div>
</main>
<?php include 'include/foot.php'; ?>

