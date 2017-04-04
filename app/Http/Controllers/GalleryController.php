<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Gallery;


class GalleryController extends Controller
{

    

    public function index(){
    $gallery = new \App\Gallery(database_path()."/art_data.json");

    $form = new \App\Form($_POST);

    $errors = false;
    $image_data = [];
    $continent = "";
    $period = "";
    $objects = "";

    if($form->isSubmitted()){
	$continent = $form->get('continent');
	$period = $form->get('century');
        $objects = $form->get('checkbox');	

	
        $fields = ['continent','century','checkbox'];

	foreach($fields as $field) {
  		if (empty($_POST[$field])) {
    			$errors = true;
  	        }
	}

        if($errors){
		$image_data = [];
	}else{
		$image_data = $gallery->getArt($continent,$period,$objects);
        }

	$haveResults = (count($image_data) == 0) ? false : true;
       }
	return view('art.main')->with(['continent'=>$continent,'period'=>$period,'objects'=>$objects,'image_data'=>$image_data]); 
     }
     public function art(){
	return 'here is the art';
     }	
}
