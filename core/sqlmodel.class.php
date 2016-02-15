<?php
class SqlModel extends Model {

    public function __construct($data=array()){
        parent::__construct();

        if(!empty($data)){
            foreach($data as $key => $val){
                if(property_exists($this, $key)){
                    $this->{$key} = $val;
                }
            }
        }
    }
}