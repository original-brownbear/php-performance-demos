<?php

require __DIR__ . '/benchmark.php';

function generate_initial_array(){

	return range(1, 150);
}

function use_for_loop(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL; $i++){
		$arr = generate_initial_array();
		$length = count($arr);
		for($j=0; $j < $length; $j++){
			$arr[$j] = $arr[$j] * 2;
		}
	}
}

function use_while_loop(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL; $i++){
		$arr = generate_initial_array();
		$length = count($arr);
		$j = 0;
		while($j < $length){
			$arr[$j] = $arr[$j] * 2;
			$j++;
		}
	}
}

function use_foreach_loop(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL; $i++){
		$arr = generate_initial_array();
		foreach($arr as $j => $val) {
			$arr[$j] = $val * 2;
		}
	}
}

function use_foreach_loop_ref(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL; $i++){
		$arr = generate_initial_array();
		foreach($arr as &$val) {
			$val = $val * 2;
		}
	}
}

function use_array_map(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT_SMALL; $i++){
		$arr = generate_initial_array();
		$arr = array_map('times_two', $arr);
	}
}

function times_two(&$i){

	$i = $i * 2;
}

foreach(
	array(
		'use_for_loop' => "\nIt took %s s using for" ,
		'use_while_loop' => "\nIt took %s s using while",
		'use_foreach_loop' => "\nIt took %s s using foreach",
		'use_foreach_loop_ref' => "\nIt took %s s using foreach with references",
		'use_array_map' => "\nIt took %s s using array_map\n",
	) as $case => $text){
	benchmark_case($case, $text);
}	
