<?php

	function global_load_styles()
	{
		$link = '';
		
		$styles = array
		(
			'perfect-scrollbar'			=>	'lib/perfect-scrollbar/css/perfect-scrollbar.min',
			'iconic-font'	=>	'lib/material-design-icons/css/material-design-iconic-font.min',
			'customer-portal'		=>	'css/style'
		);
		
		foreach($styles as $file=>$path)
		{
			$link .= '<link rel="stylesheet" type="text/css" href="' . base_url() . 'public/' . $path . '.css"/>';
		}
		
		return $link;
	}
	
	function global_load_scripts()
	{
		$script = '';
		
		$scripts = array
		(
			'jquery'			=>	'lib/jquery/jquery.min',
			'perfect-scrollbar'	=>	'lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min',
			'myprintpanel'		=>	'js/main',
			'bootstrap'			=>	'lib/bootstrap/dist/js/bootstrap.min',
			'parsley'			=>	'lib/parsley/parsley.min'
		);
		
		foreach($scripts as $file=>$path)
		{
			$script .= '<script type="text/javascript" src="' . base_url() . 'public/' . $path . '.js"></script>';
		}
		
		return $script;
	}
	
?>
