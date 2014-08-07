<?php 
class FormBehavior extends ModelBehavior { 
	protected $Model;
	protected $data = array();
	protected $pagination = array();

	public function action(Model &$Model, $data = array(), $pagination = array()) {
		$this->Model = $Model;
		$this->data = $data;
		$this->pagination = $pagination;
		return $this->search();
	}

	public function pagination(Model &$Model) {
		return $this->pagination;
	}
	
	private function search()
	{

		// pr($this->Model); exit;
		// pr($this->data); exit;

		if(!empty($this->data['Filter'])){

			foreach ($this->data['Filter'] as $column => $filter) {
				
				$conditions = $this->data['conditions'][$column];
				$this->pagination += $this->data['Pagination'];
				
				if (empty($filter))
					continue;

				if(empty($conditions))
					continue;

				switch ($conditions) {
					case 'LIKE':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column LIKE"] = "%$filter%";
						break;
					case 'NOT LIKE':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column NOT LIKE"] = "%$filter%";
						break;
					case 'LIKE BEGIN':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column LIKE"] = "$filter%";
						break;
					case 'LIKE END':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column LIKE"] = "%$filter";
						break;
					case '!=':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column !="] = "$filter";
						break;
					case '>':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column >"] = "$filter";
						break;
					case '<':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column <"] = "$filter";
						break;
					case '<=':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column <="] = "$filter";
						break;
					case '>=':
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column >="] = "$filter";
					case '=':
					default:
						$this->pagination['conditions']['OR']['AND']["{$this->Model->name}.$column"] = "$filter";
						break;
						break;
				}
			}
		}

		if (!empty($this->data['row'])) {
			foreach ($this->data['row'] as $id => $value) {
				if ($value)
					$this->pagination['conditions']['OR']['OR'][] = array("{$this->Model->name}.id"=>$id);
			}
		}
		// pr($this->data);
		// pr($this->pagination); // exit;
		return $this->pagination;
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
