class Lambda{
	private $predicate;
	private $params;
	private $body;
	private $params_str_args;
	
	public function __construct($predicate){
		$this->predicate = $predicate;
		$this->parse_predicate();
	}
	
	public static function _($predicate){
		return new Lambda($predicate);
	}
	
	public function __invoke(...$args){
		
		array_walk($args, function(&$value, $key) { if(is_string($value)) $value = "\"".$value."\""; });
		$args = (count($args)>0) ? (count($args)>1) ? implode(", ", $args) : $args[0] :"";
		
		return eval("return ($this)($args);");
	}
	
	public function __toString(){
		return "function($this->params_str_args){ $this->verb $this->body; }";
	}
	
	private function parse_predicate(){
		preg_match('/((\w+)(\s?,\s?(\w+))*)\s?->\s?(.+)/', $this->predicate, $matches);
		
		//TODO: mover a estructura params despues
		$params = $params_raw = explode(" ", preg_replace('/,\s?/', ' ', $matches[1]));
		$params_count = count($params);
		
		array_walk($params, function(&$value, $key) { $value = '$'.$value; });
		
		$params_str_args = implode(", ", $params);
		
		$body = $body_raw = $matches[5];
		foreach($params_raw as $p)
			$body = str_replace($p, "$".$p, $body);
		
		$verb = (substr($body, 0, 4) == "echo")? "" : "return";
		
		$this->params = $params;
		$this->body = $body;
		$this->params_str_args = $params_str_args;
		$this->verb = $verb;
	}
}

function map($lambda, $array){
	$array_copy = $array;
	foreach($array_copy as &$element)
		$element = $lambda($element);
	return $array_copy;
}

function times($lambda, $times, $value){
	$result = $value;
	for($i=0;$i<$times;$i++){
		$result = $lambda($result);
	}
	return $result;
}
