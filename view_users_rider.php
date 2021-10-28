<?php
include_once "./check_login.php";
$title = "Rider";
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
                        <li class="breadcrumb-item active" aria-current="page">riders</li>
                    </ol>
                </nav>
                <h1 class="h2">ไรเดอร์</h1>
                <p>จัดการไรเดอร์</p>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header d-flex justify-content-between">ร้าน

                                <div class="col-auto d-flex">
                                    <div class="mr-1">
                                        <button id="btnAddrider" class="btn btn btn-primary" data-toggle="modal" data-target="#addModalCenter">เพิ่ม</button>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">ค้นหา</div>
                                        </div>
                                        <input id="find_rider_username" type="text" class="form-control" id="inlineFormInputGroup" placeholder="username...">
                                    </div>
                                </div>
                            </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ลำดับ</th>
                                                <th scope="col">rider_id</th>
                                                <th scope="col">username</th>
                                                <th scope="col">name</th>
                                                <th scope="col">phone</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyrider">
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
                        <img src="" id="image_from_rider_url" width="50%">
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_id">ID</label>
                        <input type="text" class="form-control" id="input_rider_id" disabled>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="input_rider_username">
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="input_rider_password">
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_name">ชื่อ</label>
                        <input type="text" class="form-control" id="input_rider_name">
                    </div>

                    <div class="pb-3">
                        <label for="input_rider_phone">มือถือ</label>
                        <input type="number" class="form-control" id="input_rider_phone">
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_profile_image">โปรไฟล์</label>
                        <input type="text" class="form-control" id="input_rider_profile_image">
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_wallet">วอลเลต</label>
                        <input type="number" class="form-control" id="input_rider_wallet">
                    </div>
                    <div class="d-flex">
                        <div class="pb-3">
                            <label for="input_rider_lat">Latitude</label>
                            <input type="number" class="form-control" id="input_rider_lat">
                        </div>
                        <div class="pb-3">
                            <label for="input_rider_lng">Longtitude</label>
                            <input type="number" class="form-control" id="input_rider_lng">
                        </div>
                    </div>
                    <div class="pb-3">
                        <label for="input_rider_status">status</label>
                        <input type="text" class="form-control" id="input_rider_status">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdaterider()">บันทึก</button>
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
                        <label for="add_input_rider_email">Email</label>
                        <input type="text" class="form-control" id="add_input_rider_email" placeholder="Email">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_rider_username">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="add_input_rider_username" placeholder="Username">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_rider_password">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="add_input_rider_password" placeholder="Password">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_rider_name">ชื่อ</label>
                        <input type="text" class="form-control" id="add_input_rider_name" placeholder="Name">
                    </div>
                    <div class="pb-3">
                        <label for="add_input_rider_phone">มือถือ</label>
                        <input type="number" class="form-control" id="add_input_rider_phone" placeholder="Phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="confirmAddrider()">บันทึก</button>
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

            if (document.querySelector('#tbodyrider')) {
                renderrider();
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

        function renderrider() {
            console.log("rider");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/riders.php",
                data: {},
                success: function(response) {
                    // console.log("good", response);
                    data = response.result;

                    for (var i = 0; i < data.length; i++) {
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].rider_id}</td>
                         <td>${data[i].username}</td>
                         <td>${data[i].rider_name}</td>
                         <td>${data[i].rider_phone}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].rider_id})" class="btn btn btn-danger">ลบ</button>
                           
                            <button onclick="open_modal_edit(${i}, ${data[i].rider_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                            
                        </td>
                    </tr>
                `
                    }
                    $("#tbodyrider").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var id_rider;

        function open_modal_edit(index, rider_id) {
            $("#image_from_rider_url").attr("src", `./api/uploads/profiles/${data[index].profile_image}`);
            $("#input_rider_id").val(data[index].rider_id);
            $("#input_rider_username").val(data[index].username);
            // $("#input_rider_password").val(data[index].password);
            $("#input_rider_name").val(data[index].rider_name);
            $("#input_rider_phone").val(data[index].rider_phone);
            $("#input_rider_profile_image").val(data[index].profile_image);
            $("#input_rider_wallet").val(data[index].wallet);
            $("#input_rider_lat").val(data[index].lat);
            $("#input_rider_lng").val(data[index].lng);
            $("#input_rider_status").val(data[index].rider_status);
            id_rider = rider_id;
        }



        function findByUsername() {
            var username = $("#find_rider_username").val();
            if (username != '') {
                console.log("On Change");
                html = '';
                $.ajax({
                    type: "GET",
                    dataType: "JSON",
                    url: `./api/riders.php?find_username=${username}`,
                    data: {},
                    success: function(response) {
                        // console.log("good", response);
                        data = response.result;

                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                html += `
                        <tr>
                             <th scope="row">${i + 1}</th>
                             <td>${data[i].rider_id}</td>
                             <td>${data[i].username}</td>
                             <td>${data[i].rider_name}</td>
                             <td>${data[i].rider_phone}</td>
                             <td>
                                <button onclick="confirm_delete(${data[i].rider_id})" class="btn btn btn-danger">ลบ</button>
                               
                                <button onclick="open_modal_edit(${i}, ${data[i].rider_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                                
                            </td>
                        </tr>
                    `
                            }
                        } else {
                            html += `<p>ไม่พบข้อมูล</p>`
                        }


                        $("#tbodyrider").html(html);
                    },
                    error: function(err) {
                        console.log("bad", err);
                    }
                });
            } else {
                renderrider();
            }

        }

        function confirm_delete(rider_id) {
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
                        console.log(rider_id);
                        deleterider(rider_id);
                    } else {}
                });
        }

        function validate_update() {

        }

        function confirmUpdaterider() {
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
                    update_rider();
                }
            })
        }

        function deleterider(rider_id) {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/riders.php",
                data: {
                    'rider_id': rider_id,
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
                    renderrider();
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function confirmAddrider() {
            if (
                $("#add_input_rider_username").val() != '' &&
                $("#add_input_rider_password").val() != '' &&
                $("#add_input_rider_name").val() != '' &&
                $("#add_input_rider_phone").val() != ''
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
                        addrider();
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

        function addrider() {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/riders.php",
                data: {
                    'email': $("#add_input_rider_email").val(),
                    'username': $("#add_input_rider_username").val(),
                    'password': $("#add_input_rider_password").val(),
                    'rider_name': $("#add_input_rider_name").val(),
                    'rider_phone': $("#add_input_rider_phone").val(),
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderrider();
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

        function update_rider() {
            console.log(id_rider);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_rider.php",
                data: {
                    'rider_id': $("#input_rider_id").val(),
                    'username': $("#input_rider_username").val(),
                    'password': $("#input_rider_password").val(),
                    'rider_name': $("#input_rider_name").val(),
                    'rider_phone': $("#input_rider_phone").val(),
                    'profile_image': $("#input_rider_profile_image").val(),
                    'sex': $("#input_rider_sex").val()
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderrider();
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
            $("#input_rider_id").val("");
            $("#input_rider_username").val("");
            $("#input_rider_password").val("");
            $("#input_rider_name").val("");
            $("#input_rider_phone").val("");
            $("#input_rider_profile_image").val("");
            $("#input_rider_wallet").val("");
            $("#input_rider_lat").val("");
            $("#input_rider_lng").val("");
            $("#input_rider_status").val("");
        }
    </script>
</body>

</html>