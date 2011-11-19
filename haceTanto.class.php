class haceTanto extends DateTime {
 
    protected $strings = array(
        'y' => array('1 a&ntilde;o', '%d a&ntilde;os'),
        'm' => array('1 mes', '%d meses'),
        'd' => array('1 d&iacute;a', '%d dias'),
        'h' => array('1 hora', '%d horas'),
        'i' => array('1 min', '%d minutos'),
        's' => array('segundos', '%d segundos'),
    );
 
    public $profundidad;
 
    public function __construct( $fecha,$profundidad='i')
    {
        parent::__construct( $fecha );
        $this->profundidad = $profundidad;
 
    }
 
 
    public function __toString() {
	     try 
	    {  
	     	$now = new DateTime('now');
	        $diff = $this->diff($now);
 
	        foreach($this->strings as $key => $value){
 
	            if( ($text .= ' '.$this->getDiffText($key, $diff)) ){
 
	            }
	            if($this->profundidad == $key) break;
	        }
	        return $text;   
	    } 
	    catch(Exception $e) 
	    {  
	        trigger_error($e->getMessage(), E_USER_ERROR);  
	        return '';  
	    }  
 
 
    }
 
     protected function getDiffText($intervalKey, $diff){
        $pluralKey = 1;
        $value = $diff->$intervalKey;
        if($value > 0){
            if($value < 2){
                $pluralKey = 0;
            }
            return sprintf($this->strings[$intervalKey][$pluralKey], $value);
        }
        return null;
    }
}
?>
