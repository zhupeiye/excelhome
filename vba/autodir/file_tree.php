<!DOCTYPE html>
<html>
<head>
<title>mybookmark上传文件</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">

<style>
.hidden{display:none;}
</style>
</head>
<body>
<?php 
error_reporting(E_ERROR|E_PARSE);
//header("Content-type: text/html; charset=utf-8");
/********************** 
一个简单的目录递归函数 
第一种实现办法：用dir返回对象 
***********************/ 
function tree($directory) 
{ 
	$mydir=dir($directory); 
	echo "<ul>\n"; 
	while($file=$mydir->read()){ 
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
	{
			echo "<li onclick=\"opentree(this)\"><font color=\"#ff00cc\"><b>$file</b></font></li>\n"; 


			tree("$directory/$file"); 
		}//if 
		else 
		{
			if(($file!=".") AND ($file!="..")){
				$href=str_replace(dirname(__FILE__),"",$directory);
$href=$href==""?"":$href."/";
$href=ltrim($href,"/");

				echo "<li><a href=\"${href}${file}\">".$file.'</a></li>';

			}
?>




<?php

//			echo "</li>";
		}// if file
	} //while
	echo "</ul>\n"; 

	$mydir->close(); 
} //funcion
//开始运行 
echo "<h2>目录为粉红色</h2>"; 
//tree("sdcard0"); 
//echo dirname(__FILE__);
tree(dirname(__FILE__));



?>
<script>
function opentree(myNode){

	ul=myNode.nextSibling.nextElementSibling;
	var sh=ul.classList.contains('hidden');
	if(sh){
		ul.classList.remove('hidden');
	
	}else{
	
		ul.classList.add('hidden');
	}
}

</script> 

</body>

</html>
