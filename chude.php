<?php
ob_start();
include 'config.php';

$chudecon=$_REQUEST['chudenoidung'];
$tencd=$_REQUEST["tencd"];
$mota=$_REQUEST["mota"];
$mota=str_replace("'","",$mota);
$mode=$_REQUEST['mode'];
if(!isset($_REQUEST['kichhoat']))
{
	$kichhoat=0;
}
else
{
	$kichhoat=$_REQUEST['kichhoat'];
}
if($mode=='insert')
{
	$query="insert into chudenoidung(chudecon,tencd,mota,kichhoat) values('$chudecon','$tencd','$mota','$kichhoat')";
	mysql_query($query) or die(mysql_error());
	
	header ("Location: index.php?p=chude");
}
if($mode=='update')
{
	$macd=$_REQUEST['macd'];
	$query="update chudenoidung set chudecon='$chudecon',tencd='$tencd',mota='$mota',kichhoat='$kichhoat' where macd='$macd'";	
	mysql_query($query) or die(mysql_error());
	
	header ("Location: index.php?p=chude");
	
}
if($mode=='delete')
{		
	$macd=$_REQUEST["macd"];	
	$query="delete from chudenoidung where macd='$macd'";	
	mysql_query($query) or die(mysql_error());

	header ("Location: index.php?p=chude");
}
?>