<?php
 //filename: calcmd5.php
/**
* 计算MD5，并存入mysql
* input
* pathname=
* return {"md5":""}
**/
require '../md5/md5util.php';

//@表示这行有错误或是警告不要输出
@$pathname = $_GET["pathname"];
if (empty($pathname)) {
  $dir_file = $_SERVER['SCRIPT_NAME'];
  $pathname = realpath(basename($dir_file));
  $msg = "加 ?pathname=<路径> 传入要计算md5的文件";
  echo $msg;
}

analyzeToMd5($pathname);

echo json_encode($fileinfo);
?>
