<?php
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

class Model{

    protected $table;
    public $qbf;

    public function __construct(){
        /*
        * New PDO connection
        */
        $dsn =  env('DB_CONNECTION').':host='.env('DB_HOST').';dbname='.env('DB_DATABASE').';port='.env('DB_PORT');
        $pdo = new PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));

        // Build Connection object with PdoBridge ad Adapter
        $conn = new Connection(new PdoBridge($pdo));

        // Pass this connection to Factory
        $this->qbf = new QueryBuilderFactory($conn);
    }

    public function toArray( $items ){

        if(count($items))
            foreach ($items as $key => $item)
                $items[$key] = (array)$item;



        return $items;
    }


}