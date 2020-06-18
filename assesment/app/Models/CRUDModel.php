<?php
namespace App\Models;

use CodeIgniter\Model;

class CRUDModel extends Model
 {
    protected $table = 'route_table';

    public function getRoute( $slug = false )
 {
       
            return $this->findAll();
        

        return $this->asArray()
       
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

    public function drawcircle()
 {
        $canvas     = imagecreate( 200, 100 );
        $grey       = imagecolorallocate( $canvas, 230, 230, 230 );
        $black      = imagecolorallocate( $canvas, 0, 0, 0 );
        imagesetpixel( $canvas, 120, 60, $black );

        header( 'Content-type: image/png' );
        imagepng( $canvas );
        imagedestroy( $canvas );

    }

    /**
    * API select data
    *
    */

    

    public function selectApi()
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'news' );
        $query   = $builder->get();
        // Select all records from table
        $sql = $builder->getCompiledSelect();

    }

    /**
    * API update data
    *
    */

    public function updateApi( $id )
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'route_table' );

        $data = [
            'Hostname' => 'HP-> '.$id,

        ];

        $builder->where( 'id', $id );
        $query = $builder->update( $data );
        // var_dump( $builder );
        echo '<br>'.$db->getLastQuery();
        return $query;

    }

    /**
    * API delete data
    *
    */

    public function deleteApi( $id )
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'route_table' );

        $builder->where( 'id', $id );
        $query = $builder->delete();
        //var_dump( $builder );
        echo '<br>'.$db->getLastQuery();
        return $query;

    }
    

    /**
    * API Insert data
    *
    */

    public function insertApi($hostname,$sapid,$loopback,$macaddress)
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'route_table' );
        $data = [
            'Hostname' => $hostname,
            'SapId'=>$sapid,
            'Loopback'=>$loopback,
            'macAddress'=>$macaddress
        ];

        $query = $builder->insert( $data );
        echo 'Insert ID===>'.$db->insertID();
        echo '<br>'.$db->getLastQuery();
        //  var_dump( $builder );
        //INSERT INTO 'news' ( 'title', 'body' ) VALUES ( 'ITS Test', 'This is my test record' )
        // $sql = 'SELECT * FROM news';
        // $sql = "Insert into 'news' ('title') values('sdfdgd')";
        // $db->query( $sql );
        echo $db->affectedRows();

    }

    /**
    * API Limit data
    *
    */

    public function limitApi()
 {
        $db = \Config\Database::connect();
        $builder = $db->table( 'news' );

        $query = $builder->limit( 2, 5 )->get();

         echo '<br>'.$db->getLastQuery();
         
//         foreach ( $query->getResult() as $row )
//  {
//             echo $row->title.'=======';
//             echo $row->body;
//             echo '<br>';
//         }

    }
}
?>