<?php
namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Model {    
    public function __construct() {
        global $config;        
        $c = new Capsule;
        $c->addConnection([
            'driver' => $config['driver'],
            'host' => $config['host'],
            'database' => $config['dbname'],
            'username' => $config['dbuser'],
            'password' => $config['dbpass'],
            'charset' =>  $config['charset'],
            'collation' => $config['collation'],
            'prefix' => $config['prefix']
        ]);
        $c->bootEloquent();
    }
}