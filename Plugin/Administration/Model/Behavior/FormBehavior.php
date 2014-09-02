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

	public function statusAjax(Model &$Model, $id, $column){

		$toggle = $Model->find("first", array(
			'recursive'=>-1, 
			'conditions'=>array(
				$Model->name.".id" => $id
			)
		));
		if(!empty($toggle[$Model->name])){
			if(!empty($toggle[$Model->name]['password']))
				unset($toggle[$Model->name]['password']);

			echo $toggle[$Model->name][$column] = ($toggle[$Model->name][$column]) ? 0 : 1;
			$Model->save($toggle);
			return $toggle[$Model->name][$column];			
		}
	}

	public function pagination(Model &$Model) {
		return $this->pagination;
	}
	
	private function search()
	{

		if(!empty($this->data['Filter'])){
			// pr($this->data);

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
