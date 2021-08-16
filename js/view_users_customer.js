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
        url: "./functions/customers.php",
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
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            <a href="./view_users_customer_edit.php" class="btn btn-sm btn-warning">Edit</a>
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