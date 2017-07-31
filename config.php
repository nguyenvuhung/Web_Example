<?php
ob_start();
$link = mysql_connect("localhost", "root", "");
if (!$link) {
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("baitapphp_db") or
die("khong the connect database");
//config web
$mosConfig_live_site = 'http://localhost/baitap_php/';
$mosConfig_absolutePath = 'W:\\var\\www\\baitap_php\\';
$phuocndt_title = "Ten website";
//config image
define('_phuocndt_project_IMAGE_URL', $mosConfig_live_site .'upload/' );
define('_phuocndt_project_IMAGE_PATH', $mosConfig_absolutePath .'/upload/' );

?>