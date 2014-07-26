<?php 
class FormBehavior extends ModelBehavior { 
	protected $Model;
	protected $data = array();
	protected $pagination = array();

	
	public function action(Model &$Model, $data = array(), $pagination = array()) {
		// pr($data);
		// exit;
		$this->Model = $Model;
		$this->data = $data;
		$this->pagination = $pagination;
		$this->pagination = array_merge($pagination, $data['Pagination']);

		if(!empty($data['Filter']['type']['0']))
			$this->__search();

		if(!empty($data['action']) && !empty($this->data['row']))
			$this->$data['action']();

		return $this->data;
	}

	public function pagination(Model &$Model) {
		return $this->pagination;
	}

	private function __edit( ) { 
		$return = '';
		return $return;
	}
	
	private function __search(){
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
// 'LIKE'       => 'contenha',
// 'NOT LIKE'   => 'não contenha',
// 'LIKE BEGIN' => 'começando com',
// 'LIKE END'   => 'terminando com',
// '='  => 'igual',
// '!=' => 'diferente',
// '>'  => 'maior do que',
// '>=' => 'maior ou igual a',
// '<'  => 'menor que',
// '<=' => 'menor ou igual a'

			}

			if($i > 0){
				$this->data['Filter']['type'][$i] = $this->data['Filter']['type'][$i-1];
				$this->data['Filter']['filter'][$i] = $this->data['Filter']['filter'][$i-1];				
				$this->data['Filter']['conditions'][$i] = $this->data['Filter']['conditions'][$i-1];				
			}
		}
		// pr($this->data);
		// pr($this->pagination); exit;
	}

	public function __chart( )
	{
		$grafico = '  
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
        {
        title:{
          text: "Histórico pesagem de leite"
        },     
        axisY:{ 
          title: "Pesagem leite",
          includeZero: false                    
        },
        axisX: {
          title: "",
          interval: 1
        },
        toolTip: {
          shared: true,
          content: function(e){
            var body = new String;
            var head ;
            for (var i = 0; i < e.entries.length; i++){
              var  str = "<span style= \'color:"+e.entries[i].dataSeries.color + "\'> " + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong>\'\' <br/>" ; 
              body = body.concat(str);
          }
          head = "<span style = \'color:DodgerBlue; \'><strong>"+ (e.entries[0].dataPoint.label) + "</strong></span><br/>";

          return (head.concat(body));
        }
  },
  legend: {
        horizontalAlign :"center"
  },
  data: [
  ';
  	foreach ($this->data['row'] as $value => $conditions) {
  		$return = ($conditions) ? $conditions : false;
		if ($conditions) {
			
			$pesagens = $this->Model->pesagens($value);

			$grafico .= "{
				type: \"spline\",
				showInLegend: true,
				name: \"Bovino: $value\",
				dataPoints: [";
				foreach ($pesagens as $key => $pesagem) {
					$data = date('d/m', strtotime($pesagem['Leitepesagen']['data']));
					$peso = $pesagem['Leitepesagen']['peso'];
					$grafico .="{ label: '".$data."', y: ".$peso." },";
				}
			$grafico .= '
				]
			},';
		}
	}
	return $return;

  $grafico .='
  ],
  legend :{
      cursor:"pointer",
      itemclick : function(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
      }
      else{
          e.dataSeries.visible = true;
      }
      chart.render();
  }
}

});

  chart.render();
}
</script>

<div id="chartContainer" style="height: 300px; width: 100%;">
</div>';

		$this->data['grafico'] = $grafico;
		// pr($this->data); 
		// exit;
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
