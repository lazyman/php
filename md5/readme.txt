file.php
计算MD5，并存入mysql
input
pathname=
return {"md5":""}

dir.php
返回目录文件列表，指明每个文件的大小、是否目录、路径
input
pathname=
return 
	[
		{"pathname":"路径", "isdir":"true or false", "size":"isdir?-1,filesize"}
	]
