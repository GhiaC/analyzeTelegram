<?php
define("TABLE_DAY", "analyze_day");
define("TABLE_WEEK", "analyze_week");

require 'Medoo.php';
require './jdf.php';

//use Medoo\Medoo;
date_default_timezone_set("Asia/Tehran");

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

$Jdate = jdate("Y-m-d", strtotime("-1 days"));
$channels = $database->select("channels", ["Cid", "channel_id"], [
    "AND" => [
        "ClastCheck[!]" => [$Jdate]
    ]
]);
foreach ($channels as $channel) {
    updateLastCheck($database, $channel['Cid'], "CHECK");
    analyze_day($database, $channel['Cid'], $channel['channel_id']);
}
foreach ($channels as $channel) {
    if (date("l", time()) == "Saturday") {
        analyze_week($database, $channel['Cid']);
    }
}

function updateLastCheck($database, $Cid, $date)
{
    $database->update("channels", [
        "ClastCheck" => $date
    ], [
        "Cid" => $Cid
    ]);
}

function analyze_day($database, $Cid, $channel_id)
{
    $secondDay = 24 * 60 * 60;
    $date = date('Y-m-d', strtotime("-1 days"));
    $Jdate = jdate("Y-m-d", strtotime("-1 days"));

    $dateTime = new DateTime($date);
    $yesterdayTime = ($dateTime->getTimestamp());
    $todayTime = $yesterdayTime + $secondDay;

    $conditions = [
        "channel_id" => $channel_id,
        "Pdate[<>]" => [$yesterdayTime . "", "" . $todayTime]
    ];

    $has = $database->has(TABLE_DAY, [
        "Cid" => $Cid,
        "ADdate" => $Jdate
    ]);

    if ($has || ($todayTime + 60 * 60 * 9) > time())
        return false;

    $countPosts = $database->count("post", $conditions);
    if ($countPosts == 0)
        return (false);
    $countMedias = $database->count("post", array_merge($conditions, ["Pmedia[!]" => "None"]));
    $countFwds = $database->count("post", array_merge($conditions, ["Pfwd_from[!]" => "None"]));
    $activeMember = round($database->avg("post", "Pviews", array_merge($conditions, ["Pfwd_from" => "None"])));

    $first = $database->select("post", [
        "Pparticipants_count"
    ], array_merge($conditions, [
            "ORDER" => [
                "Pmessage_id" => "DESC"
            ],
            "LIMIT" => 1
        ])

    );
    $last = $database->select("post", [
        "Pparticipants_count"
    ], array_merge($conditions,
            ["ORDER" => [
                "Pmessage_id" => "ASC"
            ],
                "LIMIT" => 1
            ])
    );

    $first = $first[0]['Pparticipants_count'];
    $last = $last[0]['Pparticipants_count'];
    $dif = $last - $first;

    $result = $database->insert(TABLE_DAY, [
        "Cid" => $Cid + 1 - 1,
        "ADdate" => $Jdate,
        "ADposts" => $countPosts . "",
        "ADactive_member" => $activeMember . "",
        "ADmedias" => $countMedias . "",
        "ADfwds" => $countFwds . "",
        "ADdif_member" => $dif . "",
        "ADmember" => $last . "",
    ]);
    if ($result)
        updateLastCheck($database, $Cid, $Jdate);
    return (true);
}

function analyze_week($database, $Cid)
{
    $time = time();
    if (date("l", $time) != "Saturday")
        return false;

    $date1 = jdate('Y-m-d', strtotime("-7 days"));
    $date2 = jdate('Y-m-d', $time);


    $has = $database->has(TABLE_WEEK, [
        "Cid" => $Cid,
        "AWdate" => $date2
    ]);
    if ($has)
        return false;

    $conditions = [
        "Cid" => $Cid,
        "ADdate[<>]" => [$date1, $date2]
    ];

    $post_sum = $database->sum(TABLE_DAY, "ADposts", $conditions);
    if ($post_sum == NULL)
        return false;

    $post_avg = $database->avg(TABLE_DAY, "ADposts", $conditions);
    $active_member = round($database->avg(TABLE_DAY, "ADactive_member", $conditions));
    $medias_sum = $database->sum(TABLE_DAY, "ADmedias", $conditions);
    $medias_avg = $database->avg(TABLE_DAY, "ADmedias", $conditions);
    $fwds_sum = $database->sum(TABLE_DAY, "ADfwds", $conditions);
    $fwds_avg = $database->avg(TABLE_DAY, "ADfwds", $conditions);
    $dif_member_sum = $database->sum(TABLE_DAY, "ADdif_member", $conditions);
    $dif_member_avg = $database->avg(TABLE_DAY, "ADdif_member", $conditions);
    $member = $database->select(TABLE_DAY, [
        "ADmember"
    ], array_merge($conditions,
            ["ORDER" => [
                "ADdate" => "DESC"
            ],
                "LIMIT" => 1
            ])
    );

    $result = $database->insert(TABLE_WEEK, [
        "Cid" => $Cid,
        "AWdate" => $date2,
        "AWposts_sum" => $post_sum,
        "AWposts_avg" => round($post_avg),
        "AWactive_member" => $active_member,
        "AWmedias_sum" => $medias_sum,
        "AWmedias_avg" => round($medias_avg),
        "AWfwds_sum" => $fwds_sum,
        "AWfwds_avg" => round($fwds_avg),
        "AWdif_member_sum" => $dif_member_sum,
        "AWdif_member_avg" => round($dif_member_avg),
        "AWmember" => $member[0]['ADmember'],
    ]);

    if ($result)
        updateLastCheck($database, $Cid, $date2);
}

