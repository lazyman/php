<?php
 //filename: dir.php
/**
* 计算MD5，并存入mysql
* input
* pathname=
* return {"md5":""}
**/
//@表示这行有错误或是警告不要输出
set_time_limit(1800) ;
@$pathname = $_GET["pathname"];
@$enableMd5 = $_GET["md5"];
if (empty($pathname)) {
  //$dir_file = $_SERVER['SCRIPT_NAME'];
  $pathname = realpath(basename($dir_file));
  $msg = "加 ?pathname=<路径>&md5=&lt;true or false> 传入要计算md5的路径<br />";
  echo $msg;
}

$dir = dir($pathname);
$rtn = array();
while( $file = $dir->read() ) {
	$file = $pathname . "/" . $file;

	$obj = array();
	$obj[pathname] = $file;
	if( is_dir( $file ) ) {
		$obj[isdir] = "true";
		$obj[size] = -1;
	} else {
		$obj[isdir] = "false";
		$obj[size] = filesize($file);
		if( $enableMd5 == "true" ) {
			$obj[md5] = md5_file( $file);
		}
	}

	$rtn[] = $obj;
}
echo json_encode($rtn, JSON_UNESCAPED_SLASHES);
?>
