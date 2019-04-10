<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function index () {
	    $vars = array();
	    $vars['page_name'] = 'dashboard';
	    $this->loadview('index', $vars);
	}

}