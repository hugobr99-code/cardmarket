<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Card;

class SaleController extends Controller
{


	public function createSale(Request $request){

    	$response = "";

    	

    	//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		//Si hay un json válido, crear el usuario
		if($data){

			$sale = new Sale();

			//TODO: Validar los datos antes de guardar el usuario

			$sale->cards_id = $data->cards_id;
			$sale->card_for_sale = $data->card_for_sale;
			$sale->quantity = $data->quantity;
			$sale->price = $data->price;
			

			try{
				$sale->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}
		return response($response);
    }
    
    public function listSale(Request $request,$name){

		$sale = Sale::where('card_for_sale','like','%'. $name .'%')->get();


			$data = [];

			foreach ($sale as $a){
				
				$data[] =	[

					'name' => $a->card_for_sale,
					'quantity' => $a->quantity,
					'price' => $a->price,
					'Id' => $a->cards_id

				];
		}

		return $data;
	}	
	 public function listShop(Request $request,$name){

		$shop = Sale::where('card_for_sale','like','%'. $name .'%')->orderBy('price','asc')->get();
		

			$data = [];

			foreach ($shop as $a){
				
				$data[] =	[

					'name' => $a->card_for_sale,
					'quantity' => $a->quantity,
					'price' => $a->price,
					

				];
		}

		return $data;
	}	
}