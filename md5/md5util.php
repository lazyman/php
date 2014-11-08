<?php
 //filename: dir.php
# MD5工具
require '../inc/dbconnect.inc.php';

// 保存信息到数据库
function saveToDb($fileinfo) {
	
	$nowtime = date("Y-m-d H:i:s", time());
	$sql = "insert into FILEMANAGE(filepath, md5, filesize, usetime, recordTime) 
	values('$fileinfo['pathname']', '$fileinfo["md5"]', '$fileinfo["size"]', $fileinfo["usetime"],$nowtime)";
	$result = mysql_query($sql);
	mysql_close($con);

}

// 检查是否已经分析过
function hasAnalyzed($pathname) {
	$fileinfo = getFileInfo($pathname);

	if ($fileinfo) {
		return true;
	} else {
		return false;
	}
}

# 根据文件路径从数据库获取文件信息
function getFileInfo($pathname) {
	$sql = "select * from FILEMANAGE where filepath = $pathname";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result)

	//$fileinfo = array();
	//$fileinfo["pathname"] = $row["pathname"];
	mysql_close($con);

	return $row;
}

// 计算给定路径的MD5，并保存到数据库
function analyzeToMd5($pathname) {
	if (hasAnalyzed($pathname)) {
		return getFileInfo($pathname);
	} else {
		$fileinfo = array();
		$fileinfo["pathname"] = $pathname;
		$fileinfo["size"] = filesize($pathname);
		$begintime = time();
		$fileinfo["md5"] = md5_file( $pathname);
		$endtime = time();
		// 计算md5耗时
		$fileinfo["usetime"] = $endtime - $begintime;
		$fileinfo["begintime"] = $begintime;
		$fileinfo["endtime"] = $endtime;

		saveToDb($fileinfo);

		return $fileinfo;
	}
}
?>