$(document).ready(function () {
    $("#buttonLogin").on('click', function () {
        var form_username = document.querySelector("#form_username");
        var form_password = document.querySelector("#form_password");
        console.log(form_username.value + form_password.value);
        if (form_username.value == "admin" && form_password.value == "admin") {
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function () {
                //your code to be executed after 3 second
                window.location.href = "./index.php";
            }, 3000);

        } else {
            Swal.fire({
                // title: 'Somting is!',
                text: 'Username or password is wrong!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
            });
        }

    });
});