<?php 
require_once 'App/core/model.php';
class DataConnector extends Model{    
    /**
     * OpenConnection
     * opens connection to database and returns array with data
     * @param  mixed $fname  phpfile with array $data
     * @return void
     */
    public function OpenConnection ($fname)
    {
        //echo $fname;
        require_once $fname;
        return $data;
    }
}