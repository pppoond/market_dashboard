<?php
include_once "./check_login.php";
$title = "Store";
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="./view_users.php">users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">stores</li>
                    </ol>
                </nav>
                <h1 class="h2">ร้านค้า</h1>
                <p>จัดการร้านค้า</p>
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
                                                <th scope="col">store_id</th>
                                                <th scope="col">username</th>
                                                <th scope="col">name</th>
                                                <th scope="col">phone</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodystore">
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <img src="" id="image_from_store_url" width="50%">
                    </div>
                    <div class="pb-3">
                        <label for="input_store_id">ID</label>
                        <input type="text" class="form-control" id="input_store_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_store_username">
                    </div>
                    <div class="pb-3">
                        <label for="input_store_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_store_password">
                    </div>
                    <div class="pb-3">
                        <label for="input_store_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_store_name">
                    </div>

                    <div class="pb-3">
                        <label for="input_store_phone">มือถือ</label>
                        <input type="text" class="form-control" id="input_store_phone">
                    </div>
                    <div class="pb-3">
                        <label for="input_store_profile_image">โปรไฟล์</label>
                        <input type="text" class="form-control" id="input_store_profile_image">
                    </div>
                    <div class="pb-3">
                        <label for="input_store_wallet">วอลเลต</label>
                        <input type="text" class="form-control" id="input_store_wallet">
                    </div>
                    <div class="d-flex">
                        <div class="pb-3">
                            <label for="input_store_lat">Latitude</label>
                            <input type="text" class="form-control" id="input_store_lat">
                        </div>
                        <div class="pb-3">
                            <label for="input_store_lng">Longtitude</label>
                            <input type="text" class="form-control" id="input_store_lng">
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="input_store_status">status</label>
                        <input type="text" class="form-control" id="input_store_status">
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
    <div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">เพิ่ม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="pb-3">
                        <label for="add_input_store_email">Email</label>
                        <input type="text" class="form-control" id="add_input_store_email" placeholder="Email">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_store_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="add_input_store_username" placeholder="Username">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_store_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="add_input_store_password" placeholder="Password">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_store_name">ชื่อ</label>
                        <input type="text" class="form-control" id="add_input_store_name" placeholder="Name">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_store_phone">มือถือ</label>
                        <input type="number" class="form-control" id="add_input_store_phone" placeholder="Phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmAddStore()">บันทึก</button>
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

            if (document.querySelector('#tbodystore')) {
                renderstore();
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

        function renderstore() {
            console.log("store");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/stores.php",
                data: {},
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;

                    for (var i = 0; i < data.length; i++) {
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].store_id}</td>
                         <td>${data[i].username}</td>
                         <td>${data[i].store_name}</td>
                         <td>${data[i].store_phone}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].store_id})" class="btn btn btn-danger">ลบ</button>
                           
                            <button onclick="open_modal_edit(${i}, ${data[i].store_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                            
                        </td>
                    </tr>
                `
                    }
                    $("#tbodystore").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var id_store;

        function open_modal_edit(index, store_id) {
            $("#image_from_store_url").attr("src", `./api/uploads/profiles/${data[index].profile_image}`);
            $("#input_store_id").val(data[index].store_id);
            $("#input_store_username").val(data[index].username);
            // $("#input_store_password").val(data[index].password);
            $("#input_store_name").val(data[index].store_name);
            $("#input_store_phone").val(data[index].store_phone);
            $("#input_store_profile_image").val(data[index].profile_image);
            $("#input_store_wallet").val(data[index].wallet);
            $("#input_store_lat").val(data[index].lat);
            $("#input_store_lng").val(data[index].lng);
            $("#input_store_status").val(data[index].status);
            id_store = store_id;
        }



        function findByUsername() {
            var username = $("#find_store_username").val();
            if (username != '') {
                console.log("On Change");
                html = '';
                $.ajax({
                    type: "GET",
                    dataType: "JSON",
                    url: `./api/stores.php?find_username=${username}`,
                    data: {},
                    success: function(response) {
                        // console.log("good", response);
                        data = response.result;

                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                html += `
                        <tr>
                             <th scope="row">${i + 1}</th>
                             <td>${data[i].store_id}</td>
                             <td>${data[i].username}</td>
                             <td>${data[i].store_name}</td>
                             <td>${data[i].store_phone}</td>
                             <td>
                                <button onclick="confirm_delete(${data[i].store_id})" class="btn btn btn-danger">ลบ</button>
                               
                                <button onclick="open_modal_edit(${i}, ${data[i].store_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                                
                            </td>
                        </tr>
                    `
                            }
                        } else {
                            html += `<p>ไม่พบข้อมูล</p>`
                        }


                        $("#tbodystore").html(html);
                    },
                    error: function(err) {
                        console.log("bad", err);
                    }
                });
            } else {
                renderstore();
            }

        }

        function confirm_delete(store_id) {
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
                        console.log(store_id);
                        deletestore(store_id);
                    } else {}
                });
        }

        function validate_update() {

        }

        function confirmUpdatestore() {
            if (
                $("#input_store_id").val() != '' &&
                $("#input_store_username").val() != '' &&
                $("#input_store_password").val() != ''
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
                        update_store();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณากรอกข้อมูลให้ครบ!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

        }

        function deletestore(store_id) {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/stores.php",
                data: {
                    'store_id': store_id,
                },
                success: function(response) {
                    // console.log(response);
                    if (response.msg == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกสำเร็จ!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        swal("มีข้อผิดพลาด!", {
                            icon: "error",
                        });
                    }
                    renderstore();
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function confirmAddStore() {
            if (
                $("#add_input_store_username").val() != '' &&
                $("#add_input_store_password").val() != '' &&
                $("#add_input_store_name").val() != '' &&
                $("#add_input_store_phone").val() != ''
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
                        addStore();
                    }
                })
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'กรุณากรอกข้อมูลให้ครบ!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        function addStore() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/add_store.php",
                data: {
                    'email': $("#add_input_store_email").val(),
                    'username': $("#add_input_store_username").val(),
                    'password': $("#add_input_store_password").val(),
                    'store_name': $("#add_input_store_name").val(),
                    'store_phone': $("#add_input_store_phone").val(),
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderstore();
                        Swal.fire({
                            icon: 'success',
                            title: 'บันทึกสำเร็จ!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'มีข้อผิดพลาด!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(err) {
                    console.log("bad", err);
                }
            })
        }

        function update_store() {
            console.log(id_store);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_store.php",
                data: {
                    'store_id': $("#input_store_id").val(),
                    'username': $("#input_store_username").val(),
                    'password': $("#input_store_password").val(),
                    'store_name': $("#input_store_name").val(),
                    'store_phone': $("#input_store_phone").val(),
                    'profile_image': $("#input_store_profile_image").val(),
                    'sex': $("#input_store_sex").val()
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderstore();
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

        function resetTextField() {
            $("#input_store_id").val("");
            $("#input_store_username").val("");
            $("#input_store_password").val("");
            $("#input_store_name").val("");
            $("#input_store_phone").val("");
            $("#input_store_profile_image").val("");
            $("#input_store_wallet").val("");
            $("#input_store_lat").val("");
            $("#input_store_lng").val("");
            $("#input_store_status").val("");
        }
    </script>
</body>

</html>