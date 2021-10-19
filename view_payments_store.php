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
                        <li class="breadcrumb-item active" aria-current="page"><a href="./view_users.php">payments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">store</li>
                    </ol>
                </nav>
                <h1 class="h2">การชำระเงิน</h1>
                <p>จัดการการชำระเงินร้านค้า</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">ร้าน

                                <div class="col-auto d-flex">
                                    <div class="mr-1">
                                        <button id="btnAddStore" class="btn btn btn-primary" data-toggle="modal" data-target="#addModalCenter">เพิ่ม</button>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">ค้นหา</div>
                                        </div>
                                        <input id="find_store_username" type="text" class="form-control" id="inlineFormInputGroup" placeholder="username...">
                                    </div>
                                </div>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">wd_store_id</th>
                                                <th scope="col">store_id</th>
                                                <th scope="col">total</th>
                                                <th scope="col">bank_name</th>
                                                <th scope="col">no_bank_account</th>
                                                <th scope="col">pay_status</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodywdstore">
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
    <div class="modal fade" id="exampleModalCenterWithdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterStoreTitle" aria-hidden="true">
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
                        <label for="input_witdraw_wd_store_id">WD_STORE_ID</label>
                        <input type=" text" class="form-control" id="input_witdraw_wd_store_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_witdraw_store_id">STORE_ID</label>
                        <input type="text" class="form-control" id="input_witdraw_store_id" disabled>
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
            $("#tbodywdstore").html(`<h6>Loading...</6>`);

            if (document.querySelector('#tbodywdstore')) {
                renderWithdrawStore();
            }

            $('#find_store_username').change(function() {
                console.log('change');
                findByUsername();
            });

            $('#btnAddStore').on('click', function() {
                console.log("Reset Textfield");
                resetTextField();
            });

        });

        function renderWithdrawStore() {
            console.log("withdraw_store");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/withdraw_stores.php",
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;

                    for (var i = 0; i < data.length; i++) {
                        var pay_status = ``;
                        if (data[i].pay_status == '0') {
                            pay_status = `
                            <button onclick="confirm_payment(${data[i].wd_store_id})" class="btn btn btn-warning">ยังไม่โอน</button>
                            `;
                        } else {
                            pay_status = `
                            <button onclick="confirm_payment(${data[i].wd_store_id})" class="btn btn btn-success">โอนแล้ว</button>
                            `;
                        }
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].wd_store_id}</td>
                         <td><a class="btn btn-primary" onclick="open_modal_store(${i}, ${data[i].store_id.store_id})" data-toggle="modal" data-target="#exampleModalCenterStore">${data[i].store_id.store_id}</a></td>
                         <td>${data[i].total}</td>
                         <td>${data[i].bank_name}</td>
                         <td>${data[i].no_bank_account}</td>
                         <td>${pay_status}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].wd_store_id})" class="btn btn btn-danger">ลบ</button>
                            <button onclick="open_modal_edit(${i}, ${data[i].wd_store_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenterWithdraw">แก้ไข</button>
                        </td>
                    </tr>
                `
                    }
                    $("#tbodywdstore").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var wd_store_id;

        function open_modal_edit(index, wd_store_id) {
            $("#input_witdraw_wd_store_id").val(data[index].wd_store_id);
            $("#input_witdraw_store_id").val(data[index].store_id.store_id);
            $("#input_witdraw_total").val(data[index].total);
            $("#input_witdraw_bank_name").val(data[index].bank_name);
            $("#input_witdraw_no_bank_account").val(data[index].no_bank_account);
            wd_store_id = wd_store_id;
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

        function confirm_payment(wd_store_id) {
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
                            update_pay_status(wd_store_id, '1');
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
                            update_pay_status(wd_store_id, '0');

                        }
                    })
                }
            })
        }

        function update_pay_status(wd_store_id, pay_status) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_withdraw_store_status.php",
                data: {
                    'wd_store_id': wd_store_id,
                    'pay_status': pay_status,
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawStore();
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

        function confirm_delete(wd_store_id) {
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
                        console.log(wd_store_id);
                        deleteWithdraw(wd_store_id);
                    } else {}
                });
        }

        function deleteWithdraw(wd_store_id) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/delete_withdraw_store.php",
                data: {
                    'wd_store_id': wd_store_id,
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawStore();
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
                        console.log(wd_store_id);
                        updateWithdraw();
                    } else {}
                });
        }

        function updateWithdraw() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_withdraw_store.php",
                data: {
                    'wd_store_id': $("#input_witdraw_wd_store_id").val(),
                    'store_id': $("#input_witdraw_store_id").val(),
                    'total': $("#input_witdraw_total").val(),
                    'bank_name': $("#input_witdraw_bank_name").val(),
                    'no_bank_account': $("#input_witdraw_no_bank_account").val(),
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderWithdrawStore();
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