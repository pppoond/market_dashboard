<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตลาดสด - Login</title>
    <?php
    include_once "./include_css.php";
    ?>
    <style>
        .box-card {
            width: 100%;
            height: 100vh;
            /* background-color: green; */
        }
    </style>
</head>

<body>



    <div class="box-card d-flex align-items-center justify-content-center">
        <div class="container col-10 col-sm-4 p-3 border rounded">
            <div class="row">
                <div>
                    <div class="d-flex justify-content-center">
                        <h3>ตลาดสด - ผู้ดูแลระบบ</h3>
                    </div>
                    <div>
                        <form method="POST">
                            <div>
                                <label class="mb-1" for="">ชื่อผู้ใช้</label>
                                <input id="form_username" type="text" class="form-control" placeholder="ชื่อผู้ใช้">
                            </div>
                            <div class="mt-3">
                                <label class="mb-1" for="">รหัสผ่าน</label>
                                <input id="form_password" type="password" class="form-control" placeholder="รหัสผ่าน">
                            </div>
                            <div class="d-flex justify-content-center">
                                <a id="buttonLogin" class="btn btn-secondary mt-3">เข้าสู่ระบบ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-xs-1 center-block">
            <center>
                <span>aaaaaaaaaaaaaaaaaaaaaaaaaaa</span>
            </center>
        </div>
    </div> -->
    <?php
    include_once "./include_js.php";
    ?>
</body>

</html>