<?php
include_once "./check_login.php";
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="./view_users.php">users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">customers</li>
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

            </main>
        </div>
    </div>
    <?php
    include_once "./include_footer.php";
    ?>


    <?php
    include_once "./modal_edit_customer.php";
    include_once "./include_js.php";

    ?>
    <script>
        var html, data;

        $(document).ready(function() {

            if (document.querySelector('#tbodycustomer')) {
                renderCustomer();
            }

            $('#find_customer_username').change(function() {
                console.log('change');
                findByUsername();
            });

        });

        function renderCustomer() {
            console.log("Customer");
            html = '';

            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/customers.php",
                data: {},
                success: function(response) {
                    console.log("good", response);
                    data = response.result;

                    for (var i = 0; i < data.length; i++) {
                        html += `
                    <tr>
                         <th scope="row">${i + 1}</th>
                         <td>${data[i].customer_id}</td>
                         <td>${data[i].username}</td>
                         <td>${data[i].customer_name}</td>
                         <td>${data[i].customer_phone}</td>
                         <td>
                            <button onclick="confirm_delete(${data[i].customer_id})" class="btn btn btn-danger">ลบ</button>
                           
                            <button onclick="open_modal_edit(${i}, ${data[i].customer_id})" class="btn btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                            
                        </td>
                    </tr>
                `
                    }
                    $("#tbodycustomer").html(html);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }
        var id_customer;

        function open_modal_edit(index, customer_id) {
            $("#input_customer_id").val(data[index].customer_id);
            $("#input_customer_username").val(data[index].username);
            $("#input_customer_password").val(data[index].password);
            $("#input_customer_name").val(data[index].customer_name);
            $("#input_customer_phone").val(data[index].customer_phone);
            $("#input_customer_sex").val(data[index].sex).prop('selected', true);
            $("#input_customer_profile_image").val(data[index].profile_image);
            id_customer = customer_id;
        }

        function findByUsername() {
            var username = $("#find_customer_username").val();
            if (username != '') {
                console.log("On Change");
                html = '';
                $.ajax({
                    type: "GET",
                    dataType: "JSON",
                    url: `./api/customers.php?find_username=${username}`,
                    data: {},
                    success: function(response) {
                        // console.log("good", response);
                        data = response.result;

                        if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {
                                html += `
                        <tr>
                             <th scope="row">${i + 1}</th>
                             <td>${data[i].customer_id}</td>
                             <td>${data[i].username}</td>
                             <td>${data[i].customer_name}</td>
                             <td>${data[i].customer_phone}</td>
                             <td>
                                <button onclick="confirm_delete(${data[i].customer_id})" class="btn btn btn-danger">ลบ</button>
                               
                                <button onclick="open_modal_edit(${i}, ${data[i].customer_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                                
                            </td>
                        </tr>
                    `
                            }
                        } else {
                            html += `<p>ไม่พบข้อมูล</p>`
                        }


                        $("#tbodycustomer").html(html);
                    },
                    error: function(err) {
                        console.log("bad", err);
                    }
                });
            } else {
                renderCustomer();
            }

        }

        function confirm_delete(customer_id) {
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
                        console.log(customer_id);
                        deleteCustomer(customer_id);
                    } else {}
                });
        }

        function validate_update() {

        }

        function confirmUpdateCustomer() {
            Swal.fire({
                title: 'คุณต้องการบันทึกหรือไม่?',
                text: "หากไม่ต้องการ กรุณากดยกเลิก!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'บันทึก',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    update_customer();
                }
            })
        }

        function deleteCustomer(customer_id) {
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/delete_customer.php",
                data: {
                    'customer_id': customer_id,
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
                    renderCustomer();
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function update_customer() {
            console.log(id_customer);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "./api/update_customer.php",
                data: {
                    'customer_id': $("#input_customer_id").val(),
                    'username': $("#input_customer_username").val(),
                    'password': $("#input_customer_password").val(),
                    'customer_name': $("#input_customer_name").val(),
                    'customer_phone': $("#input_customer_phone").val(),
                    'profile_image': $("#input_customer_profile_image").val(),
                    'sex': $("#input_customer_sex").val()
                },
                success: function(response) {
                    if (response.msg == 'success') {
                        renderCustomer();
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