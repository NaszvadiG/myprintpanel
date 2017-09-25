<?php

	function get_current_datetime()
	{
		return date('Y-m-d H:i:s');
	}

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
	
	function frontend_load_styles()
	{
		$link = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"/>';
		
		$styles = array
		(
			'stack-interface'			=>	'css/stack-interface',
			'theme'			=>	'css/theme',
			'custom'			=>	'css/custom',
			'socicon'			=>	'css/socicon',
			'flickity'			=>	'css/flickity',
			'flickity'			=>	'css/iconsmind'
		);
		
		foreach($styles as $file=>$path)
		{
			$link .= '<link rel="stylesheet" type="text/css" href="' . base_url() . 'public/' . $path . '.css"/>';
		}
		
		return $link;
	}
	
	function frontend_load_scripts()
	{
		$script = '';
		
		$scripts = array
		(
			'flickity'			=>	'js/flickity.pkgd.min',
			'scripts'			=>	'js/scripts'
		);
		
		foreach($scripts as $file=>$path)
		{
			$script .= '<script type="text/javascript" src="' . base_url() . 'public/' . $path . '.js"></script>';
		}
		
		return $script;
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
