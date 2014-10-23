<?php
 //filename: server.php
 $path = $_GET["path"];
 echo $path;
 $dir = dir(@$path );
 echo "<ul>";
 
 set_time_limit(1800) ;
 
while( $file = $dir->read() )
{
	echo "<li>";
  //echo $dir ;
  $file = $path . $file;
  if(! is_dir($file)) {
  	echo "FIL ";
  	echo $file . "\n";
  	
  	// 1m
		//if(filesize($file) < 1000000) {
  		//echo "(" . md5_file( $file) . ")";
    //}
    echo "(" . md5_file( $file) . ")";
	} else {
		echo "DIR ";
  	echo $file . "\n";
		echo $file . " is dir";
	}
}
?>