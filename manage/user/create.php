<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/head.php'; ?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> เพิ่มอาจารย์
            </h1>
            <!--            <p>Start a beautiful journey here</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form action="insert.php" method="POST">
                <div class="tile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="fullname">Name</label>
                                <input class="form-control" id="fullname" name="fullname"
                                       value="<?= get_input('name') ?>"
                                       type="text"
                                       aria-describedby="text-fullname" placeholder="Enter Name">
                                <small class="form-text text-muted" id="text-fullname">We'll never share your email with
                                    anyone else.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" id="address" name="address"
                                       value="<?= get_input('address') ?>"
                                       type="text"
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="tel">tel</label>
                                <input class="form-control" id="tel" name="tel"
                                       value="<?= get_input('tel') ?>"
                                       type="number"
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="login">login</label>
                                <input class="form-control <?= get_error_field('login') ?>" id="login" name="login"
                                       value="<?= get_input('login') ?>"
                                       type="text"
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input class="form-control" id="password" name="password"
                                       value="<?= get_input('password') ?>"
                                       type="text"
                                       placeholder="Enter Name">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="Submit">เพิ่ม</button>
                    </div>

            </form>

        </div>
    </div>

</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/foot.php'; ?>
