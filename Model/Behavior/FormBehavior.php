<?php 
class FormBehavior extends ModelBehavior { 
	protected $Model;
	protected $data = array();
	protected $pagination = array();

	public function beforeFind(Model $model, $query = ""){
		// echo "beforeFind: ";
		// pr($query);
		// pr($model);
		//exit;
	}
	
	public function action(Model &$Model, $data = array(), $pagination = array()) {
		// pr($data);
		// exit;
		$this->Model = $Model;
		$this->data = $data;
		$this->pagination = $pagination;
		$this->pagination = array_merge($pagination, $data['Pagination']);

		return $this->data;
	}

	public function pagination(Model &$Model) {
		return $this->pagination;
	}
	
	private function search(){
		if (empty($this->data['Filter']['type']) || empty($this->data['Filter']['filter'][0])) 
			return null;

		// $this->pagination['recursive'] = 1;
		for ($i=4 ; $i >= 0; $i--) 
		{
			$type = $this->data['Filter']['type'][$i];
			$filter = $this->data['Filter']['filter'][$i];			
			$conditions = $this->data['Filter']['conditions'][$i];			

			if(!empty($type)){
				switch ($conditions) {
					case 'LIKE':
						$this->pagination['conditions']["$type LIKE"] = "%$filter%";
						break;
					case 'NOT LIKE':
						$this->pagination['conditions']["$type NOT LIKE"] = "%$filter%";
						break;
					case 'LIKE BEGIN':
						$this->pagination['conditions']["$type LIKE"] = "$filter%";
						break;
					case 'LIKE END':
						$this->pagination['conditions']["$type LIKE"] = "%$filter";
						break;
					case '!=':
						$this->pagination['conditions']["$type !="] = "$filter";
						break;
					case '>':
						$this->pagination['conditions']["$type >"] = "$filter";
						break;
					case '<':
						$this->pagination['conditions']["$type <"] = "$filter";
						break;
					case '<=':
						$this->pagination['conditions']["$type <="] = "$filter";
						break;
					case '>=':
						$this->pagination['conditions']["$type >="] = "$filter";
					case '=':
					default:
						$this->pagination['conditions']["$type"] = "$filter";
						break;
						break;
				}
			}

			if($i > 0){
				$this->data['Filter']['type'][$i] = $this->data['Filter']['type'][$i-1];
				$this->data['Filter']['filter'][$i] = $this->data['Filter']['filter'][$i-1];				
				$this->data['Filter']['conditions'][$i] = $this->data['Filter']['conditions'][$i-1];				
			}
		}
		return $this->pagination;
		// pr($this->data);
		// pr($this->pagination); exit;
	}

	private function __delete( ) { 
		$return = '';
		if(!empty($this->data['row']))
		{
			foreach ($this->data['row'] as $id => $value) { 
				if($value){
					$user = $this->Model->read(null,$id);
					if ($this->Model->delete($id)){
						$return .= '</br>'.
						$user[$this->Model->name][$this->Model->displayField].
						' excluido!';
					}else{
						echo $return .= '</br>'.
						$user[$this->Model->name][$this->Model->displayField].
						' não excluido!';
						
					}
				}
			}
		}
		return $return;
	}
}
