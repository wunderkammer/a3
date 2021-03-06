<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Gallery;


class GalleryController extends Controller
{

    public function index(Request $request){
    $gallery = new \App\Gallery(database_path()."/art_data.json");

    $form = new \App\Form($_POST);

    $image_data = [];
	
    $continent = "";
    $period = "";
    $objects = "";


    if($form->isSubmitted()){
       
      $this->validate($request, [
            'continent' => 'required',
            'date' => 'required',
            'object' => 'required',
        ]);
 
      
      $continent = $request->input('continent');
      $period = $request->input('date');
      $objects = $request->input('object');

         
   
	
	$image_data = $gallery->getArt($continent,$period,$objects);
     }

 
	if (!isset($_COOKIE['firsttime']))
	{
    		setcookie("firsttime", "no");
		$hasResults = "";
	}
	else
	{
		$image_count = count($image_data);
		if($image_count == 1){
			$hasResults = "Your search returned ".$image_count." result.";
		}else{
			$hasResults = "Your search returned ".$image_count." results.";
		}
	}


	

	return view('art.main')->with(['continent'=>$continent,'period'=>$period,'objects'=>$objects,'image_data'=>$image_data,'results'=>$hasResults]); 
    }

   }
