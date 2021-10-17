<?php
include_once "./check_login.php";
$title = "Payments";
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
    <style>
        .cursor-poiter {
            cursor: pointer;
        }
    </style>
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
                        <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">payments</li>
                    </ol>
                </nav>
                <h1 class="h2">การชำระเงิน</h1>
                <p>จัดการการชำระเงิน</p>
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card cursor-poiter" id="buttonViewUsersAdmin">
                            <h5 class="card-header">ร้าน</h5>
                            <div class="card-body">
                                <h5 id="admin_count" class="card-title">0 รายการ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card cursor-poiter" id="buttonViewUsersRider">
                            <h5 class="card-header">ไรเดอร์</h5>
                            <div class="card-body">
                                <h5 id="rider_count" class="card-title">0 รายการ</h5>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include_once "./include_footer.php";
                ?>
            </main>
        </div>
    </div>
    <?php
    include_once "./include_js.php";
    ?>
    <script>
        $(document).ready(function() {
            console.log('Payments');
            $("#buttonViewUsersCustomer").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_customer.php";
            });

            $("#buttonViewUsersStore").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_store.php";
            });

            $("#buttonViewUsersRider").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_rider.php";
            });

            $("#buttonViewUsersAdmin").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_admin.php";
            });
        });

        function getCustomer() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/customers.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#customer_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getRider() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/riders.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#rider_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getAdmin() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/admins.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#admin_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getStores() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/stores.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#store_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        // function getAdmin() {
        //     $.ajax({
        //         type: "GET",
        //         dataType: "JSON",
        //         url: "./api/customers.php",
        //         data: {},
        //         success: function(response) {
        //             console.log(response.result.length);
        //             $("#customer_count").html(`${response.result.length} คน`);
        //         },
        //         error: function(err) {
        //             console.log("bad", err);
        //         }
        //     });
        // }
    </script>
</body>

</html>