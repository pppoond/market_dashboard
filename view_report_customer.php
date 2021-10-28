<?php
include_once "./check_login.php";
$title = "Reports";
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
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .cursor-poiter {
            cursor: pointer;
        }

        .chart-container {
            width: 80%;
            height: 480px;
            margin: 0 auto;
        }
    </style>
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
                        <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">report</li>
                        <li class="breadcrumb-item active" aria-current="page">customer</li>
                    </ol>
                </nav>
                <h1 class="h2">ลูกค้า</h1>
                <div class="d-flex">
                    <a class="btn btn-info mr-1" href="./view_report.php">คำสั่งซื้อ</a>
                    <a class="btn btn-info mr-1" href="./view_report_rider.php">ไรเดอร์</a>
                    <a class="btn btn-info mr-1" href="./view_report_customer.php">ลูกค้า</a>
                    <a class="btn btn-info mr-1" href="./view_report_store.php">ร้าน</a>
                </div>
                <div class="row my-4">
                    <div class="chart-container">
                        <canvas id="line-chartcanvas"></canvas>
                    </div>
                </div>
                <?php
                include_once "./include_footer.php";
                ?>
            </main>
        </div>
    </div>
    <?php
    include_once "./include_js.php";
    ?>
    <script>
        $(document).ready(function() {



        });
    </script>
    <script>
        var customerCount = 0;
        var riderCount = 0;
        var storeCount = 0;
        $(document).ready(function() {
            console.log('customers');
            getCustomer();
            getRider();
            getStores();
            getAdmin();

            $("#buttonViewUsersCustomer").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_customer.php";
            });

            $("#buttonViewUsersStore").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_store.php";
            });

            $("#buttonViewUsersRider").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_rider.php";
            });

            $("#buttonViewUsersAdmin").on('click', function() {
                // console.log("/view_stores.php");
                window.location.href = "./view_users_admin.php";
            });

            // $("#dataloading").html(`<p>Loading...</p>`);

            $.ajax({
                url: "./api/customers.php",
                type: "GET",
                success: function(data) {
                    var timeFrom = (X) => {
                        var dates = [];
                        for (let I = 0; I < Math.abs(X); I++) {
                            dates.push(new Date(new Date().getTime() - ((X >= 0 ? I : (I - I - I)) * 24 * 60 * 60 * 1000)).toISOString().split('T')[0]);
                        }
                        return dates;
                    }
                    // console.log(timeFrom(-7)); // Future 7 Days
                    var day1 = timeFrom(7)[0];
                    var day2 = timeFrom(7)[1];
                    var day3 = timeFrom(7)[2];
                    var day4 = timeFrom(7)[3];
                    var day5 = timeFrom(7)[4];
                    var day6 = timeFrom(7)[5];
                    var day7 = timeFrom(7)[6];

                    var date1 = new Date(day1);
                    var date2 = new Date(day2);
                    var date3 = new Date(day3);
                    var date4 = new Date(day4);
                    var date5 = new Date(day5);
                    var date6 = new Date(day6);
                    var date7 = new Date(day7);

                    date1.setDate(date1.getDate() + 7);
                    date2.setDate(date2.getDate() + 7);
                    date3.setDate(date3.getDate() + 7);
                    date4.setDate(date4.getDate() + 7);
                    date5.setDate(date5.getDate() + 7);
                    date6.setDate(date6.getDate() + 7);
                    date7.setDate(date7.getDate() + 7);

                    // console.log(date.toString().split(' ')[0]);

                    var week1 = date1.toString().split(' ')[0];
                    var week2 = date2.toString().split(' ')[0];
                    var week3 = date3.toString().split(' ')[0];
                    var week4 = date4.toString().split(' ')[0];
                    var week5 = date5.toString().split(' ')[0];
                    var week6 = date6.toString().split(' ')[0];
                    var week7 = date7.toString().split(' ')[0];

                    var count1 = 0;
                    var count2 = 0;
                    var count3 = 0;
                    var count4 = 0;
                    var count5 = 0;
                    var count6 = 0;
                    var count7 = 0;

                    // var dataDay = jsonDecode(dayOne);

                    console.log(day1);
                    console.log(day2);
                    console.log(day3);
                    console.log(day4);
                    console.log(day5);
                    console.log(day6);
                    console.log(day7);
                    console.log(timeFrom(7));
                    var score = {
                        count: [],
                        high: []
                    };

                    var date = new Date("08-02-2020");
                    date.setDate(date.getDate() + 7);



                    console.log(data.result);
                    console.log(data.result.length);
                    for (var i = 0; i < data.result.length; i++) {
                        console.log(data.result[i].time_reg.split(' ')[0]);
                        if (data.result[i].time_reg.split(' ')[0] == day1) {
                            count1 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day2) {
                            count2 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day3) {
                            count3 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day4) {
                            count4 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day5) {
                            count5 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day6) {
                            count6 += 1;
                        } else if (data.result[i].time_reg.split(' ')[0] == day7) {
                            count7 += 1;
                        }
                    }


                    var ctx = $("#line-chartcanvas");

                    var data = {
                        labels: [week7, week6, week5, week4, week3, week2, week1],
                        datasets: [{
                            label: "สมัครสมาชิก",
                            data: [count7, count6, count5, count4, count3, count2, count1],
                            backgroundColor: "blue",
                            borderColor: "lightblue",
                            fill: false,
                            lineTension: 0,
                            pointRadius: 5
                        }, ]
                    };

                    var options = {
                        title: {
                            display: true,
                            position: "top",
                            text: "Line Graph",
                            fontSize: 18,
                            fontColor: "#111"
                        },
                        legend: {
                            display: true,
                            position: "bottom"
                        }
                    };

                    var chart = new Chart(ctx, {
                        type: "line",
                        data: data,
                        options: options
                    });

                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        // function showGraph() {
        //     {
        //         $.post("data.php",
        //             function(data) {
        //                 console.log(data);
        //                 var name = [];
        //                 var marks = [];

        //                 for (var i in data) {
        //                     name.push(data[i].student_name);
        //                     marks.push(data[i].marks);
        //                 }

        //                 var chartdata = {
        //                     labels: name,
        //                     datasets: [{
        //                         label: 'Student Marks',
        //                         backgroundColor: '#49e2ff',
        //                         borderColor: '#46d5f1',
        //                         hoverBackgroundColor: '#CCCCCC',
        //                         hoverBorderColor: '#666666',
        //                         data: marks
        //                     }]
        //                 };

        //                 var graphTarget = $("#graphCanvas");

        //                 var barGraph = new Chart(graphTarget, {
        //                     type: 'bar',
        //                     data: chartdata
        //                 });
        //             });
        //     }
        // }

        function getCustomer() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/customers.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    customerCount = response.result.length
                    $("#customer_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getRider() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/riders.php",
                data: {},
                success: function(response) {
                    console.log(response.result.length);
                    riderCount = response.result.length
                    $("#rider_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getAdmin() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/admins.php",
                data: {},
                success: function(response) {

                    console.log(response.result.length);
                    $("#admin_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        function getStores() {
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "./api/stores.php",
                data: {},
                success: function(response) {
                    storeCount = response.result.length
                    console.log(response.result.length);
                    $("#store_count").html(`${response.result.length} คน`);
                },
                error: function(err) {
                    console.log("bad", err);
                }
            });
        }

        // function getAdmin() {
        //     $.ajax({
        //         type: "GET",
        //         dataType: "JSON",
        //         url: "./api/customers.php",
        //         data: {},
        //         success: function(response) {
        //             console.log(response.result.length);
        //             $("#customer_count").html(`${response.result.length} คน`);
        //         },
        //         error: function(err) {
        //             console.log("bad", err);
        //         }
        //     });
        // }
    </script>
</body>

</html>