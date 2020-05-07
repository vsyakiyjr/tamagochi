<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TamagochiProgress extends Authenticatable
{
    use Notifiable;
 
    protected $table = "tamagochi_progress";
	
    protected $fillable = [
        'tamagochi_id', 
		'tamagochi_score', 
		'tamagochi_hungry', 
		'tamagochi_learning', 
		'tamagochi_sport', 
		'tamagochi_relax', 
		'tamagochi_purity'
    ];
  
    public function tamagochi() {
        return $this->belongsTo('App\Tamagochi');
    } 
} 