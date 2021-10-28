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
                        <li class="breadcrumb-item active" aria-current="page"><a href="./view_payments.php">payments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">rider</li>
                    </ol>
                </nav>
                <h1 class="h2">การชำระเงิน</h1>
                <p>จัดการการชำระเงินไรเดอร์</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">ไรเดอร์

                                <div class="col-auto d-flex">
                                    <!-- <div class="mr-1">
                                        <button id="btnAddrider" class="btn btn btn-primary" data-toggle="modal" data-target="#addModalCenter">เพิ่ม</button>
                                    </div> -->

                                    <!-- <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">ค้นหา</div>
                                        </div>
                                        <input id="find_rider_username" type="text" class="form-control" id="inlineFormInputGroup" placeholder="username...">
                                    </div> -->
                                </div>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">wd_rider_id</th>
                                                <th scope="col">rider_id</th>
                                                <th scope="col">total</th>
                                                <th scope="col">bank_name</th>
                                                <th scope="col">no_bank_account</th>
                                                <th scope="col">pay_status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodywdrider">
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
    <div class="modal fade" id="exampleModalCenterWithdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterriderTitle" aria-hidden="true">
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
                        <label for="input_witdraw_wd_rider_id">WD_rider_ID</label>
                        <input type=" text" class="form-control" id="input_witdraw_wd_rider_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_witdraw_rider_id">rider_ID</label>
                        <input type="text" class="form-control" id="input_witdraw_rider_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_witdraw_total">จำนวนเงิน</label>
                        <input type="text" class="form-control" id="input_witdraw_total">
                    </div>
                    <div class="pb-3">
                        <label for="input_witdraw_bank_name">ชื่อธนาคาร</label>
                        <input type="text" class="form-control" id="input_witdraw_bank_name">
                    </div>
                    <div class="pb-3">
                        <label for="input_witdraw_no_bank_account">เลขบัญชี</label>
                        <input type="text" class="form-control" id="input_witdraw_no_bank_account">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdate()">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterrider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterriderTitle" aria-hidden="true">
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
                        <input type="text" class="form-control" id="input_rider_phone" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_profile_image">โปรไฟล์</label>
                        <input type="text" class="form-control" id="input_rider_profile_image" disabled>
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
                        <input type="text" class="form-control" id="input_rider_status" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
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
            $("#tbodywdrider").html(`<h6>Loading...</6>`);

            if (document.querySelector('#tbodywdrider')) {
                renderWithdrawrider();
            }

            $('#find_rider_username').change(function() {
                console.log('change');
                findByUsername();
            });

            $('#btnAddrider').on('click', function() {
                console.log("Reset Textfield");
                resetTextField();
            });

        });

        function renderWithdrawrider() {
            console.log("withdraw_rider");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/withdraw_riders.php",
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;
                    console.log(data);

                    for (var i = 0; i < data.length; i++) {
                        var pay_status = ``;
                        if (data[i].pay_status == '0') {
                            pay_status = `
                            <button onclick="confirm_payment(${data[i].wd_rider_id})" class="btn btn btn-warning">ยังไม่โอน</button>
                            `;
                        } else {
                            pay_status = `
                            <button onclick="confirm_payment(${data[i].wd_rider_id})" class="btn btn btn-success">โอนแล้ว</button>
                            `;
                        }
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].wd_rider_id}</td>
                         <td><a class="btn btn-primary" onclick="open_modal_rider(${i}, ${data[i].rider_id.rider_id})" data-toggle="modal" data-target="#exampleModalCenterrider">${data[i].rider_id.rider_id}</a></td>
                         <td>${data[i].total}</td>
                         <td>${data[i].bank_name}</td>
                         <td>${data[i].no_bank_account}</td>
                         <td>${pay_status}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].wd_rider_id})" class="btn btn btn-danger">ลบ</button>
                            <button onclick="open_modal_edit(${i}, ${data[i].wd_rider_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterWithdraw">แก้ไข</button>
                        </td>
                    </tr>
                `
                    }
                    $("#tbodywdrider").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var wd_rider_id;

        function open_modal_edit(index, wd_rider_id) {
            $("#input_witdraw_wd_rider_id").val(data[index].wd_rider_id);
            $("#input_witdraw_rider_id").val(data[index].rider_id.rider_id);
            $("#input_witdraw_total").val(data[index].total);
            $("#input_witdraw_bank_name").val(data[index].bank_name);
            $("#input_witdraw_no_bank_account").val(data[index].no_bank_account);
            wd_rider_id = wd_rider_id;
        }

        var id_rider;

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
            $("#input_rider_status").val(data[index].rider_id.status);
            id_rider = rider_id;
        }

        function confirm_payment(wd_rider_id) {
            Swal.fire({
                title: 'โอนเงิน',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'โอนแล้ว',
                denyButtonText: `ยังไม่โอน`,
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'โอนเงินแล้วหรือไม?',
                        text: "หากไม่ต้องการ กรุณากดยกเลิก!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            update_pay_status(wd_rider_id, '1');
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire({
                        title: 'ยังไม่ได้โอน?',
                        text: "หากไม่ต้องการ กรุณากดยกเลิก!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            update_pay_status(wd_rider_id, '0');

                        }
                    })
                }
            })
        }

        function update_pay_status(wd_rider_id, pay_status) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_withdraw_rider_status.php",
                data: {
                    'wd_rider_id': wd_rider_id,
                    'pay_status': pay_status,
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawrider();
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

        function confirm_delete(wd_rider_id) {
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
                        console.log(wd_rider_id);
                        deleteWithdraw(wd_rider_id);
                    } else {}
                });
        }

        function deleteWithdraw(wd_rider_id) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/delete_withdraw_rider.php",
                data: {
                    'wd_rider_id': wd_rider_id,
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawrider();
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

        function confirmUpdate() {
            swal({
                    title: "คำเตือน!",
                    text: "คุณต้องการบันทึกหรือไม่?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        console.log(wd_rider_id);
                        updateWithdraw();
                    } else {}
                });
        }

        function updateWithdraw() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_withdraw_rider.php",
                data: {
                    'wd_rider_id': $("#input_witdraw_wd_rider_id").val(),
                    'rider_id': $("#input_witdraw_rider_id").val(),
                    'total': $("#input_witdraw_total").val(),
                    'bank_name': $("#input_witdraw_bank_name").val(),
                    'no_bank_account': $("#input_witdraw_no_bank_account").val(),
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawrider();
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
    </script>
</body>

</html>