<?php

class Controller{

    public $view;
    protected $sharedVaritables = [];

    function __construct(){
        $this->view = new View($this->sharedVaritables);
    }

    function index(){
    }

}