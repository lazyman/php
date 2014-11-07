
<?php
# 数据库链接 - >  dbconnect.inc.php
require 'setting.inc.php';

$con=mysql_connect($dbhost,$dbname,$dbpass);//doing cennection

if(!$con) {
	//echo $dbhost . " | " . $dbname . " | " . $dbpass;
	die ("mysql connect error22:".mysql_error() );//put out the error
}

mysql_select_db ($dbname,$con);//setting the present db

// 设置编码格式为utf-8，解决从mysql取数据时乱码的问题
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
?>
