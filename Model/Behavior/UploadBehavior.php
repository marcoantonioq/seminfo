<?php 

App::uses('Folder', 'Utility');
//App::uses('File', 'Utility');

class UploadBehavior extends ModelBehavior {
	// caminho a ser salvo: /files/pasta/field_dir
	// O noma da figura fica salvo em: field
	public $defaults = array(
		'dir' => null,
		'config' => null,
		
		'config' => array(
			'pasta'=>array(
				'field'=>'title',
				'field_dir'=>'caminho'
			)
		),
		
		'tamanho' => 1048576,
		'deleteFolderOnDelete' => false,
		'mode' => 0777,
	);

	protected $_imagetypes = array(
		'image/bmp',
		'image/gif',
		'image/jpeg',
		'image/pjpeg',
		'image/png',
		'image/vnd.microsoft.icon',
		'image/x-icon',
	);

	public function setup(Model $Model, $config = array()) {
		$this->defaults['config'] = $config;
		//pr($this->defaults['config']);
		//exit;
	}

	public function afterDelete(Model $Model) {
		
		/*foreach ($this->settings[$Model->alias] as $field => $options) {
			if ($options['deleteFolderOnDelete'] == true) {
				$this->deleteFolder($Model, $options['path']);
				return true;
			}
		}
		return $result;*/
		return true;
	}

	public function beforeSave(Model $Model, $option = array()){

		foreach ($this->defaults['config'] as $folder => $config) 
		{
				
			if( !empty($Model->data[$Model->name][$config['field']]['name']) )
	    	{

				extract($Model->data[$Model->name][$config['field']]);
					// [name] => Captura de tela de 2014-08-09 20:07:12.png
					// [type] => image/png
					// [tmp_name] => /opt/lampp/temp/phpMTbbRg
					// [error] => 0
					// [size] => 124793


				if ($error == 0) 
				{
					if (array_search($type, $this->_imagetypes) === false) {
						return 'O tipo de arquivo enviado é inválido!';
					} 
					else if ($size > $this->defaults['tamanho']) {
						return 'O tamanho do arquivo enviado é maior que o limite!';
					} 
					else {
						new Folder("files/{$Model->name}", true, $this->defaults['mode']); 
						new Folder("files/{$Model->name}/{$folder}", true, $this->defaults['mode']); 

						$Model->data['tmp'][$folder]['field'] = $config['field'];
						$Model->data['tmp'][$folder]['field_dir'] = $config['field_dir'];
						$Model->data['tmp'][$folder]['extencion'] = pathinfo($name, PATHINFO_EXTENSION);
						$Model->data['tmp'][$folder]['path_dir'] = "/files/{$Model->name}/{$folder}/";
						$Model->data['tmp'][$folder]['path_file'] = WWW_ROOT."files/{$Model->name}/{$folder}/".date("YmdHmi");

						// movendo arquivo tmp
						$upload = move_uploaded_file($tmp_name, $Model->data['tmp'][$folder]['path_file']);
						if ($upload == true) 
						{
							$Model->data[$Model->name][$config['field']] = $name;
							$Model->data[$Model->name][$config['field_dir']] = $Model->data['tmp'][$folder]['path_file'];
							// unset($Model->data['tmp']);
						}
					}
				}
				else {
					return 'Ocorreu algum erro com o upload, por favor tente novamente!';
				}
	    	}
	    	else {
	    		if ( is_array( $Model->data[$Model->name][$config['field']] ) ) {
	    			unset($Model->data[$Model->name][$config['field']]);
	    		}
	    	}
		}
		return true;
    }

    public function afterSave(Model $Model, $created, $options = array()){    	
    	if(!empty($Model->data['tmp'])){
    		foreach ($Model->data['tmp'] as $folder => $tmp) {
		    	
		    	$origem = $tmp['path_file'];
		    	echo $destino = $tmp['path_dir'].$Model->data[$Model->name][$Model->primaryKey].'.'.$tmp['extencion'];
		    	
		    	$Model->data[$Model->name][$tmp['field_dir']] = $destino;

		    	copy($origem, WWW_ROOT.$destino);
				unlink($origem);

    		}
    	}
		unset($Model->data['tmp']);
		// pr($Model->data); exit;
    }



}