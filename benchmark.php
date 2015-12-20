<?php

define('PHP_PERFORMANCE_DEMO_RUNCOUNT', 10000000);
define('PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL', 100000);

function benchmark_case($case, $text){
	$start = microtime(true);
	call_user_func($case);
	printf($text, microtime(true) - $start);
}

