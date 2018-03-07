<?php 
$arr=array('a','b','c','d','e','f','g');//目标数组
$i_arr=array('1','2');//要插入的数组
$n=2;//插入的位置
array_splice($arr,$n,0,$i_arr);
print_r($arr);

 ?>