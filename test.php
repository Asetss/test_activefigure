<?php 

class JsonParse {
	
    private $min;
    private $type;

    function __construct($min,$type) {
        $this->min = $min;
        $this->type = $type;
    }

    function scoreUnset($arr) {
	    if($arr['score'] <= $this->min) {
          if($arr['type'] === $this->type){
            return false;
          }
	    }
	    return true;
    }
}

$file = file_get_contents('data.json');
$json_data = json_decode($file, true);

$score_min = min(array_column($json_data, 'score'));

$score = array_filter($json_data, array(new JsonParse($score_min,'yyy'), 'scoreUnset'));

var_dump(json_encode($score));
var_dump($score);

?>