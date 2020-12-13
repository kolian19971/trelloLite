<?php


class Tasks extends Model{

    public const TASK_PER_PAGE = 3;

    protected $table = "tasks";


    public function getTasks(){

        $tasks = $this->qbf->from($this->table)->all();

        return $this->toArray($tasks);
    }


    public function create( $createArray ){
        return $this->qbf->from($this->table)->insert($createArray);
    }




}