<?php


class View{

    public const LAYOUT_VIEW = 'layout.php';

    public $additionalData;

    public function __construct($additionalData = []){
        $this->additionalData = $additionalData;
    }

    public function getData($data){
        if(isset($data) && count($data))
            $this->additionalData = array_replace($this->additionalData, $data);

        return $this->additionalData;
    }

    function setView($view, $data = null){
        $data = $this->getData($data);
        include_once $_SERVER['DOCUMENT_ROOT'].'/App/Views/app/'.self::LAYOUT_VIEW;
    }

}