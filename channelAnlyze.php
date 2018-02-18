<?php
require 'Medoo.php';
require_once "jdf.php";
//use Medoo\Medoo;
//date_default_timezone_set("Asia/Tehran");
$database = new Medoo\Medoo([
    'database_type' => 'mysql',
    'database_name' => 'teleCrawler',
    'server' => 'localhost',
    'username' => 'ghiac',
    'password' => 'mghiac!@#$3_',
    'charset' => 'utf8',
    'port' => 3306,
//    'prefix' => 'PREFIX_',
]);

$conditions = ["Cid" => $_GET['id'] + 1 - 1];
$channel = $database->select("channels",
    [
        "channel_id",
        "Ctitle",
        "Cabout",
        "Cusername"
    ], $conditions);
if (count($channel) == 0)
    die('404');

$channel_id = $channel[0]['channel_id'];
$resultChar1 = $database->select("analyze_day", ["ADdate", "ADmember"], array_merge($conditions, ["ORDER" => 'ADdate']));
$status = true;
$weekStatus = true;

if (count($resultChar1) == 0)
    $status = false;
else {
    $result1 = $database->select("analyze_day",
        [
            'ADactive_member',
            "ADposts",
            "ADmedias",
            "ADfwds",
            "ADdif_member"
        ]
        ,
        array_merge($conditions, ['ORDER' => ['ADdate' => 'DESC'], 'LIMIT' => 1])
    );
    $result1 = $result1[0];
    $result2 = $database->select("post", 'Pparticipants_count'
        ,
        [
            'channel_id' => $channel_id,
            'LIMIT' => 1,
            "ORDER" => [
                "Pmessage_id" => "DESC"
            ]
        ]
    );
    $result3 = $database->select("analyze_week",
        [
            "AWposts_sum",
            "AWposts_avg",
            "AWactive_member",
            "AWmedias_sum",
            "AWmedias_avg",
            "AWfwds_sum",
            "AWfwds_avg",
            "AWdif_member_sum",
            "AWdif_member_avg"
        ]
        ,
        array_merge($conditions, ['ORDER' => ['AWdate' => 'DESC'], 'LIMIT' => 1])
    );
    if (count($result3) > 0) {
        $result3 = $result3[0];
    } else
        $weekStatus = false;

}

?>
<!doctype html>
<html lang="fa">
<head>
    <title>Channel Analyze</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <script type="text/javascript" src="js/rocket.min.js"></script>
    <link rel="stylesheet" href="css/export.css" type="text/css" media="all"/>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script type="text/javascript">
        AmCharts.translations.fa = {
            "monthNames": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
            "shortMonthNames": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند",],
            "dayNames": ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه"],
            "shortDayNames": ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه"],
            "zoomOutText": "کوچک کردن"
        }
    </script>
    <script>
        var chart = AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "light",
            "marginRight": 20,
            "marginLeft": 20,
            "autoMarginOffset": 20,
            "language": "fa",
            "mouseWheelZoomEnabled": false,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": true,
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "balloon": {
                    "drop": false,
                    "adjustBorderColor": false,
                    "color": "#ffffff"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 10,
                "hideBulletsCount": 50,
                "lineThickness": 5,
                "title": "red line",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<span style='font-size:18px;font-family:tahoma'>[[value]]</span>"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis": false,
                "offset": 30,
                "scrollbarHeight": 10,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount": false,
                "color": "#AAAAAA"
            },
            "chartCursor": {
                "pan": false,
                "valueLineEnabled": false,
                "valueLineBalloonEnabled": false,
                "cursorAlpha": 1,
                "cursorColor": "#258cbb",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
                "valueZoomable": false
            },
            "valueScrollbar": {
                "oppositeAxis": false,
                "offset": 50,
                "scrollbarHeight": 10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": false
            },
            "export": {
                "enabled": false,
            },
            "dataProvider": [
                <?php
                foreach ($resultChar1 as $i) {
                    echo "{'date' : '" . $i['ADdate'] . "' ,'value' : " . $i['ADmember'] . "},";
                }
                ?>

            ]
        });
    </script>
    <script>
        var chart = AmCharts.makeChart("chartdiv2", {
            "type": "serial",
            "theme": "light",
            "marginRight": 20,
            "marginLeft": 20,
            "autoMarginOffset": 20,
            "language": "fa",
            "mouseWheelZoomEnabled": false,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0,
                "position": "left",
                "ignoreAxisWidth": true,
            }],
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "graphs": [{
                "id": "g1",
                "balloon": {
                    "drop": false,
                    "adjustBorderColor": false,
                    "color": "#ffffff"
                },
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 10,
                "hideBulletsCount": 50,
                "lineThickness": 5,
                "title": "red line",
                "useLineColorForBulletBorder": true,
                "valueField": "value",
                "balloonText": "<span style='font-size:18px;font-family:tahoma'>[[value]]</span>"
            }],
            "chartScrollbar": {
                "graph": "g1",
                "oppositeAxis": false,
                "offset": 30,
                "scrollbarHeight": 10,
                "backgroundAlpha": 0,
                "selectedBackgroundAlpha": 0.1,
                "selectedBackgroundColor": "#888888",
                "graphFillAlpha": 0,
                "graphLineAlpha": 0.5,
                "selectedGraphFillAlpha": 0,
                "selectedGraphLineAlpha": 1,
                "autoGridCount": false,
                "color": "#AAAAAA"
            },
            "chartCursor": {
                "pan": false,
                "valueLineEnabled": false,
                "valueLineBalloonEnabled": false,
                "cursorAlpha": 1,
                "cursorColor": "#258cbb",
                "limitToGraph": "g1",
                "valueLineAlpha": 0.2,
                "valueZoomable": false
            },
            "valueScrollbar": {
                "oppositeAxis": false,
                "offset": 50,
                "scrollbarHeight": 10
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": false
            },
            "export": {
                "enabled": false,
            },
            "dataProvider": [
                {"date": "1396-10-01", "value": 603000},
                {"date": "1396-10-02", "value": 610000},
                {"date": "1396-10-03", "value": 612000},
                {"date": "1396-10-04", "value": 620000},
                {"date": "1396-10-05", "value": 625630},
                {"date": "1396-10-06", "value": 634520},
                {"date": "1396-10-07", "value": 638058},
                {"date": "1396-10-08", "value": 639210},
                {"date": "1396-10-09", "value": 640963},
                {"date": "1396-10-10", "value": 643100},
                {"date": "1396-10-11", "value": 640236},
                {"date": "1396-10-12", "value": 638900},
                {"date": "1396-10-13", "value": 645000},
                {"date": "1396-10-14", "value": 679000},
                {"date": "1396-10-15", "value": 660000},
                {"date": "1396-10-16", "value": 664300},
                {"date": "1396-10-17", "value": 663081},
                {"date": "1396-10-18", "value": 665081},
                {"date": "1396-10-19", "value": 667081},
                {"date": "1396-10-20", "value": 667581},
                {"date": "1396-10-21", "value": 671081},
                {"date": "1396-10-22", "value": 675081},
                {"date": "1396-10-23", "value": 670081},
                {"date": "1396-10-24", "value": 673081},
                {"date": "1396-10-25", "value": 683081},
                {"date": "1396-10-26", "value": 685081},
                {"date": "1396-10-27", "value": 683081},
                {"date": "1396-10-28", "value": 689081},
                {"date": "1396-10-29", "value": 692081},
                {"date": "1396-10-30", "value": 690081},
            ],
        });
    </script>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="30">

<!-- Nav Menu -->
<div class="nav-menu fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="index.php"><img src="images/logo3.png" class="img-fluid"
                                                                  alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                                class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto dirrtl sans">
                            <li class="nav-item sansbold"><a href="#addchannel"
                                                             class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">ثبت
                                    رایگان کانال شما </a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php">صفحه نخست<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="search.html">جستجوی کانال ها </a></li>
                            <li class="nav-item"><a class="nav-link" href="search.html?bestchannel">برترین کانال ها </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="index.php#pricing">پلن ها</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">تماس با ما</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.html">ورود / ثبت نام</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


<header class="bg-gradient" id="home">
    <div class="marginchanelp">
    </div>
</header>

<div class="channelprof">
    <img src="profile/<?php echo $channel[0]['Cusername']; ?>.jpg" alt="<?php echo $channel[0]['Cusername']; ?>">
</div>

<div class="section padtopch bg-white" id="features">

    <div class="container dirrtl">
        <div class="section-title dirltr fs24">
            <small>
                <?php
                echo '@' . $channel[0]['Cusername'];
                ?>
            </small>
            <h3 class="sans">
                <?php
                echo $channel[0]['Ctitle'];
                ?>
            </h3>
        </div>

        <!--        <div class="suspendchannel"><!-- اگر مسدود کرده باشیم -->
        <!--            این کانال به دلیل ..... مسدود شده و تحلیل نمیشود-->
        <!--        </div>-->

        <div class="row">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media ">
                            <span class="ti-announcement transformi gradient-fill fonticonsize"></span>
                            <div class="media-body sans">
                                <h4 class="card-title px18h4">کل اعضای کانال </h4>
                                <p class="card-textsub"> بر اساس ممبر کانال </p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($status)
                                        echo $result2[0];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>Member</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-user gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">اعضای واقعی کانال </h4>
                                <p class="card-textsub"> بر اساس میانگین ویو های هفته </p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWactive_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>Member</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-na gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">اعضای غیر واقعی</h4>
                                <p class="card-textsub">بر اساس کسر اعضای کل از واقعی</p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result2[0] - $result3['AWactive_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>Member</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-star gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">اعضای فعال </h4>
                                <p class="card-textsub">بر اساس میانگین ویو 24 ساعت</p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($status)
                                        echo $result1['ADactive_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>Member</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->

        <div class="row margintoprow">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-eye gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین بازدید روز </h4>
                                <p class="card-textsub">بر اساس میانگین بازدید 24 ساعت</p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($status)
                                        echo $result1['ADactive_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>View</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-eye gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین بازدید هفته</h4>
                                <p class="card-textsub">بر اساس میانگین بازدید هفته</p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWactive_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <small>View</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-time gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تاریخ آخرین پست</h4>
                                <p class="card-textsub">تاریخ آخرین پست ارسالی در کانال </p>
                                <h3 class="analyzeadd datesize dirltr">
                                    <?php
                                    $result4 = $database->select("post", 'Pdate'
                                        ,
                                        [
                                            'channel_id' => $channel_id,
                                            'LIMIT' => 1,
                                            "ORDER" => [
                                                "Pdate" => "DESC"
                                            ]
                                        ]
                                    );
                                    if (count($result4[0]) != 0)
                                        echo jdate("Y/m/d h:s", $result4[0] + 1 - 1);
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                    <!--                                    96/10/04 <span>|</span> 14:30-->
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-money gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">ارزش پولی کانال </h4>
                                <p class="card-textsub">ارزش پولی کانال به تومان</p>
                                <h3 class="analyzeadd dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWactive_member'] * 450;
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->

        <div class="row margintoprow">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-file gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تعداد پست ها در 24 ساعت</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize">
                                    <?php
                                    if ($status)
                                        echo $result1['ADposts'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-time gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تعداد محتوای چند رسانه ای در 24 ساعت </h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd datesize dirltr">
                                    <?php
                                    if ($status)
                                        echo $result1['ADmedias'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-medall-alt gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تعداد پیام های فوروارد شده در 24 ساعت </h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd topadminanfont sansbold dirltr">
                                    <?php
                                    if ($status)
                                        echo $result1['ADfwds'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-location-pin gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تغییرات تعداد کاربر در 24 ساعت</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize dirltr">
                                    <?php
                                    if ($status)
                                        echo $result1['ADdif_member'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->


        <div class="row margintoprow">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-file gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تعداد پست ها در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWposts_sum'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-time gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین پست ها در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd datesize dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWposts_avg'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-medall-alt gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">مجموع تعداد پیام های چندرسانه ای در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd topadminanfont sansbold dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWmedias_sum'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-location-pin gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین تعداد پیام های چندرسانه ای در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWmedias_avg'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->

        <div class="row margintoprow">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-file gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">تعداد پیام های فوروارد شده در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWfwds_sum'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-time gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین پیام های فوروارد شده در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd datesize dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWfwds_avg'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-medall-alt gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">مجموع تغییرات تعداد کاربران در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd topadminanfont sansbold dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWdif_member_sum'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-location-pin gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">میانگین تغییرات تعداد کاربران در هفته</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize dirltr">
                                    <?php
                                    if ($weekStatus)
                                        echo $result3['AWdif_member_avg'];
                                    else
                                        echo 'هنوز انالیزی انجام نشده';
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->


        <div class="row margintoprow">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-file gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4"> موضوع کانال </h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize">خبری طنز </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--            <div class="col-12 col-lg-3">-->
            <!--                <div class="card features boxshad">-->
            <!--                    <div class="card-body">-->
            <!--                        <div class="media sans">-->
            <!--                            <span class="ti-time gradient-fill fonticonsize"></span>-->
            <!--                            <div class="media-body">-->
            <!--                                <h4 class="card-title px18h4">تاریخ آخرین تحلیل </h4>-->
            <!--                                <p class="card-textsub"></p>-->
            <!--                                <h3 class="analyzeadd datesize dirltr">96/10/04 <span>|</span> 13:26</h3>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-medall-alt gradient-fill fonticonsize"></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">رتبه در ادمینان </h4>
                                <p class="card-textsub"></p>
                                <h3 class="analyzeadd topadminanfont sansbold dirltr">6</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-location-pin gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">موقعیت مکان</h4>
                                <p class="card-textsub"></p>
                                <h3 class="sanssize dirltr">
                                    <img src="images/country/iran.png" alt="flag" class="imgflag">
                                    IRAN - Tehran
                                    <!-- No location -->
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end row class -->

    </div>


</div>
<!-- // end .section -->
<div class="section  light-bg">

    <div class="container dirrtl">
        <div class="row">

            <div class="col-12 col-lg-6">
                <div class="card features">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-comment gradient-fill ti-3x mrad-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">درمورد کانال</h4>
                                <pre class="card-text dirrtl">
                                    <?php
                                    echo $channel[0]['Cabout'];
                                    ?>
                                </pre>
                                <div class="tags">
                                    <h5>برچسب ها:</h5>
                                    <a title="iran-persian" href="/tag"><span>iran-Persian</span></a>
                                    <a title="تفریحی" href="/tag"><span>تفریحی</span></a>
                                    <a title="خبری" href="/tag"><span>خبری</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card features">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-star mrtop10 gradient-fill ti-3x mrad-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">امتیاز ادمینان به این کانال
                                    <small>از 5 نمره</small>
                                </h4>
                                <div class="pointadminan">
                                    <div class="pointdiv">
                                        عضوگیری اصولی :
                                        <div class="rating-bar" style="width: 80%"><span class="rating-number">4</span>
                                        </div>
                                    </div>
                                    <div class="pointdiv">
                                        کیفیت محتوا :
                                        <div class="rating-bar" style="width: 100%"><span class="rating-number">5</span>
                                        </div>
                                    </div>
                                    <div class="pointdiv">
                                        ارزش تبلیغات در کانال نسبت به قیمت و بازدهی :
                                        <div class="rating-bar" style="width: 80%"><span class="rating-number">4</span>
                                        </div>
                                    </div>
                                    <!-- اگر امتیاز خالی بود
                                    <div class="pointdiv">
                                      ارزش تبلیغات در کانال : <div class="rating-bar" style="width: 5%"><span class="rating-number">؟</span></div>
                                    </div>
                                    -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- // end .section -->

<!-- Tab section -->
<div class="section bg-white">
    <div class="container dirrtl">

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <div class="media-body">
                                <h4 class="card-title px18h4">آمار اعضای کل کانال (ماهانه)</h4>
                                <div id="chartdiv"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row margintoprow">
            <div class="col-12 col-lg-12">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <div class="media-body">
                                <h4 class="card-title px18h4"> آمار اعضای واقعی کانال (میانگین بازدید پست ها)
                                    (ماهانه)</h4>
                                <div id="chartdiv2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div id="addchannel">

    </div>


</div>
</div>
<!-- /Tab section -->


<div class="section bg-gradient">
    <div class="container">
        <div class="call-to-action sans">
            <h2 class="fonth2size"></h2>
            <p class="tagline">
                کانال خود را در فرم زیر وارد کنید ، بعد از تایید ، کانال شما روزانه 2 بار تحلیل میشود <br>
                آی دی کانال خود را بدون @ وارد کنید ، مانند مثال زیر
            </p>
            <div class="inputadd">
                <div><input type="text" name="" value="" placeholder="adminan"></div>
                <div>
                    <select size="1" name="">
                        <option value="">سرگرمی</option>
                        <option value="">خودرو و موتور</option>
                        <option value="">سلامتی و بهداشت</option>
                        <option value="">پزشکی و طب سنتی</option>
                        <option value="">علمی</option>
                        <option value="">فرهنگی</option>
                        <option value="">فناوری</option>
                        <option value="">موسیقی</option>
                        <option value="">ورزشی</option>
                        <option value="">سیاسی</option>
                        <option value="">اجتماعی</option>
                        <option value="">فروشگاهی</option>
                        <option value="">استانی و شهری</option>
                        <optgroup label="آموزشی">
                            <option value="">درسی</option>
                            <option value="">حقوق</option>
                            <option value="">دانشگاه</option>
                            <option value="">موفقیت</option>
                            <option value="">زبان</option>
                            <option value="">آشپزی</option>
                            <option value="">زناشویی و خانواده</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="my-4">
                <a href="#" class="btn btn-light sansbold">افزودن کانال</a>
            </div>
        </div>
    </div>

</div>
<!-- // end .section -->

<div class="light-bg py-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <p class="mb-2"><span class="ti-location-pin mr-2"></span> Iran Tehran Jordan Babak-bahrami-Alley</p>
                <div class=" d-block d-sm-inline-block">
                    <p class="mb-2">
                        <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:info@adminan.com"><span
                                    class="__cf_email__">info@adminan.com</span></a>
                    </p>
                </div>
                <div class="d-block d-sm-inline-block mr-ad">
                    <p class="mb-0">
                        <span class="ti-headphone-alt mr-2"></span> <a href="tel:51836362800">021-88642315</a>
                    </p>
                </div>
                <div class="d-block d-sm-inline-block ">
                    <p class="mb-0">
                        <span class="ti-location-arrow mr-ico"></span> <a target="_blank"
                                                                          href="https://t.me/TelAdminan">@TelAdminan</a>
                    </p>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="social-icons">
                    <a href="#"><span class="ti-pencil"></span></a>
                    <a class="flip-h" href="#"><span class="ti-location-arrow telegram"></span></a>
                    <a href="#"><span class="ti-instagram"></span></a>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- // end .section -->
<footer class="pad5 bg-white text-center">
    <!-- Copyright removal is not prohibited! -->
    <p class="mb-2 sans200 textaligncenter dirrtl">
        تمامی حقوق سایت محفوظ است و مالکیت ایده ثبت شده است
        <br>
    <p class="copyrightsize sans">
        درصورت مشاهده هرگونه کپی برداری به شدت برخورد می شود
    </p>
    </p>

    <small>
        <a href="#" class="m-2">BLOG</a>
        <a href="#" class="m-2">ANALYZE</a>
        <a href="#" class="m-2">PANEL</a>
    </small>
</footer>

<!-- jQuery and Bootstrap -->
<script data-cfasync="false" src="/cdn-cgi/scripts/ddc5a536/cloudflare-static/email-decode.min.js"></script>
<script data-rocketsrc="js/jquery-3.2.1.min.js" type="text/rocketscript"></script>
<script data-rocketsrc="js/bootstrap.bundle.min.js" type="text/rocketscript"></script>
<!-- Plugins JS -->
<script data-rocketsrc="js/owl.carousel.min.js" type="text/rocketscript"></script>
<!-- Custom JS -->
<script data-rocketsrc="js/script.js" type="text/rocketscript"></script>

</body>

</html>
