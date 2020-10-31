#!/usr/bin/php
<?php
//    var_dump($argv);
if(sizeof($argv)<2) die('please input file name');
file_put_contents('Plan_macro.txt',"\n=$argv[1]=============\n");
    $cmd="python ../oledump.py $argv[1]";
    echo exec($cmd,$arr_out);
    echo "\n";
    //var_dump($arr_out);
    for($i=0;$i<sizeof($arr_out);$i++){
	    echo $arr_out[$i];
	    echo "\n";
	    if(preg_match('~\s*(A?\d+): M ~',$arr_out[$i],$matches)){
	    echo $matches[1];
	    echo "\n==============\n";
	    
file_put_contents('Plan_macro.txt',"\n=$matches[1]=============\n",FILE_APPEND);
$cmd="python ../oledump.py $argv[1] -s $matches[1]  -vv >>Plan_macro.txt";
exec($cmd);
	    }

    }
    $cmd='cat Plan_macro.txt';
    exec($cmd,$arr_out);
    echo implode("\n",$arr_out);
?>
