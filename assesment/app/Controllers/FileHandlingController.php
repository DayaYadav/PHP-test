<?php namespace App\Controllers;

/**Controller file use to handle File related operation Read/create/list
* Code to connect server
* Code for inode
* Calculate disk space
* @date:18-06-2020
*/
use App\Controllers\BaseController;
use App\Models\CrudModel;
$nameErr = '';

class FileHandlingController extends BaseController
 {
    /**Connect Server */

    public function index()
 {
        #!/usr/local/bin/php -q

        error_reporting( E_ALL );

        /* Allow the script to hang around waiting for connections. */
        set_time_limit( 0 );

        /* Turn on implicit output flushing so we see what we're getting
 * as it comes in. */
ob_implicit_flush();

$address = '192.168.1.53';
$port = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    /* Send instructions. */
    $msg = "\nWelcome to the PHP Test Server. \n" .
        "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";
    socket_write($msgsock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
        if (!$buf = trim($buf)) {
            continue;
        }
        if ($buf == 'quit') {
            break;
        }
        if ($buf == 'shutdown') {
            socket_close($msgsock);
            break 2;
        }
        $talkback = "PHP: You said '$buf'.\n";
        socket_write($msgsock, $talkback, strlen($talkback));
        echo "$buf\n";
    } while (true);
    socket_close($msgsock);
} while (true);

socket_close($sock);
    }
/**
 * Function to Read File and calculate disk space
 */
    public function readFiles()
 {
        echo ' ===  ===  === List of files ===  ===  == ';
        echo '<br>';
        echo '<br>';
        $dir = 'C:\wamp64';

        // Open a directory, and read its contents
        if ( is_dir( $dir ) ) {
            if ( $dh = opendir( $dir ) ) {
                while ( ( $file = readdir( $dh ) ) !== false ) {
                    echo 'filename:' . $file . '<br>';
                }
                closedir( $dh );
            }
        } else {
            echo ' Error ';
        }
        echo '<br>';
        echo ' ===  ===  === Disk space of files ===  ===  == ';
        echo '<br>';
        echo '<br>';
        // On Windows:
        $df_c = disk_free_space( 'C:' );
        $df_d = disk_free_space( 'D:' );
        echo $df_c.' ===  ===  ===  ===  ===  == '.$df_d;
    }

    public function SSHToServer()
 {
        include( 'Net/SSH2.php' );

        // $ssh = new Net_SSH2( 'www.domain.tld' );
        //Domain or IP
        if ( !$ssh->login( 'username', 'password' ) ) {
            exit( 'Login Failed' );
        }

        echo $ssh->exec( 'pwd' );
        echo $ssh->exec( 'ls -la' );
    }

    /** Inode Usage */

    public function inodeFunction()
 {
        echo fileinode( 'filename' );
    }

    /**
    * File create/zip download
    */

    public function createFile()
 {
     echo "File Create===\n";
        $myfile = fopen( 'newfile.txt', 'w' ) or die( 'Unable to open file!' );
        $txt = 'John Doe\n';
        fwrite( $myfile, $txt );
        $txt = 'Test Data\n';
        fwrite( $myfile, $txt );


        $myfile = fopen("newfile.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("newfile.txt"));

        fclose( $myfile );

        ////Zip File
//         $za = new ZipArchive();

// $za->open('test_with_comment.zip' );
        // print_r( $za );
        // var_dump( $za );
        // echo 'numFiles: ' . $za->numFiles . '\n';
        // echo 'status: ' . $za->status  . '\n';
        // echo 'statusSys: ' . $za->statusSys . '\n';
        // echo 'filename: ' . $za->filename . '\n';
        // echo 'comment: ' . $za->comment . '\n';

        // for ( $i = 0; $i<$za->numFiles; $i++ ) {
        //     echo "index: $i\n";
        //     print_r( $za->statIndex( $i ) );
        // }
        // echo 'numFile:' . $za->numFiles . '\n';
    }

}

?>