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
	$dir_file = "/";
  $pathname = realpath(basename($dir_file));
  $msg = "加 ?pathname=<路径>&md5=&lt;true or false> 传入要计算md5的路径<br />";
  echo $msg;
  echo $pathname;
}

$dir = dir($pathname);
$fileinfos = array();
while( $file = $dir->read() ) {
	$file = $pathname . "/" . $file;

	$fileinfo = array();
	$fileinfo["pathname"] = $file;
	if( is_dir( $file ) ) {
		$fileinfo["isdir"] = "true";
		$fileinfo["size"] = -1;
	} else {
		$fileinfo["isdir"] = "false";
		$fileinfo["size"] = filesize($file);
		if( $enableMd5 == "true" ) {
			$fileinfo["md5"] = md5_file( $file);
		}
	}

	$fileinfos[] = $fileinfo;
}
echo json_encode($fileinfos);
?>
