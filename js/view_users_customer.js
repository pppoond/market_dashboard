var html, data;

$(document).ready(function () {
    if (document.querySelector('#tbodycustomer')) {
        renderCustomer();
    }

});

function renderCustomer() {
    html = '';

    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "./api/customers.php",
        data: {},
        success: function (response) {
            // console.log("good", response);
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
                            <button onclick="confirm_delete(${data[i].customer_id})" type="button" class="btn btn-sm btn-danger">Delete</button>
                            <button onclick="open_modal_edit(${i}, ${data[i].customer_id})" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">View</button>
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
    $("#input_customer_sex").val(data[index].sex);
    id_customer = customer_id;
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
                swal("ยกเลิกแล้ว!");
            }
        });
}
function validate_update() {

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
    // $.ajax({
    //     type: "POST",
    //     dataType: "JSON",
    //     url: "./functions/update_customers.php",
    //     data: {
    //         customer_id: $("#txt_create_name").val(),
    //         username: $("#txt_create_name").val(),
    //         password: $("#txt_create_name").val(),
    //         customer_name: $("#txt_create_name").val(),
    //         customer_phone: $("#txt_create_name").val(),
    //         sex: $("#txt_create_name").val()
    //     }, success: function (response) {
    //         console.log("good", response);
    //         if (response.result[0].code == 200) {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Create success',
    //                 text: 'Create movie successfully'
    //             });
    //             $(".modal").css("display", 'none');
    //             render();
    //         }
    //     }, error: function (err) {
    //         console.log("bad", err);
    //     }
    // })
}