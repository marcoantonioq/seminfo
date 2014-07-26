<?php 
App::uses('AppHelper', 'View/Helper'); 
class DateHelper extends AppHelper {
	public $helpers = array('Html', 'Form');

	public function datetime($datetime = "", $format = "Y/m/d H:m")
	{
		if(empty($datetime))
		{
			return date($format);
		}
		else
		{
			return date($format, strtotime($datetime));

		}
	}

	public function date($date=null, $format = "Y/m/d")
	{
		if(empty($date))
		{
			return date($format);
		}
		else
		{
			return date($format, strtotime($date));

		}
	}

	public function datetime_local($date=null, $format = "Y/m/d\TH:m")
	{
		if(empty($date))
		{
			return date('Y-m-d\TH:00:00');
		}
		else
		{
			return date('Y-m-d\TH:m:00', strtotime($date));

		}
	}
} 
?>