<?php
ob_start();
include 'config.php';
 
 $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n";
 $cus_name  = $HTTP_POST_VARS['cus_name'];
 $cus_company=$HTTP_POST_VARS['cus_company'];
 $cus_phone=$HTTP_POST_VARS['cus_phone']; 
 $cus_email  = $HTTP_POST_VARS['cus_email'];
 $cus_des = $HTTP_POST_VARS['cus_des'];
 $cus_date=date("Y-m-d");
 $ip=$_SERVER['REMOTE_ADDR'];

$output[] = '<table cellspacing="2" cellpadding="2" border="1">';
$output[] = '<tr>';
$output[] = '<td align="center" height="20px" style="color:#4092f6;font-size:12px;font-weight:bold">Tên liên hệ</td><td style="font-size:12px;">'.$cus_name.'</td></tr><tr>';
$output[] = '<td align="center" height="20px" style="color:#4092f6;font-size:12px;font-weight:bold">E-mail</td><td style="font-size:12px;">'.$cus_email.'</td></tr><tr>';
$output[] = '<td align="center" height="20px" style="color:#4092f6;font-size:12px;font-weight:bold">Điện thoại</td><td style="font-size:12px;">'.$cus_phone.'</td></tr><tr>';
$output[] = '<td align="center" height="20px" style="color:#4092f6;font-size:12px;font-weight:bold">Nội dung</td><td style="font-size:12px;">'.$cus_des.'</td>';					
$output[] = '</tr>';
$output[] = '</table>';
$output = join('',$output);

 mail("phuocndt@yahoo.com","Thong tin lien lac tu website",$output,$headers);
 
 
 $sql_insert="insert into contacts (name,company,phone,email,comment,ip,date)    values('$cus_name','$cus_company','$cus_phone','$cus_email','$cus_des','$ip','$cus_date')";

mysql_query($sql_insert) or die(mysql_error());

header("Location: wait.php");
?>