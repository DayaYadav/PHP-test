<?php namespace App\Controllers;

/**Controller file use to display trinangle by using canvas
 * @date:18-06-2020
*/

class HTMLController extends BaseController
{
    public function index()
    {
      
       return view('canvas_view'); 
    }
}

?>