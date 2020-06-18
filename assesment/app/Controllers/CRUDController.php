<?php namespace App\Controllers;


/**Controller file use to handle CRUD operations
 * @date:18-06-2020
*/

use App\Controllers\BaseController;
use App\Models\CrudModel;
$nameErr = '';

class CRUDController extends BaseController
 {

/**Function to display list of the routers 
 * User navigate back to this function once he created new router
*/

    public function index( $value = '' )
 {
        $model = new CRUDModel();

        //  $data['news'] = $model->selectApi();
        $data = [
            'route'  => $model->getRoute(),

        ];
        echo view( 'header', $data );
        echo view( 'route_list', $data );
        echo view( 'footer', $data );

    }

    public function create( $val = '' )
 {
        $nameErr = '';
        //echo 'val==>'.$val;
        $model = new CrudModel();
        if ( $val = 'new' )
 {
            if ( empty( $_POST['hostname'] ) )
 {
                $hostNameError = 'Name is required';
            } else {

                $hostname = $_POST['hostname'];
                echo 'hostname ->'.$hostname;
            }
            if ( empty( $_POST['sapid'] ) )
 {
                $sapIdError = 'sapid is required';
            } else {

                $sapid = $_POST['sapid'];
                echo 'sapid ->'.$sapid;
            }
            if ( empty( $_POST['loopback'] ) )
 {
                $loopbackError = 'loopback is required';
            } else {

                $loopback = $_POST['loopback'];
                echo 'loopback ->'.$loopback;
            }
            if ( empty( $_POST['macaddress'] ) )
 {
                $macAddressErr = 'macaddress is required';
            } else {

                $macaddress = $_POST['macaddress'];
                echo 'macaddress ->'.$macaddress;
            }

            $model = new CrudModel();
            if ( !empty( $_POST['hostname'] ) && !empty( $_POST['sapid'] ) && !empty( $_POST['loopback'] )  && !empty( $_POST['macaddress'] ) )
            $model->insertApi( $hostname, $sapid, $loopback, $macaddress );

        }

        echo view( 'create_form' );
    }

    public function edit( $id )
 {
        //echo 'Edit Here->'.$id;
        $model = new CrudModel();

        $model->updateApi( $id );
    }

    public function delete( $id )
 {
        echo 'Delete Here->'.$id;
        $model = new CrudModel();

        $model->deleteApi( $id );
    }

    public function limitRecord()
 {

        $model = new CrudModel();

        $model->limitApi();
    }

    public function create_form()
 {

        if ( empty( $_POST['hostname'] ) )
 {
            echo 'error';
            $hostNameError = 'Name is required';
        } else {

            $hostname = $_POST['hostname'];
            echo 'hostname ->'.$hostname;
        }
        if ( empty( $_POST['sapid'] ) )
 {
            echo 'error';
            $sapIdError = 'sapid is required';
        } else {

            $sapid = $_POST['sapid'];
            echo 'sapid ->'.$sapid;
        }
        if ( empty( $_POST['loopback'] ) )
 {
            echo 'error';
            $loopbackError = 'loopback is required';
        } else {

            $loopback = $_POST['loopback'];
            echo 'loopback ->'.$loopback;
        }
        if ( empty( $_POST['macaddress'] ) )
 {
            echo 'error';
            $macAddressErr = 'macaddress is required';
        } else {

            $macaddress = $_POST['macaddress'];
            echo 'macaddress ->'.$macaddress;
        }

        $model = new CrudModel();

        $model->insertApi( $hostname, $sapid, $loopback, $macaddress );
    }

    public function filter()
 {
        echo 'Hello';
    }
}
?>