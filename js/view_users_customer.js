var html, data;

$(document).ready(function () {
    
    if (document.querySelector('#tbodycustomer')) {
        renderCustomer();
    }

    $('#find_customer_username').change(function () {
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
        success: function (response) {
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
                           
                            <button onclick="open_modal_edit(${i}, ${data[i].customer_id})" class="btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">แก้ไข</button>
                            
                        </td>
                    </tr>
                `
            }
            $("#tbodycustomer").html(html);
        }, error: function (err) {
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
            success: function (response) {
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
            }, error: function (err) {
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
            } else {
            }
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
        success: function (response) {
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
        }, error: function (err) {
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
        success: function (response) {
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
        }, error: function (err) {
            console.log("bad", err);
        }
    })
}