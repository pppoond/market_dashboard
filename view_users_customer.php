<?php
$title = "Users";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตลาดสด - <?php
                    echo $title;
                    ?></title>
    <?php
    include_once "./include_css.php";
    ?>
</head>

<body>
    <?php
    include_once "./include_appbar.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once "./include_sidebar.php";
            ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">หน้าแรก</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="./view_users.php">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customers</li>
                    </ol>
                </nav>
                <h1 class="h2">ลูกค้า</h1>
                <p>จัดการลูกค้า</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">ลูกค้า

                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">ค้นหา</div>
                                        </div>
                                        <input id="find_customer_username" type="text" class="form-control" id="inlineFormInputGroup" placeholder="username...">
                                    </div>
                                </div>
                            </h5>



                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">id</th>
                                                <th scope="col">username</th>
                                                <th scope="col">name</th>
                                                <th scope="col">phone</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodycustomer">
                                            <!-- <?php
                                                    // for ($i = 0; $i < 7; $i++) {

                                                    ?>
                                                <tr>
                                                    <th scope="row">17371705</th>
                                                    <td>Volt Premium</td>
                                                    <td>johndoe@gmail.com</td>
                                                    <td>€61.11</td>
                                                    <td>Aug 31 2020</td>
                                                    <td><a href="#" class="btn btn-sm btn-danger">Delete</a><a href="./view_users_customer_edit.php" class="btn btn-sm btn-warning">Edit</a><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                           View
                                                        </button></td>
                                                </tr>
                                            <?php

                                            // }
                                            ?> -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-xl-4">
                        <div class="card">
                            <h5 class="card-header">Traffic last 6 months</h5>
                            <div class="card-body">
                                <div id="traffic-chart"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <?php
                include_once "./include_footer.php";
                ?>
            </main>
        </div>
    </div>


    <?php
    include_once "./modal_edit_customer.php";
    include_once "./include_js.php";

    ?>
    <script src="./js/view_users.js"></script>
</body>

</html>