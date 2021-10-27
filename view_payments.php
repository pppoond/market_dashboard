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

                        <div class="card cursor-poiter" id="buttonPaymentStore">
                            <h5 class="card-header">ถอนเงินร้าน</h5>
                            <div class="card-body">
                                <div id="count_withdraw_store"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card cursor-poiter" id="buttonWithdrawRider">
                            <h5 class="card-header">ถอนเงินไรเดอร์</h5>
                            <div class="card-body">
                                <div id="count_withdraw_rider"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card cursor-poiter" id="buttonPaymentRider">
                            <h5 class="card-header">เติมเครดิตไรเดอร์</h5>
                            <div class="card-body">
                                <div id="count_payment_rider"></div>

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
            $("#count_withdraw_store").html(`<h5 id="admin_count" class="card-title">0 รายการ</h5>`);
            $("#count_withdraw_rider").html(`<h5 id="admin_count" class="card-title">0 รายการ</h5>`);
            $("#count_payment_rider").html(`<h5 id="admin_count" class="card-title">0 รายการ</h5>`);
            $("#buttonViewUsersCustomer").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_customer.php";
            });

            $("#buttonPaymentStore").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_payments_store.php";
            });

            $("#buttonWithdrawRider").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_payments_rider.php";
            });

            $("#buttonPaymentRider").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_payments_rider_credit.php";
            });
            getWithdrawRider();
            getWithdrawStore();
            getPaymentRider();
        });

        function getCustomer() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/customers.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#count_payment_rider").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getPaymentRider() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/payment_riders.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#count_payment_rider").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getWithdrawRider() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/withdraw_riders.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#count_withdraw_rider").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getWithdrawStore() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/withdraw_stores.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    $("#count_withdraw_store").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
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
                    $("#count_payment_rider").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
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
                    $("#count_withdraw_store").html(`<h5 id="admin_count" class="card-title">${response.result.length} รายการ</h5>`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
    </script>
</body>

</html>