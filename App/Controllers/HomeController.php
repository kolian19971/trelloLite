<?php


class HomeController extends Controller{

    /*
     * Home page
     */
    public function index( $params = [] ){

//        print_r($params);exit();
// /home/index/orderBy/id-desc

        $tasks = new Tasks();

        $this->view->setView('home.php', [
            'title' => 'Задачник',
            'tasks' => $tasks->getTasks()
        ]);
    }

    /*
     * Add new task
     */
    public function add(){
        $this->view->setView('task/add.php', [
            'title' => 'Добавить задачу'
        ]);
    }


    public function postAdd($params = []){

        $tasks = new Tasks();
        $tasks->create($params['post']);

        Controller::redirect('/');
    }


    /*
     * Auth
     */
    public function postAuth( $params = [] ){

        $admin = new Admins();
        $admin = $admin->getAdmin($params['post']['login'], $params['post']['password']);

        /*
         * If isset user auth
         */
        if(isset($admin))
            Controller::actionAuth($admin);

        Controller::redirect('/');
    }

    /*
     * Logout
     */
    public function logout( $params = [] ){
        session_destroy ();
        Controller::redirect('/');
    }


}