<?php
include_once "./check_login.php";
$title = "User";
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
                        <li class="breadcrumb-item active" aria-current="page">admins</li>
                    </ol>
                </nav>
                <h1 class="h2">แอดมิน</h1>
                <p>แอดมิน</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">ร้าน

                                <div class="col-auto d-flex">
                                    <div class="mr-1">
                                        <button id="btnAddadmin" class="btn btn btn-primary" data-toggle="modal" data-target="#addModalCenter">เพิ่ม</button>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">ค้นหา</div>
                                        </div>
                                        <input id="find_admin_username" type="text" class="form-control" id="inlineFormInputGroup" placeholder="username...">
                                    </div>
                                </div>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">admin_id</th>
                                                <th scope="col">username</th>
                                                <th scope="col">name</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyadmin">
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
                        <label for="input_admin_id">ID</label>
                        <input type="text" class="form-control" id="input_admin_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_admin_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_admin_username">
                    </div>
                    <div class="pb-3">
                        <label for="input_admin_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_admin_password">
                    </div>
                    <div class="pb-3">
                        <label for="input_admin_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_admin_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdateadmin()">บันทึก</button>
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
                        <label for="add_input_admin_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="add_input_admin_username">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_admin_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="add_input_admin_password">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_admin_name">ชื่อ</label>
                        <input type="text" class="form-control" id="add_input_admin_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmAddadmin()">บันทึก</button>
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

            if (document.querySelector('#tbodyadmin')) {
                renderadmin();
            }

            $('#find_admin_username').change(function() {
                console.log('change');
                findByUsername();
            });

            $('#btnAddadmin').on('click', function() {
                console.log("Reset Textfield");
                resetTextField();
            });

        });

        function renderadmin() {
            console.log("admin");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/admins.php",
                data: {},
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;

                    for (var i = 0; i < data.length; i++) {
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].admin_id}</td>
                         <td>${data[i].username}</td>
                         <td>${data[i].admin_name}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].admin_id})" class="btn btn btn-danger">ลบ</button>
                           
                            <button onclick="open_modal_edit(${i}, ${data[i].admin_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                            
                        </td>
                    </tr>
                `
                    }
                    $("#tbodyadmin").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var id_admin;

        function open_modal_edit(index, admin_id) {
            $("#input_admin_id").val(data[index].admin_id);
            $("#input_admin_username").val(data[index].username);
            $("#input_admin_password").val(data[index].password);
            $("#input_admin_name").val(data[index].admin_name);
            $("#input_admin_phone").val(data[index].admin_phone);
            $("#input_admin_profile_image").val(data[index].profile_image);
            $("#input_admin_wallet").val(data[index].wallet);
            $("#input_admin_lat").val(data[index].lat);
            $("#input_admin_lng").val(data[index].lng);
            $("#input_admin_status").val(data[index].status);
            id_admin = admin_id;
        }



        function findByUsername() {
            var username = $("#find_admin_username").val();
            if (username != '') {
                console.log("On Change");
                html = '';
                $.ajax({
                    type: "GET",
                    dataType: "JSON",
                    url: `./api/admins.php?find_username=${username}`,
                    data: {},
                    success: function(response) {
                        // console.log("good", response);
                        data = response.result;

                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                html += `
                        <tr>
                             <th scope="row">${i + 1}</th>
                             <td>${data[i].admin_id}</td>
                             <td>${data[i].username}</td>
                             <td>${data[i].admin_name}</td>
                             <td>${data[i].admin_phone}</td>
                             <td>
                                <button onclick="confirm_delete(${data[i].admin_id})" class="btn btn btn-danger">ลบ</button>
                               
                                <button onclick="open_modal_edit(${i}, ${data[i].admin_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                                
                            </td>
                        </tr>
                    `
                            }
                        } else {
                            html += `<p>ไม่พบข้อมูล</p>`
                        }


                        $("#tbodyadmin").html(html);
                    },
                    error: function(err) {
                        console.log("bad", err);
                    }
                });
            } else {
                renderadmin();
            }

        }

        function confirm_delete(admin_id) {
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
                        console.log(admin_id);
                        deleteadmin(admin_id);
                    } else {}
                });
        }

        function validate_update() {

        }

        function confirmUpdateadmin() {
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
                    update_admin();
                }
            })
        }

        function deleteadmin(admin_id) {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/admins.php",
                data: {
                    'admin_id': admin_id,
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
                    renderadmin();
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function confirmAddadmin() {
            if (
                $("#add_input_admin_username").val() != '' &&
                $("#add_input_admin_password").val() != '' &&
                $("#add_input_admin_name").val() != '' &&
                $("#add_input_admin_phone").val() != ''
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
                        addadmin();
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

        function addadmin() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/add_admin.php",
                data: {
                    'username': $("#add_input_admin_username").val(),
                    'password': $("#add_input_admin_password").val(),
                    'admin_name': $("#add_input_admin_name").val(),
                    'admin_phone': $("#add_input_admin_phone").val(),
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderadmin();
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

        function update_admin() {
            console.log(id_admin);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_admin.php",
                data: {
                    'admin_id': $("#input_admin_id").val(),
                    'username': $("#input_admin_username").val(),
                    'password': $("#input_admin_password").val(),
                    'admin_name': $("#input_admin_name").val(),
                    'admin_phone': $("#input_admin_phone").val(),
                    'profile_image': $("#input_admin_profile_image").val(),
                    'sex': $("#input_admin_sex").val()
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderadmin();
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
            $("#input_admin_id").val("");
            $("#input_admin_username").val("");
            $("#input_admin_password").val("");
            $("#input_admin_name").val("");
            $("#input_admin_phone").val("");
            $("#input_admin_profile_image").val("");
            $("#input_admin_wallet").val("");
            $("#input_admin_lat").val("");
            $("#input_admin_lng").val("");
            $("#input_admin_status").val("");
        }
    </script>
</body>

</html>