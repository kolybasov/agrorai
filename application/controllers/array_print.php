<?php
	class Array_print extends CI_Controller {
		public function index()
		{
			$this->load->library('session');

			echo $this->session->flashdata('captcha');
		}
	}