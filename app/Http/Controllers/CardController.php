<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function createCard(Request $request){

    	$response = "";

    	

    	//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		//Si hay un json válido, crear el usuario
		if($data){

			$card = new Card();

			//TODO: Validar los datos antes de guardar el usuario

			$card->name = $data->name;
			$card->description = $data->description;
			$card->collection = $data->collection;
			$card->collection_id = $data->collection_id;

			try{
				$card->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}


		return response($response);
    }

}
