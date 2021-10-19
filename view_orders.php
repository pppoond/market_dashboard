<?php
include_once "./check_login.php";
$title = "Orders";
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
                        <li class="breadcrumb-item active" aria-current="page">orders</li>
                    </ol>
                </nav>
                <h1 class="h2">คำสั่งซื้อ</h1>
                <p>จัดการการคำสั่งซื้อ</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">คำสั่งซื้อ
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
                                                <th scope="col">order_id</th>
                                                <th scope="col">store_id</th>
                                                <th scope="col">rider_id</th>
                                                <th scope="col">customer_id</th>
                                                <th scope="col">address_id</th>
                                                <th scope="col">order_date</th>
                                                <th scope="col">total</th>
                                                <th scope="col">cash_method</th>
                                                <th scope="col">status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyorders">

                                        </tbody>
                                    </table>
                                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterRider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterRiderTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="input_rider_id">ID</label>
                        <input type="text" class="form-control" id="input_rider_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_rider_username" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_rider_password" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_rider_name" disabled>
                    </div>

                    <div class="pb-3">
                        <label for="input_rider_phone">มือถือ</label>
                        <input type="number" class="form-control" id="input_rider_phone" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_profile_image">โปรไฟล์</label>
                        <input type="number" class="form-control" id="input_rider_profile_image" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_wallet">วอลเลต</label>
                        <input type="number" class="form-control" id="input_rider_wallet" disabled>
                    </div>
                    <div class="d-flex">
                        <div class="pb-3">
                            <label for="input_rider_lat">Latitude</label>
                            <input type="number" class="form-control" id="input_rider_lat" disabled>
                        </div>
                        <div class="pb-3">
                            <label for="input_rider_lng">Longtitude</label>
                            <input type="number" class="form-control" id="input_rider_lng" disabled>
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_status">status</label>
                        <input type="number" class="form-control" id="input_rider_status" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterStoreTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="input_store_id">ID</label>
                        <input type="text" class="form-control" id="input_store_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_store_username" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_store_password" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_store_name" disabled>
                    </div>

                    <div class="pb-3">
                        <label for="input_store_phone">มือถือ</label>
                        <input type="number" class="form-control" id="input_store_phone" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_profile_image">โปรไฟล์</label>
                        <input type="number" class="form-control" id="input_store_profile_image" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_wallet">วอลเลต</label>
                        <input type="number" class="form-control" id="input_store_wallet" disabled>
                    </div>
                    <div class="d-flex">
                        <div class="pb-3">
                            <label for="input_store_lat">Latitude</label>
                            <input type="number" class="form-control" id="input_store_lat" disabled>
                        </div>
                        <div class="pb-3">
                            <label for="input_store_lng">Longtitude</label>
                            <input type="number" class="form-control" id="input_store_lng" disabled>
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_status">status</label>
                        <input type="number" class="form-control" id="input_store_status" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdatestore()">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterCustomerTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="input_customer_id">ID</label>
                        <input type="text" class="form-control" id="input_customer_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_customer_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_customer_username" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_customer_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_customer_password" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_customer_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_customer_name" disabled>
                    </div>

                    <div class="pb-3">
                        <label for="input_customer_phone">มือถือ</label>
                        <input type="number" class="form-control" id="input_customer_phone" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_customer_phone">เพศ</label>
                        <select class="custom-select custom-select-sm" id="input_customer_sex" disabled>

                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                            <option value="3">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="input_customer_profile_image">โปรไฟล์</label>
                        <input type="text" class="form-control" id="input_customer_profile_image" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterAddressTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="input_address_address_id">ID</label>
                        <input type="text" class="form-control" id="input_address_address_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_address_customer_id">CUSTOMER_ID</label>
                        <input type="text" class="form-control" id="input_address_customer_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_address_address">ที่อยู่</label>
                        <input type="password" class="form-control" id="input_address_address" disabled>
                    </div>
                    <div class="d-flex">
                        <div class="pb-3">
                            <label for="input_address_lat">Latitude</label>
                            <input type="number" class="form-control" id="input_address_lat" disabled>
                        </div>
                        <div class="pb-3">
                            <label for="input_address_lng">Longtitude</label>
                            <input type="number" class="form-control" id="input_address_lng" disabled>
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="input_address_addr_status">สถานะ</label>
                        <select class="custom-select custom-select-sm" id="input_address_addr_status" disabled>

                            <option value="1">ค่าเริ่มต้น</option>
                            <option value="0">ไม่ได้ใช้งาน</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterOrderTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">แก้ไข</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="input_order_order_id">ORDER_ID</label>
                        <input type="text" class="form-control" id="input_order_order_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_order_store_id">STORE_ID</label>
                        <input type="text" class="form-control" id="input_order_store_id">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_rider_id">RIDER_ID</label>
                        <input type="text" class="form-control" id="input_order_rider_id">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_customer_id">CUSTOMER_ID</label>
                        <input type="text" class="form-control" id="input_order_customer_id">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_address_id">ADDRESS_ID</label>
                        <input type="text" class="form-control" id="input_order_address_id">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_order_date">ORDER_DATE</label>
                        <input type="text" class="form-control" id="input_order_order_date">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_total">TOTAL</label>
                        <input type="text" class="form-control" id="input_order_total">
                    </div>
                    <div class="pb-3">
                        <label for="input_order_cash_method">สถานะ</label>
                        <select class="custom-select custom-select-sm" id="input_order_cash_method">
                            <option value="1">
                                <p class="text-danger">เงินสด</p>
                            </option>
                            <option value="2">
                                <p class="text-warning">พร้อมเพย์</p>
                            </option>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="input_order_status">สถานะ</label>
                        <select class="custom-select custom-select-sm" id="input_order_status">
                            <option value="0">
                                <p class="text-danger">รอยืนยันคำสั่งซื้อ</p>
                            </option>
                            <option value="1">
                                <p class="text-warning">กำลังเตรียมสินค้า</p>
                            </option>
                            <option value="2">
                                <p class="text-warning">กำลังไปส่งสินค้า</p>
                            </option>
                            <option value="3">
                                <p class="text-primary">ถึงแล้ว</p>
                            </option>
                            <option value="4">
                                <p class="text-success">ได้รับสินค้าแล้ว</p>
                            </option>
                            <option value="5">
                                <p class="text-muted">ยกเลิก</p>
                            </option>
                        </select>
                    </div>
                    <div class="pb-3">
                        <label for="input_order_time_reg">TIME_REG</label>
                        <input type="text" class="form-control" id="input_order_time_reg" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button onclick="confirmUpdateOrder()" type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterOrderDetail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detail_body"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button onclick="confirmUpdateOrder()" type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once "./include_js.php";
    ?>
    <script>
        var html, data;
        $(document).ready(function() {
            console.log('Payments');
            $("#tbodyorders").html(`<h6>Loading...</6>`);
            renderOrder();
        });

        function renderOrder() {
            console.log("Payments");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/orders.php",
                data: {},
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;
                    console.log(data);

                    for (var i = 0; i < data.length; i++) {
                        var status = '';
                        var cash = '';
                        if (data[i].status == '0') {
                            status = `
                            <p class="text-danger">รอยืนยันคำสั่งซื้อ</p>
                            `;
                        } else if (data[i].status == '1') {
                            status = `
                            <p class="text-warning">กำลังเตรียมสินค้า</p>
                            `;
                        } else if (data[i].status == '2') {
                            status = `
                            <p class="text-warning">กำลังไปส่งสินค้า</p>
                            `;
                        } else if (data[i].status == '3') {
                            status = `
                            <p class="text-primary">ถึงแล้ว</p>
                            `;
                        } else if (data[i].status == '4') {
                            status = `
                            <p class="text-success">ได้รับสินค้าแล้ว</p>
                            `;
                        } else {
                            status = `
                            <p class="text-muted">ยกเลิก</p>
                            `;
                        }

                        if (data[i].cash_method == '1') {
                            cash = '<p class="text-primary">เงินสด</p>';
                        } else {
                            cash = '<p class="text-primary">พร้อมเพย์</p>';
                        }
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].order_id}</td>
                         <td><a class="btn btn-primary" onclick="open_modal_store(${i}, ${data[i].store_id.store_id})" data-toggle="modal" data-target="#exampleModalCenterStore">${data[i].store_id.store_id}</a></td>
                         <td><a class="btn btn-primary" onclick="open_modal_rider(${i}, ${data[i].rider_id.rider_id})" data-toggle="modal" data-target="#exampleModalCenterRider">${data[i].rider_id.rider_id}</a></td>
                         <td><a class="btn btn-primary" onclick="open_modal_customer(${i}, ${data[i].customer_id.customer_id})" data-toggle="modal" data-target="#exampleModalCenterCustomer">${data[i].customer_id.customer_id}</a></td>
                         <td><a class="btn btn-primary" onclick="open_modal_address(${i}, ${data[i].address_id.address_id})" data-toggle="modal" data-target="#exampleModalCenterAddress">${data[i].address_id.address_id}</a></td>
                         <td>${data[i].order_date}</td>
                         <td>${data[i].total}</td>
                         <td>${cash}</td>
                         <td>${status}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].order_id})" class="btn btn btn-danger">ลบ</button>
                            <button onclick="open_modal_edit(${i}, ${data[i].order_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterOrder">แก้ไข</button>
                            <button onclick="open_modal_detail(${data[i].order_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterDetail">รายละเอียด</button>
                        </td>
                    </tr>
                `
                    }
                    $("#tbodyorders").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        var rider_id;

        function open_modal_rider(index, rider_id) {
            $("#input_rider_id").val(data[index].rider_id.rider_id);
            $("#input_rider_username").val(data[index].rider_id.username);
            $("#input_rider_password").val(data[index].rider_id.password);
            $("#input_rider_name").val(data[index].rider_id.rider_name);
            $("#input_rider_phone").val(data[index].rider_id.rider_phone);
            $("#input_rider_profile_image").val(data[index].rider_id.profile_image);
            $("#input_rider_wallet").val(data[index].rider_id.wallet);
            $("#input_rider_lat").val(data[index].rider_id.lat);
            $("#input_rider_lng").val(data[index].rider_id.lng);
            $("#input_rider_status").val(data[index].rider_id.rider_status);
            rider_id = rider_id;
        }

        var id_store;

        function open_modal_store(index, store_id) {
            $("#input_store_id").val(data[index].store_id.store_id);
            $("#input_store_username").val(data[index].store_id.username);
            $("#input_store_password").val(data[index].store_id.password);
            $("#input_store_name").val(data[index].store_id.store_name);
            $("#input_store_phone").val(data[index].store_id.store_phone);
            $("#input_store_profile_image").val(data[index].store_id.profile_image);
            $("#input_store_wallet").val(data[index].store_id.wallet);
            $("#input_store_lat").val(data[index].store_id.lat);
            $("#input_store_lng").val(data[index].store_id.lng);
            $("#input_store_status").val(data[index].store_id.status);
            id_store = store_id;
        }

        var id_customer;

        function open_modal_customer(index, customer_id) {
            $("#input_customer_id").val(data[index].customer_id.customer_id);
            $("#input_customer_username").val(data[index].customer_id.username);
            $("#input_customer_password").val(data[index].customer_id.password);
            $("#input_customer_name").val(data[index].customer_id.customer_name);
            $("#input_customer_phone").val(data[index].customer_id.customer_phone);
            $("#input_customer_sex").val(data[index].customer_id.sex).prop('selected', true);
            $("#input_customer_profile_image").val(data[index].customer_id.profile_image);
            id_customer = customer_id;
        }

        var address_id;

        function open_modal_address(index, address_id) {
            $("#input_address_address_id").val(data[index].address_id.address_id);
            $("#input_address_customer_id").val(data[index].address_id.customer_id);
            $("#input_address_address").val(data[index].address_id.address);
            $("#input_address_lat").val(data[index].address_id.lat);
            $("#input_address_lng").val(data[index].address_id.lng);
            $("#input_address_addr_status").val(data[index].address_id.addr_status).prop('selected', true);
            address_id = address_id;
        }

        var order_id;

        function open_modal_edit(index, order_id) {
            console.log(order_id);
            $("#input_order_order_id").val(data[index].order_id);
            $("#input_order_store_id").val(data[index].store_id.store_id);
            $("#input_order_rider_id").val(data[index].rider_id.rider_id);
            $("#input_order_customer_id").val(data[index].customer_id.customer_id);
            $("#input_order_address_id").val(data[index].address_id.address_id);
            $("#input_order_order_date").val(data[index].order_date);
            $("#input_order_total").val(data[index].total);
            $("#input_order_cash_method").val(data[index].cash_method).prop('selected', true);
            $("#input_order_status").val(data[index].status).prop('selected', true);
            $("#input_order_time_reg").val(data[index].time_reg);
            order_id = data[index].order_id;
        }

        function open_modal_detail(order_id) {
            console.log(order_id);
            $("#detail_body").html(`<h6>Loading...</6>`);
            orderDetailByOrderId(order_id);
        }

        function confirm_delete(order_id) {
            // console.log("SSSSSS");
            swal({
                    title: "คำเตือน!",
                    text: "คุณต้องการลบหรือไม่?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        console.log(order_id);
                        deleteOrder(order_id);
                    } else {}
                });
        }

        function deleteOrder(order_id) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/delete_order.php",
                data: {
                    'order_id': order_id,
                },
                success: function(response) {
                    // console.log(response);
                    if (response.msg == 'success') {
                        swal("ลบสำเร็จ!", {
                            icon: "success",
                        });
                    } else {
                        swal("มีข้อผิดพลาด!", {
                            icon: "error",
                        });
                    }
                    renderOrder();
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function confirmUpdateOrder() {
            console.log($("#input_order_order_id").val());
            if (
                $("#input_order_order_id").val() != '' &&
                $("#input_order_store_id").val() != '' &&
                $("#input_order_rider_id").val() != '' &&
                $("#input_order_customer_id").val() != '' &&
                $("#input_order_address_id").val() != ''
            ) {
                Swal.fire({
                    title: 'คุณต้องการบันทึกหรือไม่?',
                    text: "หากไม่ต้องการ กรุณากดยกเลิก!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#D5D8DC',
                    confirmButtonText: 'บันทึก',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateOrder();
                    }
                })
            }

        }

        function updateOrder() {
            console.log($("#input_order_order_id").val());
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_order.php",
                data: {
                    'order_id': $("#input_order_order_id").val(),
                    'store_id': $("#input_order_store_id").val(),
                    'rider_id': $("#input_order_rider_id").val(),
                    'customer_id': $("#input_order_customer_id").val(),
                    'address_id': $("#input_order_address_id").val(),
                    'order_date': $("#input_order_order_date").val(),
                    'total': $("#input_order_total").val(),
                    'cash_method': $("#input_order_cash_method").val(),
                    'order_status': $("#input_order_status").val()
                },
                success: function(response) {
                    console.log(response.msg);
                    if (response.msg == 'success') {
                        renderOrder();
                        swal("บันทึกสำเร็จ!", {
                            icon: "success",
                        });
                    } else {
                        swal("มีข้อผิดพลาด!", {
                            icon: "error",
                        });
                    }
                },
                error: function(err) {
                    console.log("bad", err);
                }
            })
        }

        function orderDetailByOrderId(order_id) {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: `./api/order_details.php?order_id=${order_id}`,
                success: function(response) {
                    var html = ``;
                    var detail = ``;
                    var total = 0;
                    console.log(response);
                    response.result.forEach(element => {
                        detail += `
                        <p>${element.order_detail_id} ${element.product_id.product_name} ${element.product_id.price}฿ x ${element.quantity} = ${element.quantity * element.product_id.price}฿</p>
                        `;
                        total += element.quantity * element.product_id.price;
                    });
                    html = `
                    <h3>${response.result[0].order_id.store_id.store_name}</h3>
                    ${detail}
                    <p>รวม ${total}</p>
                    `;
                    $("#detail_body").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            })
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#input_order_order_date").datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
</body>

</html>