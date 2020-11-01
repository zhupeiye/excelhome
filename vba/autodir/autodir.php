<?php
$rootdir='总目录';
@mkdir($rootdir,0777);
$str="（一）,组织领导（30分）,";
$str=file_get_contents('总目录.csv');
$patten='/（一）,(.*),/';
$patten='/（[一二三四五六七八九十]）,(.*),/u';
$patten='/[\(（][一二三四五六七八九十][）)],(.*),/u';
preg_match_all($patten,$str,$matches);
//print_r($matches);
@mkdir($rootdir.'/'.$matches[1][0],0777,true);

$patten='/\d+,(.*),/u';
preg_match_all($patten,$str,$matches);
//print_r($matches);
$patten='/[\(（]\d+[）)],(.*),/u';
preg_match_all($patten,$str,$matches);
//print_r($matches);

$str=trim($str);
$arr_lines=explode("\n",$str);
//print_r($arr_lines);
$first_dir="";
$second_dir="";
$third_dir="";
for($i=0;$i<sizeof($arr_lines);$i++){

$patten='/[\(（][一二三四五六七八九十][）)],(.*),/u';
$str=$arr_lines[$i];
	if(preg_match($patten,$str,$matches)){
		print_r($matches);
		$first_dir=$matches[0];

@mkdir($rootdir.'/'.$first_dir,0777,true);

$second_dir="";
$third_dir="";
	}

$patten='/\d+,(.*),/u';
	if(preg_match($patten,$str,$matches)){
		print_r($matches);
		$second_dir=$matches[0];

@mkdir($rootdir.'/'.$first_dir.'/'.$second_dir,0777,true);
//		die();
	}
	
$patten='/[\(（]\d+[）)],(.*),/u';
	if(preg_match($patten,$str,$matches)){
		print_r($matches);
		$third_dir=$matches[0];

//@mkdir($rootdir.'/'.$first_dir.'/'.$second_dir,0777,true);
                $filename=$rootdir.'/'.$first_dir.'/'.$second_dir.'/'.$third_dir.'.html';
		file_put_contents($filename,$third_dir);
//		die();
	}
}


