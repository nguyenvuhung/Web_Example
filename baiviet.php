<?php
ob_start();
include "config.php";
$macd=$_REQUEST['chudenoidung'];
$tennd=$_REQUEST["tennd"];
$motangan=$_REQUEST["motangan"];
$motachitiet=$_REQUEST["motachitiet"];
$nguoigoi=$_REQUEST["nguoigoi"];
$motangan=str_replace("'","",$motangan);
$motachitiet=str_replace("'","",$motachitiet);
$ngaydang=date("Y-m-d h:m:s");
if(!isset($_REQUEST['kichhoat']))
{
	$kichhoat=0;
}
else
{
	$kichhoat=$_REQUEST['kichhoat'];
}
$mode=$_REQUEST['mode'];

if($mode=='insert')
{
	$query="insert into noidung(macd,tennd,motangan,motachitiet,ngaydang,nguoigoi,kichhoat) values('".$macd."','".$tennd."','".$motangan."','".$motachitiet."','".$ngaydang."','".$nguoigoi."','".$kichhoat."')";
	mysql_query($query) or die(mysql_error());		
		
	header ("Location: ".$mosConfig_live_site."index.php?p=baiviet");
}
if($mode=='update')
{
	$mand=$_REQUEST['mand'];
	$query="update noidung set macd='".$macd."',tennd='".$tennd."',motangan='".$motangan."',motachitiet='".$motachitiet."',ngaydang='".$ngaydang."',nguoigoi='".$nguoigoi."',kichhoat='".$kichhoat."' where mand='".$mand."'";		
	mysql_query($query) or die(mysql_error());
	
	header ("Location: ".$mosConfig_live_site."index.php?p=baiviet");
}
if($mode=='delete')
{
	$mand=$_REQUEST['mand'];		
	$query="DELETE FROM noidung WHERE mand=$mand ";	
	mysql_query($query) or die(mysql_error());	
		
	header ("Location: ".$mosConfig_live_site."index.php?p=baiviet");
}
?>