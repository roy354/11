<?php
function ambil($awal,$akhir,$page)
{
	$pisah = explode($awal, $page);
	$pisah = explode($akhir, $pisah['1']);
	return $pisah['0'];
}
$file = file_get_contents("cookie.txt");
echo ambil("__cfduid	","\n",$file)."\n";
echo ambil("AppSession	","\n",$file)."\n";
echo ambil("zagl_publisher	","\n",$file)."\n";
echo ambil("csrfToken	","\n",$file)."\n";
echo ambil("visitor	","\n",$file); //csrfToken		
?>