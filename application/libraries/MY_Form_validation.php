<?php
/**
 * Created by PhpStorm.
 * User: Mykola
 * Date: 04.12.13
 * Time: 21:49
 */
class MY_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();

        $this->_error_prefix = '<div class="alert alert-danger" style="margin: 10px 0">';
        $this->_error_suffix = '</div>';
    }
}