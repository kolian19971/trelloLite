<?php

class Controller{

    public $view;
    protected $sharedVaritables = [];
    public static $statusesArray = [
        'new' => 'Новая',
        'in_work' => 'В работе',
        'done' => 'Выполненная'
    ];

    function __construct(){
        session_start();

        if(isset($_SESSION['adminLogin'])){
            $admin = new Admins();
            $this->sharedVaritables['admin'] = $admin->getAdmin($_SESSION['adminLogin'], $_SESSION['adminPassword'], false);
        }

        $this->sharedVaritables['statusesArray'] = self::$statusesArray;


        $this->view = new View($this->sharedVaritables);
    }

    function index(){
    }

    public static function actionAuth( $admin ){
        session_start();
        $_SESSION['adminLogin'] = $admin->login;
        $_SESSION['adminPassword'] = $admin->password;
    }

    public static function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }


}