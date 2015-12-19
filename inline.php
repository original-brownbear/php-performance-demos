<?php

define('PHP_PERFORMANCE_DEMO_RUNCOUNT', 100000000);

function maybe_inline(){

	return 'a' . 'b';
}

function maybe_inline_use_vars(){
	$a = 'a';
	$b = 'b';

	return $a . $b;
}

$start = microtime(true);
for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
	maybe_inline_use_vars();
}
$end = microtime(true);
echo "\nIt took " . ( $end - $start ) . "s without inlining and with redundant local variables\n"; 

$start = microtime(true);
for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
	maybe_inline();
}
$end = microtime(true);
echo "\nIt took " . ( $end - $start ) . "s without inlining\n"; 

$start = microtime(true);
for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
	'a' . 'b';
}
$end = microtime(true);
echo "\nIt took " . ( $end - $start ) . "s with inlining\n"; 
