<?php
namespace App\Models;

use CodeIgniter\Model;

class DatabaseModel extends Model
 {
    protected $table = 'news';

    public function getNews( $slug = false )
 {
        if ( $slug === false )
 {
            return $this->findAll();
        }

        return $this->asArray()
        ->where( ['slug' => $slug] )
        ->first();
    }

    public function db()
 {
        $db = \Config\Database::connect();
        // var_dump( $db );

        if ( $db )
 {
            echo 'Database conncted Successfully';
        } else {
            echo 'Failure';
        }
        // $query = $db->query( 'SELECT title FROM test' );

    }

    /**
    * API select data
    *
    */

    public function selectApi()
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );
        $query   = $builder->get();
        $sql = $builder->getCompiledSelect();
        echo $sql;
        echo '<br>';
        echo '<br>';
        
        // Select all records from table
        foreach ( $query->getResult() as $row )
 {
            echo $row->name.'=======';
            echo $row->IP;
            echo '<br>';
        }

    }

    /**
    * Select data from database by using LIMIT
    *
    */

    public function limitApi()
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );
        $query = $builder->get( 0, 2 );

        //  var_dump( $query );

        foreach ( $query->getResult() as $row )
 {
            echo $row->name.'=======';
            echo $row->IP;
            echo '<br>';
        }

    }

    /**
    * Function use to update data in database table
    *
    */

    public function updateApi()
 {

        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );
        
        $data = [
            'name' => 'rout100',

        ];

        $builder->where( 'IP', '1.0.0.2' );
        $sql = $builder->update( $data );

        echo $sql;
        echo '<br>';
        echo '<br>';


    }

    /**
    * Function use to fetch data on the basis of IP address
    *
    */

    public function whereApi()
 {

        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );

        $builder->where( 'IP', '2.0.2.2' );

        $query = $builder->get();
        foreach ( $query->getResult() as $row )
 {
            echo $row->name.'=======';
            echo $row->IP;
            echo '<br>';
        }

    }
    /**
    * Function use to delete data from database
    *
    */

    public function deleteApi()
 {

        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );

        $builder->where( 'IP', '1.0.0.2' );
        $builder->delete();
        $query = $builder->get();
        foreach ( $query->getResult() as $row )
 {
            echo $row->name.'=======';
            echo $row->IP;
            echo '<br>';
        }

    }

    /**
    * Function use to insert data from database
    *
    */

    public function insertApi()
 {

        $db = \Config\Database::connect();
        $builder = $db->table( 'router_table' );
        $data = [
            'name' => 'Route 202',
            'type'  => 'CSS',
            'description'  => 'My route',
            'IP'  => '2.0.2.2'
        ];

        $builder->insert( $data );

        $query = $builder->get();
        foreach ( $query->getResult() as $row )
 {
            echo $row->name.'=======';
            echo $row->IP;
            echo '<br>';
        }

    }

}
?>