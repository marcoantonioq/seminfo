<?php 

App::uses('Folder', 'Utility');
//App::uses('File', 'Utility');

class UploadBehavior extends ModelBehavior {
	// caminho a ser salvo: /files/pasta/field_dir
	// O noma da figura fica salvo em: field
	public $defaults = array(
		'dir' => null,
		'config' => null,
		/*
		'config' => array(
			'pasta'=>array(
				'field'=>'title',
				'field_dir'=>'caminho'
			)
		),
		*/
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

	public function setup(Model $model, $config = array()) {
		$this->defaults['config'] = $config;
		//pr($this->defaults['config']);
		//exit;
	}

	public function afterDelete(Model $model) {
		
		/*foreach ($this->settings[$model->alias] as $field => $options) {
			if ($options['deleteFolderOnDelete'] == true) {
				$this->deleteFolder($model, $options['path']);
				return true;
			}
		}
		return $result;*/
		return true;
	}

	public function beforeSave(Model $model, $config = array()){
		//pr($model->data);
		foreach ($this->defaults['config'] as $folder => $config) 
		{
			//pr($model->data[$model->name][$config['field']]); exit;
			if( !empty($model->data[$model->name][$config['field']]['name']) )
	    	{
				extract($model->data[$model->name][$config['field']]);
				if ($error == 0) 
				{
					if (array_search($type, $this->_imagetypes) === false) 
					{
						return 'O tipo de arquivo enviado é inválido!';
					} 
					else if ($size > $this->defaults['tamanho']) 
					{
						return 'O tamanho do arquivo enviado é maior que o limite!';
					} 
					else 
					{
						new Folder("files/{$model->name}", true, $this->defaults['mode']); 
						new Folder("files/{$model->name}/{$folder}", true, $this->defaults['mode']); 

						$nome = $model->data[$model->name][$model->primaryKey].'.'.pathinfo($name, PATHINFO_EXTENSION);
						$upload = move_uploaded_file($tmp_name, WWW_ROOT.'files'.DS.$model->name.DS.$folder.DS.$nome);
						//echo WWW_ROOT.'files'.DS.$model->name.DS.$folder.DS.$nome; exit;
						
						if ($upload == true) 
						{
							$model->data[$model->name][$config['field']] = $model->data[$model->name][$config['field']]['name'];
							$model->data[$model->name][$config['field_dir']] = DS.'files'.DS.$model->name.DS.$folder.DS.$nome;
						}
					}
				}
				else 
				{
					return 'Ocorreu algum erro com o upload, por favor tente novamente!';
				}
	    	}
	    	else
	    	{	    		
	    		if ( is_array( $model->data[$model->name][$config['field']] ) ) 
	    		{
	    			unset($model->data[$model->name][$config['field']]);
	    		}
	    	}
		}
		return true;
    }

}