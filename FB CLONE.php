<?php
@system("clear");
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Master_BT_fb_tool');
/***[ Color ]***/
$xnhac = "\033[1;36m";
$do = "\033[1;31m";
$luc = "\033[1;32m";
$vang = "\033[1;33m";
$xduong = "\033[1;34m";
$hong = "\033[1;35m";
$trang = "\033[1;37m";
/***[ USERAGENT ]***/
$_SESSION["useragent"] = "Mozilla/5.0 (Linux; Android 10; SM-A750GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.87 Mobile Safari/537.36";
$useragent = "Mozilla/5.0 (Linux; Android 10; SM-A750GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.87 Mobile Safari/537.36";
/***[ Copyright Mark ]***/
$ndp_tool = $trang."~".$trang."[".$do ."🌸".$trang."] ".$trang."➩ ";
$ndp = $trang."~".$trang."[".$do."🌸".$trang."] ".$trang."➩ ";
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
    $_SESSION['load'] = 1200;
    $_SESSION['delay'] = 2000;
} else {
    $_SESSION['load'] = 0;
    $_SESSION['delay'] = 1000;
}
/***[ Config ]***/
$_SESSION['version'] = "1.2";
$_SESSION['shop'] = "Subre69.site";
/***[ Banner ]***/
$banner = "
     \033[1;35m███╗░░░███╗████████╗░█████╗░░█████╗░██╗░░░░░ 
     \033[1;37m████╗░████║╚══██╔══╝██╔══██╗██╔══██╗██║░░░░░ 
     \033[1;35m██╔████╔██║░░░██║░░░██║░░██║██║░░██║██║░░░░░ 
     \033[1;37m██║╚██╔╝██║░░░██║░░░██║░░██║██║░░██║██║░░░░░ 
     \033[1;35m██║░╚═╝░██║░░░██║░░░╚█████╔╝╚█████╔╝███████╗ 
     \033[1;37m╚═╝░░░░░╚═╝░░░╚═╝░░░░╚════╝░░╚════╝░╚══════╝
\n";



while (true) {
    follow_page($banner, $ndp_tool);
    echo $ndp_tool.$luc."Please Enter Facebook Cookies".$trang.":".$vang." ";
    $ck = trim(fgets(STDIN));
    // GET TOKEN  &  FB_DTSG
    $TOKEN = curl_exc_acsefc($ck);
    $FB_DTSG = curl_exec_acsefc($ck);

    $check4 = curl_exec_asefc("https://graph.facebook.com/me/accounts?access_token=" . $TOKEN, $ck);
    $check3 = json_decode($check4, true);

    if (strpos($check4, "id") != true) {
        echo ("No Pages Found !!\n"); sleep(3);
        break;
    } else {
        $list_page = [];
        $sopage = 0;
        while (true) {
            $page = $check3['data'][$sopage]['id'];
            if ($page == false) {
                break;
            } else {
                array_push($list_page, $page);
                $sopage++;
            }
        }
    }
    $sopage = count($list_page);



    system("clear");
    follow_page($banner, $ndp_tool);
    $page = thongtin('me', $ck, $useragent);
    $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
    $idfb = explode('%',explode('?lst=', $page)[1])[0];
    echo $ndp_tool.$vang."ID FB: ".$trang.$idfb.$do." | ".$vang."FB name: ".$trang.$tenfb."".$luc."\n";
    echo "\e[1;31m".str_repeat('──', 32)."\n";
    echo $ndp_tool.$luc."The Total Number of Pages You Have Is".$trang.": ".$sopage.$luc." Page\n";
    while (true) {
        $stt = 0;
        echo "\e[1;31m".str_repeat('──', 32)."\n";
        echo $ndp_tool.$luc."Enter the Number of Followers You Need to Increase".$trang.":".$vang." ";
        $soluong = trim(fgets(STDIN));
        if ($soluong > $sopage) {
            $soluong = $sopage;
        }
        echo "\e[1;31m".str_repeat('──', 32)."\n";
        echo $ndp_tool.$luc."Enter the Facebook Link You Want to Boost".$trang.":".$vang." ";
        $link = trim(fgets(STDIN));
        echo "\e[1;31m".str_repeat('──', 32)."\n";


        $USER_NEED_FOLLOW = curl_exec_assefc($link);
        if ($USER_NEED_FOLLOW == "1") {
            echo ("Link Profiles Wrong Please Check Again\n");
        } else {
        }

        for ($k = 0; $k < $soluong; $k++) {
            $stt = $stt + 1;
            $PAGE = $list_page[$k];
            date_default_timezone_set('Asia/Master_tg_fb_tool');
            $time = date('H:i:s');
            echo "".$do."[".$vang.$stt.$do."] | ".$xnhac.$time.$do." | ".$trang.$USER_NEED_FOLLOW.$do." |";
            $BUFF = curl_exc_bcsefc($FB_DTSG, $USER_NEED_FOLLOW, $PAGE, $ck);
            $KTRA = explode('{"data":{"actor_subscribe":{"', $BUFF)[1];
            $KTRA = explode('":{"__typename', $KTRA)[0];
            if ($KTRA == "subscribee") {
                echo $vang." SUCCESS \n";
            } else {
                echo $do." ERROR \n";
            }
            if ($sopage == $stt) {
                echo ("Enough Running " . $sopage . " Page! <br/> \n");
            }
        }
    }
}
# ========== [ FUNCTION ] ========== 
function follow_page($banner, $ndp_tool){
    for($i = 0; $i < strlen($banner); $i++){echo $banner[$i];usleep($_SESSION['load']);}
    echo "\033[1;37m~\033[1;32m Providing Cheap Social Media Services At\033[1;37m: ".$_SESSION['shop']."\n"; 
    echo "\e[1;31m".str_repeat('──', 32)."\n";
    echo $ndp_tool."\033[1;35mTOOL BUFF FL BY CYRPYBT TRICK VERSION ".$_SESSION['version']."\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;33mTelegram: \033[1;34m@TERMUXCYRPYBTTRICK\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;32mSupport Tool: \033[1;33mCyrpybt Trick Tool\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;31mAdmin: \033[1;35m@Master_CyrpybtTrick\n"; usleep($_SESSION['load']);
    echo $ndp_tool."\033[1;36mSupport: \033[1;37mMaster_CyrpybtTrick\n"; usleep($_SESSION['load']);
    echo "\e[1;31m".str_repeat('──', 32)."\n";
}
function thongtin($id, $ck, $useragent)
{

    $ch = curl_init();
    $header = array(
        "Host:m.facebook.com",
        "user-agent:$useragent",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "cookie:$ck",
    );
    $linkbv = 'https://m.facebook.com/' . $id . '/about';
    curl_setopt($ch, CURLOPT_URL, $linkbv);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $ck);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
    :'));
    $page = curl_exec($ch);
    $page1 = json_decode($page);

    return $page;
}
function curl_exc_bcsefc($FB_DTSG, $USER_NEED_FOLLOW, $PAGE, $ck)
{
    $url = 'https://www.facebook.com/api/graphql/';
    $body = '__a=1&fb_dtsg=' . $FB_DTSG . '&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometUserFollowMutation&variables={"input":{"subscribe_location":"PROFILE","subscribee_id":"' . $USER_NEED_FOLLOW . '","actor_id":"' . $PAGE . '","client_mutation_id":"2"},"scale":1.5}&server_timestamps=true&doc_id=4451435638222552&fb_api_analytics_tags=["qpl_active_flow_ids=30605361"]';
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $headers = array(
        "accept: */*",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "origin: https://m.facebook.com",
        "referer: https://m.facebook.com/tungmmo?_rdr",
        "sec-fetch-dest: empty",
        "sec-fetch-mode: cors",
        "sec-fetch-site: same-origin",
        "x-requested-with: XMLHttpRequest",
        "x-response-format: JSONStream"
    );
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 10; SM-A750GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_COOKIE, $ck);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $mr2 = curl_exec($ch);
    curl_close($ch);
    return $mr2;
}
function curl_exc_acsefc($ck)
{
    $head = array("Connection: keep-alive", "Keep-Alive: 300", "authority: m.facebook.com", "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5", "cache-control: max-age=0", "upgrade-insecure-requests: 1", "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9", "sec-fetch-site: none", "sec-fetch-mode: navigate", "sec-fetch-user: ?1", "sec-fetch-dest: document");
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://business.facebook.com/business_locations",
        CURLOPT_USERAGENT => "Mozilla/5.0 (Linux; Android 10; SM-A750GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36",
        CURLOPT_COOKIE => $ck,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => TRUE
    ));
    $access = curl_exec($ch);
    curl_close($ch);
    $access_token = 'EAAG' . explode('","', explode('EAAG', $access)[1])[0];
    if (strlen($access_token) > 5) {
        return $access_token;
    } else {
        return 'die';
    }
}
function curl_exec_acsefc($ck)
{
    $url = "https://mbasic.facebook.com/messages/";
    $ch = @curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    $head = array(
        'authority:mbasic.facebook.com',
        'sec-ch-ua:" Not A;Brand";v="99", "Chromium";v="96", "Google Chrome";v="96"',
        'sec-ch-ua-mobile:?0',
        'sec-ch-ua-platform:"Windows"',
        'upgrade-insecure-requests:1',
        'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
        'accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'sec-fetch-site:none',
        'sec-fetch-mode:navigate',
        'sec-fetch-user:?1',
        'sec-fetch-dest:document',
        'accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
    );
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 10; SM-A750GN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.50 Mobile Safari/537.36");
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_COOKIE, $ck);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $response = curl_exec($ch);
    curl_close($ch);
    $FB_DTSG = "";
    $a = explode('name="fb_dtsg" value="', $response)[1];
    $FB_DTSG = explode('" autocomplete="off"', $a)[0];
    if ($FB_DTSG != "") {
        return $FB_DTSG;
    } else {
        die("\033[1;37m=> \033[1;31mCookie Die Or Error!\n");
    }
}
function curl_exec_asefc($url, $cookie)
{
    $ch   = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER =>
            array(
                "Cookie:" . $cookie,
            ),
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_ENCODING => TRUE,
        )
    );
    $ch = curl_exec($ch);
    return $ch;
}

function curl_exec_assefc($link)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => "https://id.atpsoftware.vn/",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER =>
            array(
                "cache-control:max-age=0",
                "upgrade-insecure-requests:1",
                "user-agent:" . $_SESSION["useragent"],
                "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
                "content-type:application/x-www-form-urlencoded",
            ),
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => "linkCheckUid=" . $link,
        )
    );
    $id = curl_exec($ch);
    $id = explode("</textarea>", explode('center;overflow: hidden;">', $id)[1])[0];
    if (strlen($id) > 5) {
        return $id;
    } else {
        return "1";
    }
}