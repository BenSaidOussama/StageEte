<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

    private $id;
    private $LPAR_prefix;
    private $Server_description;
    private $Server_name;
    private $Server_type;
    private $Server_LPARs_nbr;

    public function getId(){
        return $this->id;
    }
    public function getServer_LPARs_nbr(){
        return $this->Server_LPARs_nbr;
    }
    public function getLPAR_prefix(){
        return $this->LPAR_prefix;
    }
   
    public function getServer_description(){
        return $this->Server_description;
    }
    public function getServer_name(){
        return $this->Server_name;
    }
    public function getServer_type(){
        return $this->Server_type;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function setLPAR_prefix($LPAR_prefix){
        $this->LPAR_prefix=$LPAR_prefix;
    }
    public function setServer_LPARs_nbr($Server_LPARs_nbr){
        $this->Server_LPARs_nbr=$Server_LPARs_nbr;
    }
    
    
    public function setServer_description($Server_description){
        $this->Server_description=$Server_description;
    }
    public function setServer_name($Server_name){
        $this->Server_name=$Server_name;
    }
    public function setServer_type($Server_type){
        $this->Server_type=$Server_type;
    }
    public function Clients(){
        return $this->hasMany('\app\Client');
    }
    public function LPARs(){
        return $this->belongsTo('\app\LPAR');
    }
    public function VSwitchs(){
        return $this->belongsTo('\app\VSwitch');
    }
}
