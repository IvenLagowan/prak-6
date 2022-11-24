<html>
<head>
<title>BUAT GALERY FOTO</title>
<link	rel="stylesheet"	type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />
<script	type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js">
</script>
 
<script	type="text/javascript"	src="lightbox/js/jquery.lightbox- 0.5.pack.js"> </script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="container">
<div id="gallery">
<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='gallery';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

while ($file = readdir($dir_handle))
{
if($file=='.' || $file == '..') continue;

$file_parts = explode('.',$file);
$ext = strtolower(array_pop($file_parts));

$title = implode('.',$file_parts);
$title = htmlspecialchars($title);
$nomargin=''; if(in_array($ext,$allowed_types))
{
if(($i+1)%4==0) $nomargin='nomargin';

echo '
<div	class="pic	'.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
<a	href="'.$directory.'/'.$file.'"	title="'.$title.'" target="_blank">'.$title.'</a>
</div>';

$i++;
}
}

closedir($dir_handle);
?>
<div class="clear"></div>
</div>
</div>
</body>
</html>
