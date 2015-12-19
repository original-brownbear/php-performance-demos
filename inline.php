<?php

define('PHP_PERFORMANCE_DEMO_RUNCOUNT', 10000000);

class ConcaterRedundant{
	public function concat(){
		$a = 'a';
		$b = 'b';

		return $a . $b;
	}
}

class ConcaterNoRedundant{
	public function concat(){

		return 'a' . 'b';
	}
}

class ConcaterMethodParam{
	public function concat($a, $b){

		return $a . $b;
	}
}

class ConcaterConstructParamNotDeclared{

	public function __construct($a, $b){
		$this->a = $a;
		$this->b = $b;
	}

	public function concat(){

		return $this->a . $this->b;
	}
}

class ConcaterConstructParamDeclared{

	private $a;
	private $b;

	public function __construct($a, $b){
		$this->a = $a;
		$this->b = $b;
	}

	public function concat(){

		return $this->a . $this->b;
	}
}

class ConcaterConstructParamDeclaredProtected{

	protected $a;
	protected $b;

	public function __construct($a, $b){
		$this->a = $a;
		$this->b = $b;
	}

	public function concat(){

		return $this->a . $this->b;
	}
}

class ConcaterConstructParamDeclaredPublic{

	public $a;
	public $b;

	public function __construct($a, $b){
		$this->a = $a;
		$this->b = $b;
	}

	public function concat(){

		return $this->a . $this->b;
	}
}

function benchmark_case($case, $text){
	$start = microtime(true);
	call_user_func($case);
	printf($text, microtime(true) - $start);
}

function maybe_inline(){

	return 'a' . 'b';
}

function maybe_inline_use_vars(){
	$a = 'a';
	$b = 'b';

	return $a . $b;
}

function no_inline_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		maybe_inline_use_vars();
	}
}

function no_inline_no_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		maybe_inline();
	}
}

function inline_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$a = 'a';
		$b = 'b';
		$a . $b;
	}
}

function inline_no_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		'a' . 'b';
	}
}

function as_class_method_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterRedundant();
		$instance->concat();
	}
}

function as_class_method_no_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterNoRedundant();
		$instance->concat();
	}
}

function as_class_method_with_param_no_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterMethodParam();
		$instance->concat('a', 'b');
	}
}

function as_class_method_with_cparam_not_declared(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterConstructParamNotDeclared('a', 'b');
		$instance->concat();
	}
}

function as_class_method_with_cparam_declared(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterConstructParamDeclared('a', 'b');
		$instance->concat();
	}
}

function as_class_method_with_cparam_declared_protected(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterConstructParamDeclaredProtected('a', 'b');
		$instance->concat();
	}
}

function as_class_method_with_cparam_declared_public(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterConstructParamDeclaredPublic('a', 'b');
		$instance->concat();
	}
}

function as_class_method_with_param_redundant(){
	for($i=0; $i < PHP_PERFORMANCE_DEMO_RUNCOUNT; $i++){
		$instance = new ConcaterMethodParam();
		$a = 'a';
		$b = 'b';
		$instance->concat($a, $b);
	}
}

foreach(
	array(
		'no_inline_redundant' => "\nIt took %s s without inlining the function and with redundant local variables inside the function" ,
		'no_inline_no_redundant' => "\nIt took %s s without inlining the function and without redundant variables inside the function",
		'inline_redundant' => "\nIt took %s s with inlining the function and with redundant local variables",
		'inline_no_redundant' => "\nIt took %s s with inlining the function and without redundant local variables",
		'as_class_method_redundant' => "\nIt took %s s with using a class method and with redundant local variables",
		'as_class_method_no_redundant' => "\nIt took %s s with using a class method and without redundant local variables",
		'as_class_method_with_param_redundant' => "\nIt took %s s with using a class method with method parameters and with redundant input variables",
		'as_class_method_with_param_no_redundant' => "\nIt took %s s with using a class method with method parameters and without redundant input variables",
		'as_class_method_with_cparam_not_declared' => "\nIt took %s s with using a class method with constructor parameters and without property declarations",
		'as_class_method_with_cparam_declared' => "\nIt took %s s with using a class method with constructor parameters and with private property declarations",
		'as_class_method_with_cparam_declared_protected' => "\nIt took %s s with using a class method with constructor parameters and with protected property declarations",
		'as_class_method_with_cparam_declared_public' => "\nIt took %s s with using a class method with constructor parameters and with public property declarations\n",
	) as $case => $text){
	benchmark_case($case, $text);
}	
