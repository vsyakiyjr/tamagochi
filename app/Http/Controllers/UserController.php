<?php

namespace App\Http\Controllers;
 
use App\User; 
use App\Tamagochi; 
use App\TamagochiItems; 
use App\TamagochiProgress; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{ 
    public function index(Request $request)
    {
    } 
	
    public function tamagochi_registration(Request $request)
    {
		$data = (object) $request->json()->all();
		
		$tamagochi = Tamagochi::create([
				'type_id' => $data->tamagochi_type,  
				'user_id' => $data->player_id,  
				'name' => $data->tamagochi_name 
		]);  
		  
		TamagochiProgress::create([
				'tamagochi_id' => $tamagochi->id,  
				'tamagochi_score' => 0,  
				'tamagochi_hungry' => 20,  
				'tamagochi_learning' => 20,
				'tamagochi_sport' => 20,
				'tamagochi_relax' => 20,
				'tamagochi_purity' => 20 
		]);  
 
		TamagochiItems::create([
				'tamagochi_id' => $tamagochi->id,  
				'apples' => 2,  
				'books' => 2,  
				'dumbbell' => 2,
				'playstation' => 2,
				'super_apples' => 1,
				'super_books' => 1,
				'super_dumbbell' => 1,
				'super_playstation' => 1,
		]);  
		 
		$tamagochi_full = Tamagochi::find($tamagochi->id);
		$tamagochi_progress = $tamagochi_full->progress;
		$tamagochi_items = $tamagochi_full->items;
		
		$res['id'] = $tamagochi->id;
		 
		$res['tamagochi_score'] = $tamagochi_progress->tamagochi_score; 
		$res['tamagochi_hungry'] = $tamagochi_progress->tamagochi_hungry; 
		$res['tamagochi_learning'] = $tamagochi_progress->tamagochi_learning; 
		$res['tamagochi_sport'] = $tamagochi_progress->tamagochi_sport; 
		$res['tamagochi_relax'] = $tamagochi_progress->tamagochi_relax; 
		$res['tamagochi_purity'] = $tamagochi_progress->tamagochi_purity; 
		
		$res['apples'] = $tamagochi_items->apples; 
		$res['books'] = $tamagochi_items->books; 
		$res['dumbbell'] = $tamagochi_items->dumbbell; 
		$res['playstation'] = $tamagochi_items->playstation; 
		$res['super_apples'] = $tamagochi_items->super_apples; 
		$res['super_books'] = $tamagochi_items->super_books; 
		$res['super_dumbbell'] = $tamagochi_items->super_dumbbell; 
		$res['super_playstation'] = $tamagochi_items->super_playstation; 
		 
		return response()->json($res);  
	}
	
    public function tamagochi_progress(Request $request)
    {
		$data = (object) $request->json()->all();
		
		$tamagochi_full = Tamagochi::find($data->player_id);
		$tamagochi_progress = $tamagochi_full->progress;
		$tamagochi_items = $tamagochi_full->items;
		
		$res['id'] = $tamagochi_full->id;
		 
		$res['tamagochi_score'] = $tamagochi_progress->tamagochi_score; 
		$res['tamagochi_hungry'] = $tamagochi_progress->tamagochi_hungry; 
		$res['tamagochi_learning'] = $tamagochi_progress->tamagochi_learning; 
		$res['tamagochi_sport'] = $tamagochi_progress->tamagochi_sport; 
		$res['tamagochi_relax'] = $tamagochi_progress->tamagochi_relax; 
		$res['tamagochi_purity'] = $tamagochi_progress->tamagochi_purity; 
		
		$res['apples'] = $tamagochi_items->apples; 
		$res['books'] = $tamagochi_items->books; 
		$res['dumbbell'] = $tamagochi_items->dumbbell; 
		$res['playstation'] = $tamagochi_items->playstation; 
		$res['super_apples'] = $tamagochi_items->super_apples; 
		$res['super_books'] = $tamagochi_items->super_books; 
		$res['super_dumbbell'] = $tamagochi_items->super_dumbbell; 
		$res['super_playstation'] = $tamagochi_items->super_playstation; 
		 
		return response()->json($res);  
	}
	
    public function tamagochi_action(Request $request)
    {
		$data = (object) $request->json()->all();
		
		$tamagochi_full = Tamagochi::find($data->player_id);
		$tamagochi_progress = $tamagochi_full->progress;
		$tamagochi_items = $tamagochi_full->items;
		 
		switch ($data->resource_type) { 
			case "apple":				 
				if($tamagochi_items->apples!=0) {
					
					$tamagochi_items->apples = $tamagochi_items->apples - 1;
					$tamagochi_progress->tamagochi_hungry = $tamagochi_progress->tamagochi_hungry + 20;
					
					TamagochiItems::where('tamagochi_id', $tamagochi_full->id)->update(['apples' => $tamagochi_items->apples]);
					TamagochiProgress::where('tamagochi_id', $tamagochi_full->id)->update(['tamagochi_hungry' => $tamagochi_progress->tamagochi_hungry]);
		  
				}				 
			break;
			case "book":				 
				if($tamagochi_items->books!=0) {
					
					$tamagochi_items->books = $tamagochi_items->books - 1;
					$tamagochi_progress->tamagochi_learning = $tamagochi_progress->tamagochi_learning + 20;
					
					TamagochiItems::where('tamagochi_id', $tamagochi_full->id)->update(['books' => $tamagochi_items->books]);
					TamagochiProgress::where('tamagochi_id', $tamagochi_full->id)->update(['tamagochi_learning' => $tamagochi_progress->tamagochi_learning]);
		  
				}				 
			break;
		}		 
		
		return response()->json($tamagochi_full);  
	}
} 