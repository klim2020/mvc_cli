<?php
require "App/core/controller.php";
require "App/models/dataConnector.php";
require "App/models/tableFormatModel.php";

class GOTController extends Controller{
    //instance for a connectionModel
    private $dataConnectorModel;
    //instance for a tableFormatModel
    private $tableFormatModel;
    

    function __construct()
    {
        //init model for handling datasource
        $this->dataConnectorModel = new DataConnector();
        //init model for handling and formatting table data from datasource
        $this->tableFormatModel = new tableFormatModel();
        parent::__construct();
    }

//main entry for a controller
    function index($params=''){
        //retrieving data from source using connectionModel
        $data =  $this->dataConnectorModel->openConnection($params['source']);

        //get array of all keys from all subarrays in datasource array supplied above
        $arraywithheaders = $this->tableFormatModel->getAllSubArrayKeys($data);

        //retrieving table header for a table from array  with keys
        $results['header'] = $this->tableFormatModel->getHeaderString($arraywithheaders);

        //retrieving table body text
        $results['body'] = $this->tableFormatModel->GetBody($arraywithheaders,$data);

        //retrieving table caption string
        $results['tablename'] = $this->tableFormatModel->getTableName("Game Of Thrones House viewer",$results['header'] );
        
   
        //invoking View
        $this->renderView("GOTViewer",$results);
        
    }

}