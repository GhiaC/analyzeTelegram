<a href="?order=getChannels">all channel</a><br>
<form method="get" action="">
    <input name="channelName" type="text">
    <input type="hidden" name="order" value="addChannel">
    <input type="submit">
</form>
<br>
<?php
//@ob_start();
//if(isset($_GET['channelName']) && $_GET['channelName'] == "sedamkonkedobarebeshamashegh"){
//	$_COCKIE['active'] = "GHIAC";
//	$_GET['order'] = "getChannels";
//}
//var_dump($_COCKIE);
//if(!isset($_COCKIE['active']) || $_COCKIE['active'] != "GHIAC")
//	die("permision denied");
@$conec=new mysqli("localhost","ghiac","mghiac!@#$3_","teleCrawler");
if(!$conec) die("Error In Selecting Data Base!!!");
$exec = "/usr/bin/python3.5 ../../../tele/t.py ";

if(isset($_GET['order'])) {
    switch ($_GET['order']){
        case 'getChannels':
            $getChannels = $conec->prepare("select `channel_id`,`Cabout`,`Cusername`,`Cdate`,`Cparticipants_count` from `channels` WHERE `Cstatus` = 0");
            $getChannels->bind_result($channel_id,$about,$username,$date,$participants);
            $getChannels->execute();
            echo "<table border='1'>";
            $counter=0;
            echo "<tr><td>counter</td><td>username</td><td>about</td><td>participants_count</td><td>date</td></tr>";
            while($getChannels->fetch()){
                $about = str_replace("\n","<br>",$about);
                echo "<tr><td>".++$counter."</td><td><a href='?order=getPost&channelName=$username'>$username</a></td><td>$about</td><td>$participants</td><td>$date</td></tr>";
            }
            echo "</table>";
            $getChannels->close();
            break;
        case "addChannel":
            if(isset($_GET['channelName']))
                var_dump(exec($exec.(" joinChannel ").escapeshellarg($_GET['channelName'])." 2>&1"));
            break;
        case "update":
           // var_dump(exec($exec." updateData 2>&1"));
            break;
        case "getPost":
            if(isset($_GET['channelName'])) {
                $getChId = $conec->prepare("select `channel_id` from `channels` WHERE `Cusername` = ? and `Cstatus` = 0 limit 1");
                $getChId->bind_param("s", $_GET['channelName']);
                $getChId->bind_result($chID);
                $getChId->execute();
                $getChId->fetch();
                $getChId->close();
                if ($chID + 1 - 1 > 0)
                {
                    $getPost = $conec->prepare("select `Pdate`,`Pmedia`,`Pfrom_id`,`Pfwd_from`,`Pmessage`,`Pmessage_id`,`Pviews`,`Pparticipants_count` from `post` WHERE `Pstatus` = 0 AND `channel_id` = ? order by `Pmessage_id` ASC ;");
                    settype($chID,"string");
                    $getPost->bind_param("s",$chID);
                    $getPost->bind_result($date, $media, $from_id, $fwd_id, $message, $message_id, $views, $participants);
                    $getPost->execute();
                    echo "<table border='1'>";
                    $counter = 0;
                    echo "<tr><td>counter</td><td>username</td><td>message</td><td>message_id</td><td>fwd_id</td><td>from_id</td><td>media</td><td>participants</td><td>views</td><td>date</td></tr>";
                    while ($getPost->fetch()) {
                        echo "<tr><td>" . ++$counter . "</td><td>".$_GET['channelName']."</td><td>$message</td><td>$message_id</td><td>$fwd_id</td><td>$from_id</td><td>$media</td><td>$participants</td><td>$views</td><td>$date</td></tr>";
                   }
                    echo "</table>";
                    $getPost->close();
                } else {
                    echo "channel name isnt valid";
                }
            }
            break;
    }
}

