<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TamagochiItems extends Authenticatable
{
    use Notifiable;
 
    protected $table = "tamagochi_items";
	
    protected $fillable = [
        'tamagochi_id', 
		'apples', 
		'books', 
		'dumbbell', 
		'playstation', 
		'super_apples', 
		'super_books', 
		'super_dumbbell', 
		'super_playstation' 
    ];
  
    public function tamagochi() {
        return $this->belongsTo('App\Tamagochi');
    } 
} 