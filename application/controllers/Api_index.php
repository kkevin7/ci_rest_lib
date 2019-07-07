<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_index extends CI_Controller {
	function __construct()
    {
        //LLamada a los metodos de la clae padre
        parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('api');
	}
}
