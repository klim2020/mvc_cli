<?php

require_once 'App/core/model.php';

class tableFormatModel{    
    /**
     * getHeaderString
     *  creates header string from array  of keys
     * @param  mixed $out array with keys
     * @param  mixed $separator separator between lines
     * @param  mixed $topline - top line symbol
     * @param  mixed $bottomline - bottom line symbol
     * @return string returns formed header string
     */
    function getHeaderString($out,$separator = '|',$topline = '=', $bottomline = '-'){
        //$out = $this->getAllSubArrayKeys($data);

        //ksort($out['fields']);

        $header = "";
        foreach ($out['fields'] as $k=>$v){
            $header .= $separator.str_pad($k,$v['width']," ",STR_PAD_LEFT);
        }
        $header .= $separator;
        //top line
        $topline = str_pad("",strlen($header),$topline)."\n";
        $bottomline = str_pad("",strlen($header), $bottomline)."\n";
        return $topline.
                $header."\n".
                $bottomline;

    }    
    /**
     * getLength
     * get a row length  of a string
     * @param  mixed $header
     * @return int row length
     */
    function getLength($header){
        $arr = explode("\n", $header);
        return strlen($arr[0]);
    }
    
    /**
     * getTableName
     *  gets a caption string for a table
     * @param  mixed $text
     * @param  mixed $header
     * @return string formed caption string
     */
    public function getTableName($text,$header){
        $len = $this->getLength($header);
        return str_pad($text,$len," ",STR_PAD_BOTH)."\n";

    }    
    /**
     * getBody
     *  retrieves string with body
     * @param  mixed $header
     * @param  mixed $data
     * @param  mixed $sep
     * @return string formed body string
     */
    function getBody($header,$data,$sep = '|'){
        try {
            $out = "";
            foreach ($data as $val) {
                foreach ($header['fields'] as $k=>$v) {
                    if (array_key_exists($k, $val)) {
                        $out.= $sep.str_pad($val[$k], $v['width'], " ", STR_PAD_LEFT);
                    } else {
                        $out.= $sep.str_pad("", $v['width'], " ", STR_PAD_LEFT);
                    }
                }
                $out.= $sep."\n";
            }
        }
        catch(Exception $e){
            
        }
        return $out;
        }    
    /**
     * getAllSubArrayKeys
     * get array of all Keys from all subarrays and sorts it in an alphabetical order
     * @param  mixed $array
     * @return string array of all Keys from all subarrays
     */
    public function getAllSubArrayKeys($array){
        $resultarray["fields"] =  array();
        $resultarray["size"] = 0;
        
            array_map(function ($val) use (&$resultarray){
                foreach($val as $k => $v){
                    try{
                        if (!array_key_exists($k,$resultarray["fields"])){
                            $resultarray["fields"][$k] = array('width'=>max(strlen($v),strlen($k) ) );
                            $resultarray["size"] += strlen($v);
                        }else  {
                            if ($resultarray["fields"][$k]['width']<strlen($v)){
                                $resultarray["fields"][$k]['width'] = strlen($v);
                                $resultarray["size"]-=$resultarray["fields"][$k]['width'];
                                $resultarray["size"]+=strlen($v);

                            }
                        }
                    }catch(Exception $ex){}
                }
            },$array);

        
        ksort($resultarray['fields']);
       
        return $resultarray;

    }
}