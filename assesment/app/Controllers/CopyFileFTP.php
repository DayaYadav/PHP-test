<?php
namespace App\Controllers;
require 'App\Controllers\ftp.php';
class CopyFileFTP extends BaseController
{
    public function index()
    {
        set_time_limit(0);



        // $ftp = new ftp();
// $ftp->conn('host', 'username', 'password');
// $ftp->get('download/demo', '/demo'); // download live "/demo" folder to local "download/demo"

// $ftp->put('/demo/test', 'upload/vjtest'); // upload local "upload/vjtest" to live "/demo/test"

// $arr = $ftp->getLogData();
// if ($arr['error'] != "")
//     echo '<h2>Error:</h2>' . implode('<br />', $arr['error']);
// if ($arr['ok'] != "")
//     echo '<h2>Success:</h2>' . implode('<br />', $arr['ok']);
//     }
    }
}
?>