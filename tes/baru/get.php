  <?php
echo str_replace("\n", "\n", file_get_contents("text.txt"));
$url = "https://za.gl/0jZXEDM7";


function ambil($awal,$akhir,$page)
{
	$pisah = explode($awal, $page);
	$pisah = explode($akhir, $pisah['1']);
	return $pisah['0'];
}
$ckfile = "cookie.txt";
fopen($ckfile, "w");
$proxy = readline("Masukkan Proxy : ");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);     // PROXY details with port
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Connection: keep-alive";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Referer: https://facebook.com/izz.354";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $ckfile);
$data = curl_exec($ch);
curl_close($ch);
//echo $data;

$method = ambil('<input type="hidden" name="_method" value="','" />',$data);
$csrf = ambil('<input type="hidden" name="_csrfToken" autocomplete="off" value="','" />',$data);
$token = ambil('<input type="hidden" name="_Token[fields]" autocomplete="off" value="','" />',$data);
$token1 = ambil('<input type="hidden" name="_Token[unlocked]" autocomplete="off" value="','" />',$data);
$add = ambil('<input type="hidden" name="ad_form_data" value="','" />',$data);
// Data Diencode
$method = urlencode($method);
$csrf = urlencode($csrf);
$token = urlencode($token);
$token1 = urlencode($token1);
$add = urlencode($add);

$da = "ad_form_data=$add&".urlencode("_Token[fields]")."=$token&".urlencode("_Token[unlocked]")."=$token1";
$post = str_replace("%", '"%"', $da);
echo $post;
fwrite(fopen("d.txt", "w+"), $post);
$file_1 = file_get_contents("1.sh");
$c = file_get_contents("cookie.txt");
$file = file_get_contents("cookie.txt");
echo ambil("__cfduid	","\n",$file)."\n";
echo ambil("AppSession	","\n",$file)."\n";
echo ambil("zagl_publisher	","\n",$file)."\n";
echo ambil("csrfToken	","\n",$file)."\n";
echo ambil("visitor	","\n",$file); //csrfToken	
$d = str_replace(file_get_contents("1.txt"), $post, $file_1);

$d = str_replace("dee0d9207ec3121f30fed7118585816f51542198924", ambil("__cfduid	","\n",$file), $d);
$d = str_replace('Q2FrZQ"%"3D"%"3D.NDExZGExYjM5NzAwNTY4ZDk3MTAzM2U5OTE0OTQ0YmQxZDllMGY3NDhlYWZhOTM0MTU0NjY5ZTM2YmM0NjFlN37ESicB5nL"%"2BRM"%"2BRiIirLkz"%"2FSln99M8LVPCeDGDv3dCtjwyLMJXLTPf4Lb9vKeIJOeSGp9Tae"%"2Bfx"%"2BP2owTECMNTz4vDuVUWkqdccH7267Ksb', str_replace("%", '"%"', ambil("visitor	","\n",$file)), $d);
$d = str_replace("ikuub9jpdjqkjjm4j4eib1vlu5", ambil("AppSession	","\n",$file), $d);
$d = str_replace("royhul255", ambil("zagl_publisher	","\n",$file), $d);
$d = str_replace("d3722625202aabcee91c9aae193ce8055f6c9284fd92ddcd521af2cf124d25f7f3ec817c0f1f45471cb4a81eed3bd006aef18b508ea68349617989aeb0515ab3", ambil("csrfToken	","\n",$file), $d);
$d = str_replace("
;", ";", $d);
$url2 = "https://facebook.com/izz.354";
$d = str_replace("https://za.gl/pJ0WIm", $url2, $d);
if (!empty($proxy)) 
{
	$d = str_replace("--proxy 127.0.0.1:80", "--proxy ".$proxy, $d);
}
else
{
	$d = str_replace("--proxy 127.0.0.1:80", "", $d);
}

fwrite(fopen("d.sh", "w+"), $d);
?>