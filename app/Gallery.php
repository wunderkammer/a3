<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function __construct($jsonPath) {
        $artJson = file_get_contents($jsonPath);
        $this->art_objects = json_decode($artJson);
    }
    
    public function getArt($continent,$period,$objects, $caseSensitive = false) {
       
        $filteredArt = array();

        $index = 0; 
        for($i = 0; $i < count($this->art_objects->continents); ++$i) {
	    		if($this->art_objects->continents[$i]->name == $continent){
        		for($j = 0; $j < count($this->art_objects->continents[$i]->periods); ++$j){
                		if($this->art_objects->continents[$i]->periods[$j]->name == $period){
                        		for($k = 0; $k < count($this->art_objects->continents[$i]->periods[$j]->types); ++$k){
                            			if(in_array($this->art_objects->continents[$i]->periods[$j]->types[$k]->type,$objects)){
                                			for($l = 0; $l < count($this->art_objects->continents[$i]->periods[$j]->types[$k]->details); ++$l){
                                        			$filteredArt[$index]["file_name"] = $this->art_objects->continents[$i]->periods[$j]->types[$k]->details[$l]->file_name;
                                        			$filteredArt[$index]["description"] = $this->art_objects->continents[$i]->periods[$j]->types[$k]->details[$l]->description;
								$index += 1;
                                			}

                            			}
                        		}
                		}
        		}
    		}
  
	} 
	return $filteredArt;
    }
}
