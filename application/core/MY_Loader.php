<?php
/**
 * PHP Codeigniter Simplicity
 *
 * Copyright (C) 2013  John Skoumbourdis.
 *
 * GROCERY CRUD LICENSE
 *
 * Codeigniter Simplicity is released with dual licensing, using the GPL v3 and the MIT license.
 * You don't have to do anything special to choose one license or the other and you don't have to notify anyone which license you are using.
 * Please see the corresponding license file for details of these licenses.
 * You are free to use, modify and distribute this software, but all copyright information must remain.
 *
 * @package    	Codeigniter Simplicity
 * @copyright  	Copyright (c) 2013, John Skoumbourdis
 * @license    	https://github.com/scoumbourdis/grocery-crud/blob/master/license-grocery-crud.txt
 * @version    	0.6
 * @author     	John Skoumbourdis <scoumbourdisj@gmail.com>
 */
class MY_Loader extends CI_Loader {

	private $_javascript = array();
	private $_css = array();
	private $_inline_scripting = array("infile"=>"", "stripped"=>"", "unstripped"=>"");
	private $_sections = array();
	private $_cached_css = array();
	private $_cached_js = array();

	
	function __construct(){

		if(!defined('SPARKPATH'))
		{
			define('SPARKPATH', 'sparks/');
		}

		parent::__construct();
	}
	
	function template($template_name, $data = array(), $return = FALSE)
	{
		$data['accounts_navigation'] = $this->view('templates/accounts/navigation', NULL, TRUE);
		$data['navigation'] = 	$this->view('templates/header', NULL, TRUE);
		$data['footer'] 	= 	$this->view('templates/footer', NULL, TRUE);
		
		$this->load->view($template_name, $data);
	}
}