<?php


class HomeController extends Controller{

    /*
     * Home page
     */
    public function index( $params = [] ){
        $this->view->setView('home.php', [
            'title' => 'Задачник'
        ]);
    }

}