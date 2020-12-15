<?php

class View
{
	
	public function generate($template_view, $data = null)
	{
		//expo
		if ($data!=null){extract($data, EXTR_OVERWRITE);};
		include 'App/views/'.$template_view.".php";
	}
}