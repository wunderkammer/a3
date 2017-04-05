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
            'century' => 'required',
            'checkbox' => 'required',
        ]);
 
      
      $continent = $request->input('continent');
      $period = $request->input('century');
      $objects = $request->input('checkbox');

         
   
	
	$image_data = $gallery->getArt($continent,$period,$objects);
       }
	return view('art.main')->with(['continent'=>$continent,'period'=>$period,'objects'=>$objects,'image_data'=>$image_data]); 
     }

   }
