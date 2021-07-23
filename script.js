$(document).ready(function () {
    $(document).on("click", "#addButton", function () {
        Swal.fire({
            title: 'Success!',
            text: 'Do you want to continue',
            icon: 'success',
            confirmButtonText: 'Cool'
        });
    });

    $("#signoutButton").on("click", function () {
        // console.log("signout");
        window.location.href = "./view_login.php";
    });

    $("#buttonViewUsers").on('click', function () {
        // console.log("/view_users.php");
        window.location.href = "./view_users.php";
    });
    $("#buttonViewDashboard").on('click', function () {
        // console.log("/view_dashboard.php");
        window.location.href = "./view_dashboard.php";
    });
});