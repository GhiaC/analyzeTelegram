<!doctype html>
<html lang="fa">
<head>
    <title>Telegram</title>
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
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <script>
        var chart = AmCharts.makeChart("chartdiv", {
            "type": "serial",
            "theme": "light",
            "dataProvider": [{
                "country": "سرگرمی",
                "visits": 2025
            }, {
                "country": "علمی",
                "visits": 1882
            }, {
                "country": "فرهنگی",
                "visits": 1809
            }, {
                "country": "اقتصادی",
                "visits": 1322
            }, {
                "country": "موسیقی",
                "visits": 1122
            }, {
                "country": "خبری",
                "visits": 1114
            }, {
                "country": "سیاسی",
                "visits": 984
            }, {
                "country": "اقتصادی",
                "visits": 711
            }, {
                "country": "فناوری",
                "visits": 665
            }, {
                "country": "خودرو",
                "visits": 580
            }, {
                "country": "سلامت",
                "visits": 443
            }, {
                "country": "آموزشی",
                "visits": 441
            }, {
                "country": "ورزشی",
                "visits": 395
            }],
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "visits"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "country",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
            },
            "export": {
                "enabled": true
            }

        });
    </script>
    <script>
        var chart = AmCharts.makeChart("chartnum", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [{
                "country": "",
                "litres": 70
            }, {
                "country": "",
                "litres": 11
            }, {
                "country": "",
                "litres": 9
            }, {
                "country": "",
                "litres": 7
            }, {
                "country": "",
                "litres": 3
            }],
            "valueField": "litres",
            "titleField": "country",
            "balloon": {
                "fixedPosition": false
            },
            "export": {
                "enabled": false
            }
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

<div class="teleprof">
    <img src="images/telegram.png" alt="Adminan">
</div>

<div class="section padtopch bg-white" id="features">

    <div class="container dirrtl">
        <div class="section-title dirltr fs24">
            <h3 class="sans">Telegram</h3>
        </div>


        <div class="row">

            <div class="col-12 col-lg-3">
                <div class="card features boxshad">
                    <div class="card-body">
                        <div class="media ">
                            <span class="ti-announcement transformi gradient-fill fonticonsize"></span>
                            <div class="media-body sans">
                                <h4 class="card-title px18h4">تعداد کل کانال ها </h4>
                                <p class="card-textsub">کانال های بالای 5000 ممبرکل</p>
                                <h3 class="analyzeadd dirltr">335,364
                                    <small>Channels</small>
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
                                <h4 class="card-title px18h4">کانال های تحلیل شده </h4>
                                <p class="card-textsub">بالای 1000 ممبر واقعی تحلیل میشود</p>
                                <h3 class="analyzeadd dirltr">75,400
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
                                <h4 class="card-title px18h4">ادمین های کانال </h4>
                                <p class="card-textsub">که از خدمات ما استفاده می کنند</p>
                                <h3 class="analyzeadd dirltr">5,011
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
                                <h4 class="card-title px18h4">کانال هوشمند</h4>
                                <p class="card-textsub">از سرویس ادمینان استفاده می کنند</p>
                                <h3 class="analyzeadd dirltr">3,278
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
                            <span class="ti-location-pin gradient-fill fonticonsize "></span>
                            <div class="media-body">
                                <h4 class="card-title px18h4">کانال های ازبکستان </h4>
                                <p class="card-textsub">ثبت شده در ادمینان</p>
                                <h3 class="sanssize counch dirltr">
                                    <img src="images/country/uzbekistan.png" alt="flag" class="imgflag">
                                    12,305
                                    <small>Channles</small>
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
                                <h4 class="card-title px18h4">کانال های عربی </h4>
                                <p class="card-textsub">ثبت شده در ادمینان</p>
                                <h3 class="sanssize counch dirltr">
                                    <img src="images/country/sarabia.png" alt="flag" class="imgflag">
                                    38,245
                                    <small>Channles</small>
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
                                <h4 class="card-title px18h4">کانال های روسی </h4>
                                <p class="card-textsub">ثبت شده در ادمینان</p>
                                <h3 class="sanssize counch dirltr">
                                    <img src="images/country/russia.png" alt="flag" class="imgflag">
                                    50,245
                                    <small>Channles</small>
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
                                <h4 class="card-title px18h4">کانال های ایرانی </h4>
                                <p class="card-textsub">ثبت شده در ادمینان</p>
                                <h3 class="sanssize counch dirltr">
                                    <img src="images/country/iran.png" alt="flag" class="imgflag">
                                    350,245
                                    <small>Channles</small>
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

            <div class="col-12 col-lg-12">
                <div class="card features">
                    <div class="card-body">
                        <div class="media sans">
                            <span class="ti-bookmark gradient-fill ti-3x mrad-3"></span>
                            <div class="media-body">
                                <h4 class="card-title">پراکندگی موضوع (جهانی)</h4>
                                <p class="card-text">
                                <div id="chartdiv"></div>
                                </p>
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
            <div class="col-12 col-lg-6">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">

                            <div class="media-body">
                                <h4 class="card-title px18h4">برترین کانال ها از نگاه ادمینان</h4>
                                <p class="card-text">
                                    کانال هایی که بیشترین ممبر های واقعی را دارند از طرف ادمینان ، رتبه بندی میشود
                                </p>

                                <table class="rectbl">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="wt60">اسم کانال</th>
                                        <th class="wt20">نام کاربری</th>
                                        <!--                                        <th class="wt20">اعضای کل</th>-->
                                        <!--                                        <th class="wt20">اعضای واقعی</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'Medoo.php';
                                    //use Medoo\Medoo;
                                    date_default_timezone_set("Asia/Tehran");

                                    $database = new Medoo\Medoo([
                                        'database_type' => 'mysql',
                                        'database_name' => 'teleCrawler',
                                        'server' => 'localhost',
                                        'username' => 'root',
                                        'password' => '',
                                        'charset' => 'utf8',
                                        'port' => 3306,
//    'prefix' => 'PREFIX_',
                                    ]);

                                    $channels = $database->select("channels", ["Cid", "Ctitle", "Cusername"],
                                        [
                                            "Cstatus" => 0
                                        ]
                                    );
                                    $counter = 1;
                                    foreach ($channels as $channel) {
                                        echo "<tr>" .
                                            "<td>" . $counter . "</td>" .
                                            "<td><a href='channelAnlyze.php?id=" . $channel['Cid'] . "' title=''>" . $channel['Ctitle'] . "</a></td>" .
                                            "<td>" . $channel['Cusername'] . "@</td>" .
                                            "</tr>";
                                        $counter++;
                                    }
                                    ?>
                                    <!--                                    <tr>-->
                                    <!--                                        <td>1</td>-->
                                    <!--                                        <td><a href="channelAnlyze.php?id=1" title="">حواشی هنرمندان</a></td>-->
                                    <!--                                        <td class="text-center">29,818</td>-->
                                    <!--                                        <td class="text-center">8,600</td>-->
                                    <!--                                    </tr>-->
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <div class="media-body">
                                <h4 class="card-title px18h4">سهم کانال های کشور ها از تلگرام</h4>
                                <p class="card-text">
                                    سهم کانال های کشور های مخلف از تلگرام بر اساس تعداد کانال های ثبت شده در ادمینان
                                </p>
                                <div id="chartnum"></div>
                                <div class="helpcl">
                                    <div class="helpclcol hlcol-blue">IRAN</div>
                                    <div class="helpclcol hlcol-yellow">Russia</div>
                                    <div class="helpclcol hlcol-green">uzbakistan</div>
                                    <div class="helpclcol hlcol-red">arabian</div>
                                    <div class="helpclcol hlcol-pink">other</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row margintoprow">

            <div class="col-12 col-lg-6">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <div class="media-body">
                                <h4 class="card-title px18h4">بیشترین پیشرفت اعضا</h4>
                                <p class="card-text">
                                    درصد کانال ها بر اساس ممبر های کل در قالب نمودار زیر
                                </p>

                                <ul class="nav nav-tabs nav-justified dirltr" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec" data-toggle="tab" href="#month3">ماه</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec" data-toggle="tab" href="#week2">هفته </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec active" data-toggle="tab"
                                           href="#day1">روز </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabrec">
                                    <div class="tab-pane fade show active" id="day1">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <table class="rectbl">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="wt60">اسم کانال</th>
                                                    <th class="wt20">اعضای کنونی</th>
                                                    <th class="wt20">پیشرفت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#" title="">حواشی هنرمندان</a></td>
                                                    <td class="text-center">29,818</td>
                                                    <td class="text-center alertsuc">8,600<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><a href="#" title="">BBC Persian</a></td>
                                                    <td class="text-center">1,562,056</td>
                                                    <td class="text-center alertsuc">7,530<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><a href="#" title="">VOA Farsi</a></td>
                                                    <td class="text-center">876,531</td>
                                                    <td class="text-center alertsuc">6,530<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><a href="#" title="">Amadnews</a></td>
                                                    <td class="text-center">1,070,264</td>
                                                    <td class="text-center alertsuc">6,300<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><a href="#" title="">صادق زیباکلام</a></td>
                                                    <td class="text-center">437,034</td>
                                                    <td class="text-center alertsuc">5,763<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td><a href="#" title="">Homayoun Shajarian</a></td>
                                                    <td class="text-center">232,235</td>
                                                    <td class="text-center alertsuc">4,352<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td><a href="#" title="">Ali Daei</a></td>
                                                    <td class="text-center">260,003</td>
                                                    <td class="text-center alertsuc">3,156<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td><a href="#" title="">Ali Karimi</a></td>
                                                    <td class="text-center">235,680</td>
                                                    <td class="text-center alertsuc">2,980<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td><a href="#" title="">Hamid Farrokhnezhad</a></td>
                                                    <td class="text-center">360,540</td>
                                                    <td class="text-center alertsuc">2,238<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td><a href="#" title="">Parviz Parastoue</a></td>
                                                    <td class="text-center">80,260</td>
                                                    <td class="text-center alertsuc">1,806<span
                                                                class="ti-angle-up suci"></span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="week2">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <div class="dirrtl sans">
                                                week
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="month3">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <div class="dirrtl sans">
                                                month
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="cards featuress boxshad">
                    <div class="card-body">
                        <div class="media sans">
                            <div class="media-body">
                                <h4 class="card-title px18h4">بیشترین ریزش اعضا</h4>
                                <p class="card-text">
                                    درصد کانال ها بر اساس ممبر های کل در قالب نمودار زیر
                                </p>

                                <ul class="nav nav-tabs nav-justified dirltr" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec" data-toggle="tab" href="#month33">ماه</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec" data-toggle="tab" href="#week22">هفته </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link colortab padrec active" data-toggle="tab"
                                           href="#day11">روز </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabrec">
                                    <div class="tab-pane fade show active" id="day11">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <table class="rectbl">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="wt60">اسم کانال</th>
                                                    <th class="wt20">اعضای کنونی</th>
                                                    <th class="wt20">پیشرفت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="#" title="">حواشی هنرمندان</a></td>
                                                    <td class="text-center">29,818</td>
                                                    <td class="text-center alertdan">8,600<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><a href="#" title="">BBC Persian</a></td>
                                                    <td class="text-center">1,562,056</td>
                                                    <td class="text-center alertdan">7,530<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><a href="#" title="">VOA Farsi</a></td>
                                                    <td class="text-center">876,531</td>
                                                    <td class="text-center alertdan">6,530<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><a href="#" title="">Amadnews</a></td>
                                                    <td class="text-center">1,070,264</td>
                                                    <td class="text-center alertdan">6,300<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><a href="#" title="">صادق زیباکلام</a></td>
                                                    <td class="text-center">437,034</td>
                                                    <td class="text-center alertdan">5,763<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td><a href="#" title="">Homayoun Shajarian</a></td>
                                                    <td class="text-center">232,235</td>
                                                    <td class="text-center alertdan">4,352<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td><a href="#" title="">Ali Daei</a></td>
                                                    <td class="text-center">260,003</td>
                                                    <td class="text-center alertdan">3,156<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td><a href="#" title="">Ali Karimi</a></td>
                                                    <td class="text-center">235,680</td>
                                                    <td class="text-center alertdan">2,980<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td><a href="#" title="">Hamid Farrokhnezhad</a></td>
                                                    <td class="text-center">360,540</td>
                                                    <td class="text-center alertdan">2,238<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td><a href="#" title="">Parviz Parastoue</a></td>
                                                    <td class="text-center">80,260</td>
                                                    <td class="text-center alertdan">1,806<span
                                                                class="ti-angle-down suci"></span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="week22">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <div class="dirrtl sans">
                                                week
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="month33">
                                        <div class="d-flex flex-column flex-lg-row">
                                            <div class="dirrtl sans">
                                                month
                                            </div>
                                        </div>
                                    </div>
                                </div>


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
    <div id="addchannel"></div>

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
